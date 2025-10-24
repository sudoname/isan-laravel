<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeroController extends Controller
{
    /**
     * Display a listing of the heroes.
     */
    public function index(Request $request)
    {
        $query = Hero::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
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

        $heroes = $query->ordered()->paginate(15);

        $categories = [
            'Academia', 'Business', 'Politics', 'Healthcare',
            'Law', 'Arts & Culture', 'Engineering', 'Military'
        ];

        return view('admin.heroes.index', compact('heroes', 'categories'));
    }

    /**
     * Show the form for creating a new hero.
     */
    public function create()
    {
        $categories = [
            'Academia', 'Business', 'Politics', 'Healthcare',
            'Law', 'Arts & Culture', 'Engineering', 'Military'
        ];

        return view('admin.heroes.create', compact('categories'));
    }

    /**
     * Store a newly created hero in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:heroes,slug',
            'title' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'biography' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'achievements' => 'nullable|array',
            'achievements.*' => 'nullable|string',
            'awards' => 'nullable|array',
            'awards.*' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
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
            $validated['image_url'] = $request->file('image_url')->store('heroes', 'public');
        }

        // Filter out empty achievements, awards, and tags
        if (isset($validated['achievements'])) {
            $validated['achievements'] = array_filter($validated['achievements']);
        }
        if (isset($validated['awards'])) {
            $validated['awards'] = array_filter($validated['awards']);
        }
        if (isset($validated['tags'])) {
            $validated['tags'] = array_filter($validated['tags']);
        }

        // Ensure required database columns have empty string instead of null
        $validated['title'] = $validated['title'] ?? '';
        $validated['position'] = $validated['position'] ?? '';
        $validated['short_description'] = $validated['short_description'] ?? '';

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        Hero::create($validated);

        return redirect()->route('admin.heroes.index')
            ->with('success', 'Hero created successfully!');
    }

    /**
     * Display the specified hero.
     */
    public function show(Hero $hero)
    {
        return redirect()->route('admin.heroes.edit', $hero);
    }

    /**
     * Show the form for editing the specified hero.
     */
    public function edit(Hero $hero)
    {
        $categories = [
            'Academia', 'Business', 'Politics', 'Healthcare',
            'Law', 'Arts & Culture', 'Engineering', 'Military'
        ];

        return view('admin.heroes.edit', compact('hero', 'categories'));
    }

    /**
     * Update the specified hero in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:heroes,slug,' . $hero->id,
            'title' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'biography' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'achievements' => 'nullable|array',
            'achievements.*' => 'nullable|string',
            'awards' => 'nullable|array',
            'awards.*' => 'nullable|string',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'linkedin_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'facebook_url' => 'nullable|url|max:255',
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
            if ($hero->image_url && Storage::disk('public')->exists($hero->image_url)) {
                Storage::disk('public')->delete($hero->image_url);
            }
            $validated['image_url'] = $request->file('image_url')->store('heroes', 'public');
        } else {
            unset($validated['image_url']);
        }

        // Filter out empty achievements, awards, and tags
        if (isset($validated['achievements'])) {
            $validated['achievements'] = array_filter($validated['achievements']);
        }
        if (isset($validated['awards'])) {
            $validated['awards'] = array_filter($validated['awards']);
        }
        if (isset($validated['tags'])) {
            $validated['tags'] = array_filter($validated['tags']);
        }

        // Ensure required database columns have empty string instead of null
        $validated['title'] = $validated['title'] ?? '';
        $validated['position'] = $validated['position'] ?? '';
        $validated['short_description'] = $validated['short_description'] ?? '';

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        $hero->update($validated);

        return redirect()->route('admin.heroes.index')
            ->with('success', 'Hero updated successfully!');
    }

    /**
     * Remove the specified hero from storage.
     */
    public function destroy(Hero $hero)
    {
        // Delete image if exists
        if ($hero->image_url && Storage::disk('public')->exists($hero->image_url)) {
            Storage::disk('public')->delete($hero->image_url);
        }

        $hero->delete();

        return redirect()->route('admin.heroes.index')
            ->with('success', 'Hero deleted successfully!');
    }
}
