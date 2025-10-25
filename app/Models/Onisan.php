<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Onisan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'full_title',
        'short_description',
        'biography',
        'image_url',
        'gallery_images',
        'reign_start',
        'reign_end',
        'is_current',
        'achievements',
        'development_projects',
        'palace_address',
        'contact_email',
        'contact_phone',
        'display_order',
        'is_published',
    ];

    protected $casts = [
        'reign_start' => 'date',
        'reign_end' => 'date',
        'is_current' => 'boolean',
        'is_published' => 'boolean',
        'achievements' => 'array',
        'development_projects' => 'array',
        'gallery_images' => 'array',
    ];

    /**
     * Auto-generate slug from name
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($onisan) {
            if (empty($onisan->slug)) {
                $onisan->slug = Str::slug($onisan->name);
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
     * Scope to get only published Onisans
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope to get current Onisan
     */
    public function scopeCurrent($query)
    {
        return $query->where('is_current', true);
    }

    /**
     * Scope to order by display order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderByDesc('reign_start');
    }

    /**
     * Get reign duration in years and months
     */
    public function getReignDurationAttribute()
    {
        $start = $this->reign_start;
        $end = $this->reign_end ?? now();

        if ($start) {
            $years = (int) $start->diffInYears($end);
            $months = (int) $start->copy()->addYears($years)->diffInMonths($end);

            if ($years > 0 && $months > 0) {
                return "{$years} years and {$months} months";
            } elseif ($years > 0) {
                return "{$years} " . ($years === 1 ? 'year' : 'years');
            } elseif ($months > 0) {
                return "{$months} " . ($months === 1 ? 'month' : 'months');
            }
        }

        return null;
    }
}
