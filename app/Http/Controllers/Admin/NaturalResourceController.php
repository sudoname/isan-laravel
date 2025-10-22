<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NaturalResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NaturalResourceController extends Controller
{
    public function index(Request $request)
    {
        $query = NaturalResource::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_published', $request->status === 'published');
        }

        $resources = $query->ordered()->paginate(15);

        // Get unique categories for filter
        $categories = NaturalResource::selectRaw('DISTINCT category')
            ->whereNotNull('category')
            ->orderBy('category')
            ->pluck('category');

        return view('admin.natural-resources.index', compact('resources', 'categories'));
    }

    public function create()
    {
        return view('admin.natural-resources.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'display_order' => 'nullable|integer|min:0',
            'is_published' => 'boolean',
        ]);

        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('natural-resources', 'public');
        }

        NaturalResource::create($validated);

        return redirect()->route('admin.natural-resources.index')
            ->with('success', 'Natural resource added successfully!');
    }

    public function edit(NaturalResource $naturalResource)
    {
        return view('admin.natural-resources.edit', ['resource' => $naturalResource]);
    }

    public function update(Request $request, NaturalResource $naturalResource)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'display_order' => 'nullable|integer|min:0',
            'is_published' => 'boolean',
        ]);

        $validated['is_published'] = $request->has('is_published');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($naturalResource->image && Storage::disk('public')->exists($naturalResource->image)) {
                Storage::disk('public')->delete($naturalResource->image);
            }
            $validated['image'] = $request->file('image')->store('natural-resources', 'public');
        }

        $naturalResource->update($validated);

        return redirect()->route('admin.natural-resources.index')
            ->with('success', 'Natural resource updated successfully!');
    }

    public function destroy(NaturalResource $naturalResource)
    {
        if ($naturalResource->image && Storage::disk('public')->exists($naturalResource->image)) {
            Storage::disk('public')->delete($naturalResource->image);
        }

        $naturalResource->delete();

        return redirect()->route('admin.natural-resources.index')
            ->with('success', 'Natural resource deleted successfully!');
    }
}
