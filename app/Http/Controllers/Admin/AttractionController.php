<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AttractionController extends Controller
{
    /**
     * Display a listing of the attractions.
     */
    public function index(Request $request)
    {
        $query = Attraction::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
            }
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->featured === 'yes');
        }

        $attractions = $query->ordered()->paginate(15);

        $categories = ['Historical', 'Cultural', 'Natural', 'Religious', 'Recreational', 'General'];

        return view('admin.attractions.index', compact('attractions', 'categories'));
    }

    /**
     * Show the form for creating a new attraction.
     */
    public function create()
    {
        $categories = ['Historical', 'Cultural', 'Natural', 'Religious', 'Recreational', 'General'];
        return view('admin.attractions.create', compact('categories'));
    }

    /**
     * Store a newly created attraction in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:attractions,slug',
            'description' => 'nullable|string|max:500',
            'full_description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'location' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle image upload
        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('attractions', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        Attraction::create($validated);

        return redirect()->route('admin.attractions.index')
            ->with('success', 'Attraction created successfully!');
    }

    /**
     * Display the specified attraction.
     */
    public function show(Attraction $attraction)
    {
        return redirect()->route('admin.attractions.edit', $attraction);
    }

    /**
     * Show the form for editing the specified attraction.
     */
    public function edit(Attraction $attraction)
    {
        $categories = ['Historical', 'Cultural', 'Natural', 'Religious', 'Recreational', 'General'];
        return view('admin.attractions.edit', compact('attraction', 'categories'));
    }

    /**
     * Update the specified attraction in storage.
     */
    public function update(Request $request, Attraction $attraction)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:attractions,slug,' . $attraction->id,
            'description' => 'nullable|string|max:500',
            'full_description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'location' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle image upload
        if ($request->hasFile('image_url')) {
            // Delete old image if exists
            if ($attraction->image_url && Storage::disk('public')->exists($attraction->image_url)) {
                Storage::disk('public')->delete($attraction->image_url);
            }
            $validated['image_url'] = $request->file('image_url')->store('attractions', 'public');
        } else {
            unset($validated['image_url']);
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        $attraction->update($validated);

        return redirect()->route('admin.attractions.index')
            ->with('success', 'Attraction updated successfully!');
    }

    /**
     * Remove the specified attraction from storage.
     */
    public function destroy(Attraction $attraction)
    {
        // Delete image if exists
        if ($attraction->image_url && Storage::disk('public')->exists($attraction->image_url)) {
            Storage::disk('public')->delete($attraction->image_url);
        }

        $attraction->delete();

        return redirect()->route('admin.attractions.index')
            ->with('success', 'Attraction deleted successfully!');
    }
}
