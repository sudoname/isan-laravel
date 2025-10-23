<?php

namespace App\Http\Controllers;

use App\Models\HeroNomination;
use Illuminate\Http\Request;

class HeroNominationController extends Controller
{
    /**
     * Show the nomination form
     */
    public function create()
    {
        $categories = [
            'Academia', 'Business', 'Politics', 'Healthcare',
            'Law', 'Arts & Culture', 'Engineering', 'Military', 'Other'
        ];

        return view('hero-nominations.create', compact('categories'));
    }

    /**
     * Store a new nomination
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nominee_name' => 'required|string|max:255',
            'nominee_title' => 'nullable|string|max:255',
            'category' => 'required|string|max:255',
            'reason' => 'required|string|min:50',
            'achievements' => 'nullable|string',
            'nominator_name' => 'required|string|max:255',
            'nominator_email' => 'required|email|max:255',
            'nominator_phone' => 'nullable|string|max:50',
        ]);

        HeroNomination::create($validated);

        return redirect()->route('hero-nominations.create')
            ->with('success', 'Thank you! Your hero nomination has been submitted successfully. We will review it and get back to you soon.');
    }

    /**
     * Show list of approved nominations
     */
    public function index()
    {
        $nominations = HeroNomination::approved()
            ->latest()
            ->paginate(12);

        return view('hero-nominations.index', compact('nominations'));
    }
}
