<?php

namespace App\Traits;

use App\Services\AutoTranslationService;

trait HasBanglaFields
{
    /**
     * Boot the trait and register the saving model event.
     */
    public static function bootHasBanglaFields(): void
    {
        static::saving(function ($model) {
            $translatable = $model->translatableBanglaFields ?? ['title', 'caption', 'summary', 'description', 'content', 'location', 'short_description'];

            foreach ($translatable as $field) {
                $bnField = "{$field}_bn";

                // Check if this model table actually has this column
                if (!array_key_exists($bnField, $model->attributes) && !$model->isFillable($bnField)) {
                    continue;
                }

                // If admin left the Bangla field empty, but provided English text, auto-translate!
                $currentBn = trim((string) ($model->attributes[$bnField] ?? ''));
                $englishText = trim((string) ($model->attributes[$field] ?? ''));

                if ($currentBn === '' && $englishText !== '') {
                    $autoBn = AutoTranslationService::translate($englishText);
                    if ($autoBn) {
                        $model->attributes[$bnField] = $autoBn;
                    }
                }
            }
        });
    }

    /**
     * Display Title accessor (Bangla aware).
     */
    public function getDisplayTitleAttribute(): string
    {
        if (app()->getLocale() === 'bn') {
            return !empty($this->title_bn) ? $this->title_bn : (string) __($this->title ?? '');
        }
        return (string) ($this->title ?? '');
    }

    /**
     * Display Caption accessor (Bangla aware).
     */
    public function getDisplayCaptionAttribute(): string
    {
        if (app()->getLocale() === 'bn') {
            return !empty($this->caption_bn) ? $this->caption_bn : (string) __($this->caption ?? '');
        }
        return (string) ($this->caption ?? '');
    }

    /**
     * Display Summary accessor (Bangla aware).
     */
    public function getDisplaySummaryAttribute(): string
    {
        if (app()->getLocale() === 'bn') {
            return !empty($this->summary_bn) ? $this->summary_bn : (string) __($this->summary ?? '');
        }
        return (string) ($this->summary ?? '');
    }

    /**
     * Display Short Description accessor (Bangla aware).
     */
    public function getDisplayShortDescriptionAttribute(): string
    {
        if (app()->getLocale() === 'bn') {
            return !empty($this->short_description_bn) ? $this->short_description_bn : (string) __($this->short_description ?? '');
        }
        return (string) ($this->short_description ?? '');
    }

    /**
     * Display Description accessor (Bangla aware).
     */
    public function getDisplayDescriptionAttribute(): string
    {
        if (app()->getLocale() === 'bn') {
            return !empty($this->description_bn) ? clean_html_content($this->description_bn) : bn_content($this->description);
        }
        return clean_html_content($this->description);
    }

    /**
     * Display Content / Body accessor (Bangla aware).
     */
    public function getDisplayContentAttribute(): string
    {
        if (app()->getLocale() === 'bn') {
            return !empty($this->content_bn) ? clean_html_content($this->content_bn) : bn_content($this->content);
        }
        return clean_html_content($this->content);
    }

    /**
     * Display Location accessor (Bangla aware).
     */
    public function getDisplayLocationAttribute(): string
    {
        if (app()->getLocale() === 'bn') {
            return !empty($this->location_bn) ? $this->location_bn : (string) __($this->location ?? '');
        }
        return (string) ($this->location ?? '');
    }
}
