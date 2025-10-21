<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the registrations.
     */
    public function index(Request $request)
    {
        $query = Registration::with('user');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('hometown', 'like', "%{$search}%");
            });
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by gender
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        // Filter by hometown
        if ($request->filled('hometown')) {
            $query->where('hometown', $request->hometown);
        }

        $registrations = $query->orderBy('created_at', 'desc')->paginate(15);

        // Get unique hometowns for filter
        $hometowns = Registration::select('hometown')
            ->distinct()
            ->whereNotNull('hometown')
            ->orderBy('hometown')
            ->pluck('hometown');

        return view('admin.registrations.index', compact('registrations', 'hometowns'));
    }

    /**
     * Display the specified registration.
     */
    public function show(Registration $registration)
    {
        $registration->load('user');
        return view('admin.registrations.show', compact('registration'));
    }

    /**
     * Remove the specified registration from storage.
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->route('admin.registrations.index')
            ->with('success', 'Registration deleted successfully!');
    }
}
