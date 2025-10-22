<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsAppGroup extends Model
{
    protected $fillable = [
        'name',
        'description',
        'admin_name',
        'admin_phone',
        'invite_link',
        'category',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope to get only active groups
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
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
            'General' => 'gray',
            'Business' => 'blue',
            'Youth' => 'purple',
            'Women' => 'pink',
            'Men' => 'indigo',
            'Diaspora' => 'green',
        ];

        return $colors[$this->category] ?? 'gray';
    }
}
