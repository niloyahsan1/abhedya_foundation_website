<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'featured_image',
        'target_amount',
        'start_date',
        'end_date',
        'status',
        'is_featured',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'target_amount' => 'decimal:2',
            'start_date' => 'date',
            'end_date' => 'date',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function updates(): HasMany
    {
        return $this->hasMany(CampaignUpdate::class)->orderBy('published_at', 'desc');
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    public function verifiedDonations(): HasMany
    {
        return $this->hasMany(Donation::class)->where('status', 'verified');
    }

    /**
     * Confirmed raised amount strictly based on verified donations.
     */
    public function getRaisedAmountAttribute(): float
    {
        return (float) $this->verifiedDonations()->sum('amount');
    }

    /**
     * Progress percentage toward goal, capped sensibly or rounded.
     */
    public function getProgressPercentageAttribute(): float
    {
        if ($this->target_amount <= 0) {
            return 0.0;
        }

        $percentage = ($this->raised_amount / $this->target_amount) * 100;

        return round($percentage, 1);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }
}
