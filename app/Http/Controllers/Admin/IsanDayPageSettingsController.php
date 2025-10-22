<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IsanDayPageSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IsanDayPageSettingsController extends Controller
{
    /**
     * Show the form for editing page images.
     */
    public function edit()
    {
        $settings = IsanDayPageSettings::getSettings();
        return view('admin.isan-day-page-settings.edit', compact('settings'));
    }

    /**
     * Update the page images.
     */
    public function update(Request $request)
    {
        $settings = IsanDayPageSettings::getSettings();

        $validated = $request->validate([
            'hero_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'about_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'highlight_cultural_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'highlight_reception_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'highlight_sports_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'highlight_summit_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'highlight_cuisine_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'highlight_gala_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'cta_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'final_cta_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $imageFields = [
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

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old image if exists
                if ($settings->$field && Storage::disk('public')->exists($settings->$field)) {
                    Storage::disk('public')->delete($settings->$field);
                }
                // Store new image
                $settings->$field = $request->file($field)->store('isan-day-images', 'public');
            }
        }

        $settings->save();

        return redirect()->route('admin.isan-day-page-settings.edit')
            ->with('success', 'Isan Day page images updated successfully!');
    }
}
