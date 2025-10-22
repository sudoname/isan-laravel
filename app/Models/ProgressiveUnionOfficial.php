<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressiveUnionOfficial extends Model
{
    protected $fillable = [
        'name',
        'title',
        'year_from',
        'year_to',
        'image',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'year_from' => 'integer',
        'year_to' => 'integer',
        'is_active' => 'boolean',
    ];

    /**
     * Scope to get only active officials
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by display_order and year_from
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('year_from', 'desc')
                    ->orderBy('display_order')
                    ->orderBy('name');
    }

    /**
     * Get the service period
     */
    public function getServicePeriodAttribute()
    {
        if ($this->year_to) {
            return $this->year_from . ' - ' . $this->year_to;
        }
        return $this->year_from . ' - Present';
    }
}
