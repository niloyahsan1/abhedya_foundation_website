<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'donor_name',
        'donor_email',
        'donor_phone',
        'amount',
        'payment_method',
        'transaction_id',
        'reference',
        'status',
        'verified_by',
        'verified_at',
        'rejection_reason',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'verified_at' => 'datetime',
        ];
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', 'pending');
    }

    public function scopeVerified(Builder $query): Builder
    {
        return $query->where('status', 'verified');
    }

    public function scopeRejected(Builder $query): Builder
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Mark donation as verified by an authorized administrator.
     */
    public function verify(User $admin, ?string $notes = null): bool
    {
        $this->status = 'verified';
        $this->verified_by = $admin->id;
        $this->verified_at = now();
        if ($notes) {
            $this->notes = $notes;
        }

        return $this->save();
    }

    /**
     * Mark donation as rejected with explicit reason.
     */
    public function reject(User $admin, string $reason): bool
    {
        $this->status = 'rejected';
        $this->verified_by = $admin->id;
        $this->verified_at = now();
        $this->rejection_reason = $reason;

        return $this->save();
    }
}
