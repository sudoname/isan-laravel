<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationApproved;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
     * Approve the specified registration.
     */
    public function approve(Registration $registration)
    {
        $registration->update(['status' => 'approved']);

        // Send approval email to the registrant
        try {
            Mail::to($registration->email)->send(new RegistrationApproved($registration));
            $message = 'Registration approved successfully! Approval email sent to ' . $registration->email;
        } catch (\Exception $e) {
            \Log::error('Failed to send registration approval email: ' . $e->getMessage());
            $message = 'Registration approved successfully! However, the approval email could not be sent.';
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * Reject the specified registration.
     */
    public function reject(Registration $registration)
    {
        $registration->update(['status' => 'rejected']);

        return redirect()->back()
            ->with('success', 'Registration rejected.');
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
