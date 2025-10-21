<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Attraction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'full_description',
        'image_url',
        'location',
        'category',
        'is_featured',
        'is_published',
        'display_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    /**
     * Auto-generate slug from name
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($attraction) {
            if (empty($attraction->slug)) {
                $attraction->slug = Str::slug($attraction->name);
            }
        });

        static::updating(function ($attraction) {
            if ($attraction->isDirty('name') && empty($attraction->slug)) {
                $attraction->slug = Str::slug($attraction->name);
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
     * Scope to get only published attractions
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to get only featured attractions
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
     * Scope to filter by category
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Get category color for badge
     */
    public function getCategoryColorAttribute()
    {
        $colors = [
            'Historical' => 'blue',
            'Cultural' => 'purple',
            'Natural' => 'green',
            'Religious' => 'orange',
            'Recreational' => 'pink',
            'General' => 'gray',
        ];

        return $colors[$this->category] ?? 'gray';
    }
}
