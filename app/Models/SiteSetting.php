<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'label',
        'value',
        'type',
        'group',
    ];

    /**
     * Clear cache on save.
     */
    protected static function booted(): void
    {
        static::saved(function ($setting) {
            Cache::forget("site_setting_{$setting->key}");
            if (str_ends_with($setting->key, '_bn')) {
                $baseKey = substr($setting->key, 0, -3);
                Cache::forget("site_setting_{$baseKey}_bn");
            } else {
                Cache::forget("site_setting_{$setting->key}_bn");
            }
        });
    }

    /**
     * Retrieve a setting value by key with caching and bilingual support.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        if (app()->getLocale() === 'bn') {
            $bnValue = Cache::remember("site_setting_{$key}_bn", 86400, function () use ($key) {
                $setting = static::where('key', "{$key}_bn")->first();
                return ($setting && !empty(trim((string) $setting->value))) ? $setting->value : null;
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

