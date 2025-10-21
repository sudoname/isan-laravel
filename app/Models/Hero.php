<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hero extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'position',
        'category',
        'short_description',
        'biography',
        'image_url',
        'achievements',
        'awards',
        'tags',
        'email',
        'phone',
        'linkedin_url',
        'twitter_url',
        'facebook_url',
        'is_featured',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'achievements' => 'array',
        'awards' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    /**
     * Auto-generate slug from name
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($hero) {
            if (empty($hero->slug)) {
                $hero->slug = Str::slug($hero->name);
            }
        });
    }

    /**
     * Get route key name for route model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Scope to get only published heroes
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to get only featured heroes
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope to order by display order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('name');
    }

    /**
     * Get category color for badge
     */
    public function getCategoryColorAttribute()
    {
        $colors = [
            'Academia' => 'blue',
            'Business' => 'green',
            'Politics' => 'purple',
            'Healthcare' => 'red',
            'Law' => 'orange',
            'Arts & Culture' => 'indigo',
            'Engineering' => 'cyan',
            'Military' => 'gray',
        ];

        return $colors[$this->category] ?? 'gray';
    }
}
