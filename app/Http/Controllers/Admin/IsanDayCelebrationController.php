<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IsanDayCelebration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IsanDayCelebrationController extends Controller
{
    /**
     * Display a listing of the celebrations.
     */
    public function index(Request $request)
    {
        $query = IsanDayCelebration::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('theme', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->whereYear('celebration_date', $request->year);
        }

        $celebrations = $query->ordered()->paginate(15);

        // Get unique years for filter (SQLite compatible)
        $years = IsanDayCelebration::selectRaw("strftime('%Y', celebration_date) as year")
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('admin.isan-day-celebrations.index', compact('celebrations', 'years'));
    }

    /**
     * Show the form for creating a new celebration.
     */
    public function create()
    {
        $statuses = ['upcoming', 'completed', 'cancelled'];
        return view('admin.isan-day-celebrations.create', compact('statuses'));
    }

    /**
     * Store a newly created celebration in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:isan_day_celebrations,slug',
            'description' => 'nullable|string|max:500',
            'full_description' => 'nullable|string',
            'celebration_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'theme' => 'nullable|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'status' => 'required|string|in:upcoming,completed,cancelled',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle image upload
        if ($request->hasFile('image_url')) {
            $validated['image_url'] = $request->file('image_url')->store('celebrations', 'public');
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        IsanDayCelebration::create($validated);

        return redirect()->route('admin.isan-day-celebrations.index')
            ->with('success', 'Isan Day celebration created successfully!');
    }

    /**
     * Display the specified celebration.
     */
    public function show(IsanDayCelebration $isanDayCelebration)
    {
        return redirect()->route('admin.isan-day-celebrations.edit', $isanDayCelebration);
    }

    /**
     * Show the form for editing the specified celebration.
     */
    public function edit(IsanDayCelebration $isanDayCelebration)
    {
        $statuses = ['upcoming', 'completed', 'cancelled'];
        return view('admin.isan-day-celebrations.edit', compact('isanDayCelebration', 'statuses'));
    }

    /**
     * Update the specified celebration in storage.
     */
    public function update(Request $request, IsanDayCelebration $isanDayCelebration)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:isan_day_celebrations,slug,' . $isanDayCelebration->id,
            'description' => 'nullable|string|max:500',
            'full_description' => 'nullable|string',
            'celebration_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'theme' => 'nullable|string|max:255',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
            'status' => 'required|string|in:upcoming,completed,cancelled',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Handle image upload
        if ($request->hasFile('image_url')) {
            // Delete old image if exists
            if ($isanDayCelebration->image_url && Storage::disk('public')->exists($isanDayCelebration->image_url)) {
                Storage::disk('public')->delete($isanDayCelebration->image_url);
            }
            $validated['image_url'] = $request->file('image_url')->store('celebrations', 'public');
        } else {
            unset($validated['image_url']);
        }

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_published'] = $request->has('is_published');

        $isanDayCelebration->update($validated);

        return redirect()->route('admin.isan-day-celebrations.index')
            ->with('success', 'Isan Day celebration updated successfully!');
    }

    /**
     * Remove the specified celebration from storage.
     */
    public function destroy(IsanDayCelebration $isanDayCelebration)
    {
        // Delete image if exists
        if ($isanDayCelebration->image_url && Storage::disk('public')->exists($isanDayCelebration->image_url)) {
            Storage::disk('public')->delete($isanDayCelebration->image_url);
        }

        $isanDayCelebration->delete();

        return redirect()->route('admin.isan-day-celebrations.index')
            ->with('success', 'Isan Day celebration deleted successfully!');
    }
}
