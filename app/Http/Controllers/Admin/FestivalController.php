<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FestivalController extends Controller
{
    /**
     * Display a listing of the festivals.
     */
    public function index(Request $request)
    {
        $query = Festival::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }

        $festivals = $query->ordered()->paginate(15);

        return view('admin.festivals.index', compact('festivals'));
    }

    /**
     * Show the form for creating a new festival.
     */
    public function create()
    {
        return view('admin.festivals.create');
    }

    /**
     * Store a newly created festival in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:festivals,slug',
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'video_url' => 'nullable|url|max:255',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('festivals', 'public');
        }

        // Handle gallery images upload
        $images = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $images[] = $image->store('festivals/gallery', 'public');
            }
        }
        $validated['images'] = $images;

        // Ensure empty values are empty strings
        $validated['short_description'] = $validated['short_description'] ?? '';

        $validated['is_published'] = $request->has('is_published');

        Festival::create($validated);

        return redirect()->route('admin.festivals.index')
            ->with('success', 'Festival created successfully!');
    }

    /**
     * Display the specified festival.
     */
    public function show(Festival $festival)
    {
        return redirect()->route('admin.festivals.edit', $festival);
    }

    /**
     * Show the form for editing the specified festival.
     */
    public function edit(Festival $festival)
    {
        return view('admin.festivals.edit', compact('festival'));
    }

    /**
     * Update the specified festival in storage.
     */
    public function update(Request $request, Festival $festival)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:festivals,slug,' . $festival->id,
            'short_description' => 'required|string|max:500',
            'description' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'video_url' => 'nullable|url|max:255',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'remove_gallery_images' => 'nullable|array',
            'event_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($festival->featured_image && Storage::disk('public')->exists($festival->featured_image)) {
                Storage::disk('public')->delete($festival->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('festivals', 'public');
        } else {
            unset($validated['featured_image']);
        }

        // Handle gallery images
        $existingImages = $festival->images ?? [];

        // Remove selected images
        if ($request->filled('remove_gallery_images')) {
            foreach ($request->remove_gallery_images as $imageToRemove) {
                if (Storage::disk('public')->exists($imageToRemove)) {
                    Storage::disk('public')->delete($imageToRemove);
                }
                $existingImages = array_filter($existingImages, function($img) use ($imageToRemove) {
                    return $img !== $imageToRemove;
                });
            }
        }

        // Add new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $existingImages[] = $image->store('festivals/gallery', 'public');
            }
        }

        $validated['images'] = array_values($existingImages);

        // Ensure empty values are empty strings
        $validated['short_description'] = $validated['short_description'] ?? '';

        $validated['is_published'] = $request->has('is_published');

        $festival->update($validated);

        return redirect()->route('admin.festivals.index')
            ->with('success', 'Festival updated successfully!');
    }

    /**
     * Remove the specified festival from storage.
     */
    public function destroy(Festival $festival)
    {
        // Delete featured image if exists
        if ($festival->featured_image && Storage::disk('public')->exists($festival->featured_image)) {
            Storage::disk('public')->delete($festival->featured_image);
        }

        // Delete gallery images
        if (!empty($festival->images)) {
            foreach ($festival->images as $image) {
                if (Storage::disk('public')->exists($image)) {
                    Storage::disk('public')->delete($image);
                }
            }
        }

        $festival->delete();

        return redirect()->route('admin.festivals.index')
            ->with('success', 'Festival deleted successfully!');
    }
}
