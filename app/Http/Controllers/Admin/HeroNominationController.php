<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroNomination;
use App\Models\HeroNominationVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HeroNominationController extends Controller
{
    /**
     * Display a listing of nominations
     */
    public function index(Request $request)
    {
        $query = HeroNomination::query();

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nominee_name', 'like', "%{$search}%")
                  ->orWhere('nominator_name', 'like', "%{$search}%")
                  ->orWhere('nominator_email', 'like', "%{$search}%");
            });
        }

        $nominations = $query->latest()->paginate(15);

        $categories = [
            'Academia', 'Business', 'Politics', 'Healthcare',
            'Law', 'Arts & Culture', 'Engineering', 'Military', 'Other'
        ];

        return view('admin.hero-nominations.index', compact('nominations', 'categories'));
    }

    /**
     * Display the specified nomination
     */
    public function show(HeroNomination $heroNomination)
    {
        return view('admin.hero-nominations.show', compact('heroNomination'));
    }

    /**
     * Approve a nomination
     */
    public function approve(HeroNomination $heroNomination)
    {
        $heroNomination->update(['status' => 'approved']);

        return back()->with('success', 'Nomination approved successfully!');
    }

    /**
     * Reject a nomination
     */
    public function reject(HeroNomination $heroNomination, Request $request)
    {
        $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        $heroNomination->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', 'Nomination rejected.');
    }

    /**
     * Delete a nomination
     */
    public function destroy(HeroNomination $heroNomination)
    {
        $heroNomination->delete();

        return redirect()->route('admin.hero-nominations.index')
            ->with('success', 'Nomination deleted successfully!');
    }

    /**
     * Vote on a nomination (1-10 scale)
     */
    public function vote(HeroNomination $heroNomination, Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Update or create vote
        HeroNominationVote::updateOrCreate(
            [
                'hero_nomination_id' => $heroNomination->id,
                'user_id' => Auth::id(),
            ],
            [
                'rating' => $request->rating,
                'comment' => $request->comment,
            ]
        );

        return back()->with('success', 'Your vote has been recorded!');
    }
}
