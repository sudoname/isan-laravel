<?php

namespace App\Http\Controllers;

use App\Models\Attraction;
use App\Models\Hero;
use App\Models\NaturalResource;
use App\Models\Onisan;
use App\Models\ProgressiveUnionOfficial;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function heroes()
    {
        $heroes = Hero::published()->ordered()->get();
        return view('heroes', compact('heroes'));
    }

    public function heroDetail(Hero $hero)
    {
        // Automatically filtered by slug using route model binding
        if (!$hero->is_published) {
            abort(404);
        }

        return view('hero-detail', compact('hero'));
    }

    public function onisan()
    {
        $currentOnisan = Onisan::published()->current()->first();
        $pastOnisans = Onisan::published()->where('is_current', false)->ordered()->get();

        return view('onisan', compact('currentOnisan', 'pastOnisans'));
    }

    public function onisanDetail(Onisan $onisan)
    {
        // Automatically filtered by slug using route model binding
        if (!$onisan->is_published) {
            abort(404);
        }

        return view('onisan-detail', compact('onisan'));
    }

    public function history()
    {
        // Try to get the history page from the database
        $page = \App\Models\Page::where('slug', 'history')->published()->first();

        // If database page exists, use it; otherwise use the static view
        if ($page) {
            return view('page', compact('page'));
        }

        return view('history');
    }

    public function progressiveUnion()
    {
        $officialsByYear = ProgressiveUnionOfficial::active()
            ->ordered()
            ->get()
            ->groupBy('year_from');

        return view('progressive-union', compact('officialsByYear'));
    }

    public function naturalResources()
    {
        $resources = NaturalResource::published()->ordered()->get();

        // Group resources by category for better organization
        $resourcesByCategory = $resources->groupBy('category');

        return view('natural-resources', compact('resources', 'resourcesByCategory'));
    }

    public function attractions()
    {
        $attractions = Attraction::published()->ordered()->get();
        return view('attractions', compact('attractions'));
    }

    public function isanDay()
    {
        $upcomingCelebrations = \App\Models\IsanDayCelebration::published()
            ->upcoming()
            ->take(3)
            ->get();

        $pastCelebrations = \App\Models\IsanDayCelebration::published()
            ->past()
            ->take(6)
            ->get();

        $pageSettings = \App\Models\IsanDayPageSettings::getSettings();

        return view('isan-day', compact('upcomingCelebrations', 'pastCelebrations', 'pageSettings'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // TODO: Implement contact form submission (email/database)

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
