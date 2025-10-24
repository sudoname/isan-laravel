<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'featured_image',
        'video_url',
        'images',
        'event_date',
        'location',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'images' => 'array',
        'event_date' => 'date',
        'is_published' => 'boolean',
    ];

    /**
     * Scope for published festivals
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope for ordering festivals
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('event_date', 'desc');
    }

    /**
     * Scope for upcoming festivals
     */
    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', now())->orderBy('event_date');
    }
}
