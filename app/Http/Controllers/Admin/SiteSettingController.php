<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Show the form for editing site settings.
     */
    public function edit()
    {
        $settings = SiteSetting::getSettings();
        return view('admin.site-settings.edit', compact('settings'));
    }

    /**
     * Update site settings in storage.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_tagline' => 'nullable|string|max:255',
            'site_description' => 'nullable|string',
            'logo_url' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'favicon_url' => 'nullable|image|mimes:ico,png|max:1024',
            'homepage_hero_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'homepage_hero_title' => 'nullable|string|max:255',
            'homepage_hero_subtitle' => 'nullable|string',
            'tile_history_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'tile_heroes_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'tile_attractions_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'tile_isan_day_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'tile_news_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'tile_forum_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_address' => 'nullable|string',
            'social_facebook' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_youtube' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'footer_text' => 'nullable|string',
            'footer_copyright' => 'nullable|string|max:255',
            'google_maps_embed_url' => 'nullable|string',
        ]);

        $settings = SiteSetting::getSettings();

        // Handle file uploads
        if ($request->hasFile('logo_url')) {
            // Delete old logo if exists
            if ($settings->logo_url && Storage::disk('public')->exists($settings->logo_url)) {
                Storage::disk('public')->delete($settings->logo_url);
            }
            $validated['logo_url'] = $request->file('logo_url')->store('settings', 'public');
        } else {
            unset($validated['logo_url']);
        }

        if ($request->hasFile('favicon_url')) {
            // Delete old favicon if exists
            if ($settings->favicon_url && Storage::disk('public')->exists($settings->favicon_url)) {
                Storage::disk('public')->delete($settings->favicon_url);
            }
            $validated['favicon_url'] = $request->file('favicon_url')->store('settings', 'public');
        } else {
            unset($validated['favicon_url']);
        }

        if ($request->hasFile('homepage_hero_image')) {
            // Delete old hero image if exists
            if ($settings->homepage_hero_image && Storage::disk('public')->exists($settings->homepage_hero_image)) {
                Storage::disk('public')->delete($settings->homepage_hero_image);
            }
            $validated['homepage_hero_image'] = $request->file('homepage_hero_image')->store('settings', 'public');
        } else {
            unset($validated['homepage_hero_image']);
        }

        // Handle tile image uploads
        $tileImages = ['tile_history_image', 'tile_heroes_image', 'tile_attractions_image', 'tile_isan_day_image', 'tile_news_image', 'tile_forum_image'];
        foreach ($tileImages as $tileImage) {
            if ($request->hasFile($tileImage)) {
                // Delete old tile image if exists
                if ($settings->$tileImage && Storage::disk('public')->exists($settings->$tileImage)) {
                    Storage::disk('public')->delete($settings->$tileImage);
                }
                $validated[$tileImage] = $request->file($tileImage)->store('settings/tiles', 'public');
            } else {
                unset($validated[$tileImage]);
            }
        }

        $settings->update($validated);

        return redirect()->route('admin.settings.edit')
            ->with('success', 'Site settings updated successfully!');
    }
}
