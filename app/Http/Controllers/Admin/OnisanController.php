<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Onisan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class OnisanController extends Controller
{
    /**
     * Display a listing of Onisans
     */
    public function index()
    {
        $onisans = Onisan::orderBy('display_order')->orderByDesc('reign_start')->paginate(15);
        return view('admin.onisans.index', compact('onisans'));
    }

    /**
     * Show the form for creating a new Onisan
     */
    public function create()
    {
        return view('admin.onisans.create');
    }

    /**
     * Store a newly created Onisan
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'full_title' => 'nullable|string|max:500',
            'short_description' => 'nullable|string',
            'biography' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'reign_start' => 'nullable|date',
            'reign_end' => 'nullable|date',
            'is_current' => 'boolean',
            'is_published' => 'boolean',
            'display_order' => 'nullable|integer',
            'palace_address' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'achievements' => 'nullable|array',
            'achievements.*' => 'nullable|string',
            'development_projects' => 'nullable|array',
            'development_projects.*' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/onisan'), $imageName);
            $validated['image_url'] = 'images/onisan/' . $imageName;
        }

        // If this is set as current, unset all others
        if ($request->boolean('is_current')) {
            Onisan::where('is_current', true)->update(['is_current' => false]);
        }

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Clean up achievements and development_projects arrays (remove empty values)
        if (isset($validated['achievements'])) {
            $validated['achievements'] = array_values(array_filter($validated['achievements']));
        }

        if (isset($validated['development_projects'])) {
            $validated['development_projects'] = array_values(array_filter($validated['development_projects']));
        }

        Onisan::create($validated);

        return redirect()->route('admin.onisans.index')->with('success', 'Onisan created successfully!');
    }

    /**
     * Show the form for editing the specified Onisan
     */
    public function edit(Onisan $onisan)
    {
        return view('admin.onisans.edit', compact('onisan'));
    }

    /**
     * Update the specified Onisan
     */
    public function update(Request $request, Onisan $onisan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'full_title' => 'nullable|string|max:500',
            'short_description' => 'nullable|string',
            'biography' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'reign_start' => 'nullable|date',
            'reign_end' => 'nullable|date',
            'display_order' => 'nullable|integer',
            'palace_address' => 'nullable|string',
            'contact_email' => 'nullable|email',
            'contact_phone' => 'nullable|string',
            'achievements' => 'nullable|array',
            'achievements.*' => 'nullable|string',
            'development_projects' => 'nullable|array',
            'development_projects.*' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($onisan->image_url && file_exists(public_path($onisan->image_url))) {
                unlink(public_path($onisan->image_url));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/onisan'), $imageName);
            $validated['image_url'] = 'images/onisan/' . $imageName;
        }

        // Update slug if name changed
        if ($onisan->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Clean up achievements and development_projects arrays (remove empty values)
        if (isset($validated['achievements'])) {
            $validated['achievements'] = array_values(array_filter($validated['achievements']));
        }

        if (isset($validated['development_projects'])) {
            $validated['development_projects'] = array_values(array_filter($validated['development_projects']));
        }

        // Update the onisan with validated data first
        $onisan->update($validated);

        // Handle is_current checkbox separately (after main update)
        // Only change is_current if the checkbox was explicitly checked or if we're removing current status
        if ($request->has('is_current') && $request->input('is_current') == '1') {
            // User wants to mark this as current
            if (!$onisan->is_current) {
                Onisan::where('is_current', true)->update(['is_current' => false]);
                $onisan->is_current = true;
                $onisan->save();
            }
        } elseif ($request->has('is_current') && $request->input('is_current') == '0' && !$onisan->is_current) {
            // Checkbox explicitly unchecked for a non-current onisan - keep it as not current
            $onisan->is_current = false;
            $onisan->save();
        }
        // If is_current checkbox not in request OR onisan is already current and checkbox is 0, preserve current status (do nothing)

        // Handle is_published checkbox separately
        if ($request->has('is_published')) {
            $onisan->is_published = $request->input('is_published') == '1';
            $onisan->save();
        }

        return redirect()->route('admin.onisans.index')->with('success', 'Onisan updated successfully!');
    }

    /**
     * Remove the specified Onisan
     */
    public function destroy(Onisan $onisan)
    {
        // Delete image file
        if ($onisan->image_url && file_exists(public_path($onisan->image_url))) {
            unlink(public_path($onisan->image_url));
        }

        $onisan->delete();

        return redirect()->route('admin.onisans.index')->with('success', 'Onisan deleted successfully!');
    }
}
