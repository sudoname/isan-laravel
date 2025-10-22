<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatsAppGroup;
use Illuminate\Http\Request;

class WhatsAppGroupController extends Controller
{
    /**
     * Display a listing of the WhatsApp groups.
     */
    public function index(Request $request)
    {
        $query = WhatsAppGroup::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('admin_name', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $groups = $query->ordered()->paginate(15);

        $categories = ['General', 'Business', 'Youth', 'Women', 'Men', 'Diaspora'];

        return view('admin.whatsapp-groups.index', compact('groups', 'categories'));
    }

    /**
     * Show the form for creating a new WhatsApp group.
     */
    public function create()
    {
        $categories = ['General', 'Business', 'Youth', 'Women', 'Men', 'Diaspora'];
        return view('admin.whatsapp-groups.create', compact('categories'));
    }

    /**
     * Store a newly created WhatsApp group in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'admin_name' => 'nullable|string|max:255',
            'admin_phone' => 'nullable|string|max:255',
            'invite_link' => 'required|url',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');

        WhatsAppGroup::create($validated);

        return redirect()->route('admin.whatsapp-groups.index')
            ->with('success', 'WhatsApp group created successfully!');
    }

    /**
     * Display the specified WhatsApp group.
     */
    public function show(WhatsAppGroup $whatsappGroup)
    {
        return redirect()->route('admin.whatsapp-groups.edit', $whatsappGroup);
    }

    /**
     * Show the form for editing the specified WhatsApp group.
     */
    public function edit(WhatsAppGroup $whatsappGroup)
    {
        $categories = ['General', 'Business', 'Youth', 'Women', 'Men', 'Diaspora'];
        return view('admin.whatsapp-groups.edit', compact('whatsappGroup', 'categories'));
    }

    /**
     * Update the specified WhatsApp group in storage.
     */
    public function update(Request $request, WhatsAppGroup $whatsappGroup)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'admin_name' => 'nullable|string|max:255',
            'admin_phone' => 'nullable|string|max:255',
            'invite_link' => 'required|url',
            'category' => 'required|string|max:255',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer|min:0',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $whatsappGroup->update($validated);

        return redirect()->route('admin.whatsapp-groups.index')
            ->with('success', 'WhatsApp group updated successfully!');
    }

    /**
     * Remove the specified WhatsApp group from storage.
     */
    public function destroy(WhatsAppGroup $whatsappGroup)
    {
        $whatsappGroup->delete();

        return redirect()->route('admin.whatsapp-groups.index')
            ->with('success', 'WhatsApp group deleted successfully!');
    }
}
