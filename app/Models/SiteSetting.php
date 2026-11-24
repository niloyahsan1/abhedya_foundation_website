<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use App\Services\AutoTranslationService;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'label',
        'value',
        'value_bn',
        'type',
        'group',
    ];

    /**
     * Clear cache and auto-translate on save.
     */
    protected static function booted(): void
    {
        static::saving(function ($setting) {
            // Keys that shouldn't be auto-translated (e.g. raw emails, URLs, phone/account numbers)
            $nonTranslatable = [
                'contact_email',
                'social_facebook',
                'social_twitter',
                'social_linkedin',
                'social_youtube',
                'donation_bkash_number',
                'donation_nagad_number',
                'donation_rocket_number',
            ];

            if (in_array($setting->key, $nonTranslatable)) {
                return;
            }

            $currentBn = trim((string) ($setting->value_bn ?? ''));
            $englishText = trim((string) ($setting->value ?? ''));

            // If admin left the Bangla value empty, but provided English text, auto-translate!
            if ($currentBn === '' && $englishText !== '') {
                $autoBn = AutoTranslationService::translate($englishText);
                if ($autoBn) {
                    $setting->value_bn = $autoBn;
                }
            }
        });

        static::saved(function ($setting) {
            Cache::forget("site_setting_{$setting->key}");
            Cache::forget("site_setting_{$setting->key}_bn");
        });
    }

    /**
     * Retrieve a setting value by key with caching and bilingual support.
     * When locale is 'bn', returns value_bn from the same row if it's not empty,
     * otherwise falls back to value (English).
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        if (app()->getLocale() === 'bn') {
            $bnValue = Cache::remember("site_setting_{$key}_bn", 86400, function () use ($key) {
                $setting = static::where('key', $key)->first();
                return ($setting && !empty(trim((string) $setting->value_bn))) ? $setting->value_bn : null;
            });

            if ($bnValue !== null) {
                return $bnValue;
            }
        }

        return Cache::remember("site_setting_{$key}", 86400, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();

            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Set a setting value by key and invalidate cache.
     */
    public static function set(string $key, mixed $value, ?string $group = null, ?string $label = null, string $type = 'text'): self
    {
        Cache::forget("site_setting_{$key}");
        Cache::forget("site_setting_{$key}_bn");

        $setting = static::firstOrNew(['key' => $key]);
        $setting->value = $value;
        if ($group) {
            $setting->group = $group;
        }
        if ($label) {
            $setting->label = $label;
        }
        $setting->type = $type;
        $setting->save();

        return $setting;
    }
}
