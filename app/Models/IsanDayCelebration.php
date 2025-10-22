<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class IsanDayCelebration extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'full_description',
        'celebration_date',
        'location',
        'theme',
        'image_url',
        'gallery',
        'status',
        'is_featured',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'celebration_date' => 'date',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    /**
     * Scope to get only published celebrations
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to get only featured celebrations
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope to get upcoming celebrations
     */
    public function scopeUpcoming($query)
    {
        return $query->where('celebration_date', '>=', now())
                    ->where('status', 'upcoming')
                    ->orderBy('celebration_date', 'asc');
    }

    /**
     * Scope to get past celebrations
     */
    public function scopePast($query)
    {
        return $query->where('celebration_date', '<', now())
                    ->orWhere('status', 'completed')
                    ->orderBy('celebration_date', 'desc');
    }

    /**
     * Scope to order by display order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')
                    ->orderBy('celebration_date', 'desc');
    }

    /**
     * Scope to filter by status
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Check if celebration is upcoming
     */
    public function isUpcoming()
    {
        return $this->celebration_date >= now() && $this->status === 'upcoming';
    }

    /**
     * Check if celebration is past
     */
    public function isPast()
    {
        return $this->celebration_date < now() || $this->status === 'completed';
    }

    /**
     * Get formatted celebration date
     */
    public function getFormattedDateAttribute()
    {
        return $this->celebration_date->format('F j, Y');
    }

    /**
     * Get status badge color
     */
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'upcoming' => 'blue',
            'completed' => 'green',
            'cancelled' => 'red',
            default => 'gray',
        };
    }
}
