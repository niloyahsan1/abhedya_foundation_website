<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, \App\Traits\HasBanglaFields;

    protected $fillable = [
        'title',
        'title_bn',
        'slug',
        'summary',
        'summary_bn',
        'description',
        'description_bn',
        'featured_image',
        'status',
        'start_date',
        'end_date',
        'location',
        'location_bn',
        'is_published',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    public function getFeaturedImageAttribute($value): ?string
    {
        if (empty($value)) {
            return null;
        }
        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://') || str_starts_with($value, '/')) {
            return $value;
        }
        return \Illuminate\Support\Facades\Storage::url($value);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}
