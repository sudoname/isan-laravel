<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IsanDayPageSettings extends Model
{
    protected $fillable = [
        'hero_image',
        'about_image',
        'highlight_cultural_image',
        'highlight_reception_image',
        'highlight_sports_image',
        'highlight_summit_image',
        'highlight_cuisine_image',
        'highlight_gala_image',
        'cta_image',
        'final_cta_image',
    ];

    /**
     * Get the settings instance (singleton pattern - only one row should exist)
     */
    public static function getSettings()
    {
        return self::firstOrCreate([]);
    }
}
