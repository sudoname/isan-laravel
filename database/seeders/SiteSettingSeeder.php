<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'site_name' => 'Isan Ekiti',
            'site_tagline' => 'Preserving Our Heritage, Building Our Future',
            'site_description' => 'Welcome to Isan Ekiti - A vibrant community in Ekiti State, Nigeria, celebrating our rich cultural heritage and working together to build a prosperous future for our people.',

            'homepage_hero_title' => 'Welcome to Isan Ekiti',
            'homepage_hero_subtitle' => 'Discover the rich history, culture, and heritage of Isan Ekiti - A land of tradition and progress.',

            'contact_email' => 'info@isanekiti.com',
            'contact_phone' => '+234 XXX XXX XXXX',
            'contact_address' => 'Isan Ekiti, Ekiti State, Nigeria',

            'social_facebook' => 'https://facebook.com/isanekiti',
            'social_twitter' => 'https://twitter.com/isanekiti',
            'social_instagram' => 'https://instagram.com/isanekiti',

            'footer_text' => 'Isan Ekiti is a vibrant community committed to preserving our cultural heritage while embracing progress and development.',
            'footer_copyright' => 'Copyright ' . date('Y') . ' Isan Ekiti. All rights reserved.',
        ]);
    }
}
