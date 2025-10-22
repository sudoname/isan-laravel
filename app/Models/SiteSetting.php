<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'site_tagline',
        'site_description',
        'logo_url',
        'favicon_url',
        'homepage_hero_image',
        'homepage_hero_title',
        'homepage_hero_subtitle',
        'tile_history_image',
        'tile_heroes_image',
        'tile_attractions_image',
        'tile_isan_day_image',
        'tile_news_image',
        'tile_forum_image',
        'contact_email',
        'contact_phone',
        'contact_address',
        'social_facebook',
        'social_twitter',
        'social_instagram',
        'social_youtube',
        'social_linkedin',
        'footer_text',
        'footer_copyright',
        'google_maps_embed_url',
    ];

    /**
     * Get the site settings (singleton pattern - only one row)
     */
    public static function getSettings()
    {
        return self::firstOrCreate([
            'id' => 1
        ], [
            'site_name' => 'Isan Ekiti',
            'site_tagline' => 'Preserving Our Heritage, Building Our Future',
            'site_description' => 'Welcome to Isan Ekiti - A vibrant community celebrating our rich cultural heritage.',
            'footer_copyright' => 'Copyright ' . date('Y') . ' Isan Ekiti. All rights reserved.',
        ]);
    }
}
