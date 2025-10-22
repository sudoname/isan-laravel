<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgressiveUnionOfficial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgressiveUnionOfficialController extends Controller
{
    public function index(Request $request)
    {
        $query = ProgressiveUnionOfficial::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('title', 'like', "%{$search}%");
            });
        }

        // Filter by year
        if ($request->filled('year')) {
            $query->where('year_from', $request->year);
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $officials = $query->ordered()->paginate(15);

        // Get unique years for filter
        $years = ProgressiveUnionOfficial::selectRaw('DISTINCT year_from')
            ->orderBy('year_from', 'desc')
            ->pluck('year_from');

        return view('admin.progressive-union-officials.index', compact('officials', 'years'));
    }

    public function create()
    {
        return view('admin.progressive-union-officials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'year_from' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'year_to' => 'nullable|integer|min:1900|max:' . (date('Y') + 10) . '|gte:year_from',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'display_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('progressive-union-officials', 'public');
        }

        ProgressiveUnionOfficial::create($validated);

        return redirect()->route('admin.progressive-union-officials.index')
            ->with('success', 'Official added successfully!');
    }

    public function edit(ProgressiveUnionOfficial $progressiveUnionOfficial)
    {
        return view('admin.progressive-union-officials.edit', ['official' => $progressiveUnionOfficial]);
    }

    public function update(Request $request, ProgressiveUnionOfficial $progressiveUnionOfficial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'year_from' => 'required|integer|min:1900|max:' . (date('Y') + 10),
            'year_to' => 'nullable|integer|min:1900|max:' . (date('Y') + 10) . '|gte:year_from',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
            'display_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($progressiveUnionOfficial->image && Storage::disk('public')->exists($progressiveUnionOfficial->image)) {
                Storage::disk('public')->delete($progressiveUnionOfficial->image);
            }
            $validated['image'] = $request->file('image')->store('progressive-union-officials', 'public');
        }

        $progressiveUnionOfficial->update($validated);

        return redirect()->route('admin.progressive-union-officials.index')
            ->with('success', 'Official updated successfully!');
    }

    public function destroy(ProgressiveUnionOfficial $progressiveUnionOfficial)
    {
        if ($progressiveUnionOfficial->image && Storage::disk('public')->exists($progressiveUnionOfficial->image)) {
            Storage::disk('public')->delete($progressiveUnionOfficial->image);
        }

        $progressiveUnionOfficial->delete();

        return redirect()->route('admin.progressive-union-officials.index')
            ->with('success', 'Official deleted successfully!');
    }
}
