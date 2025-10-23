<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroNomination extends Model
{
    protected $fillable = [
        'nominee_name',
        'nominee_title',
        'category',
        'reason',
        'achievements',
        'nominator_name',
        'nominator_email',
        'nominator_phone',
        'status',
        'admin_notes',
    ];

    /**
     * Scope to get only pending nominations
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope to get only approved nominations
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope to get only rejected nominations
     */
    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    /**
     * Get all votes for this nomination
     */
    public function votes()
    {
        return $this->hasMany(HeroNominationVote::class);
    }

    /**
     * Get average rating
     */
    public function getAverageRatingAttribute()
    {
        return $this->votes()->avg('rating');
    }

    /**
     * Get total votes count
     */
    public function getTotalVotesAttribute()
    {
        return $this->votes()->count();
    }
}
