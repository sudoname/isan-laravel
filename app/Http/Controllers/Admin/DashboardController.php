<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Onisan;
use App\Models\News;
use App\Models\User;
use App\Models\Hero;
use App\Models\Page;
use App\Models\Attraction;
use App\Models\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        $stats = [
            // Onisans
            'total_onisans' => Onisan::count(),
            'published_onisans' => Onisan::where('is_published', true)->count(),
            'current_onisan' => Onisan::where('is_current', true)->first(),

            // News
            'total_news' => News::count(),
            'published_news' => News::where('is_published', true)->count(),

            // Heroes
            'total_heroes' => Hero::count(),
            'published_heroes' => Hero::where('is_published', true)->count(),
            'featured_heroes' => Hero::where('is_featured', true)->count(),

            // Pages
            'total_pages' => Page::count(),
            'published_pages' => Page::where('is_published', true)->count(),

            // Attractions
            'total_attractions' => Attraction::count(),
            'published_attractions' => Attraction::where('is_published', true)->count(),
            'featured_attractions' => Attraction::where('is_featured', true)->count(),

            // Users & Registrations
            'total_users' => User::count(),
            'admin_users' => User::where('is_admin', true)->count(),
            'total_registrations' => Registration::count(),
            'pending_registrations' => Registration::where('status', 'pending')->count(),
            'approved_registrations' => Registration::where('status', 'approved')->count(),
        ];

        // Recent data
        $recent_onisans = Onisan::orderBy('created_at', 'desc')->take(5)->get();
        $recent_news = News::orderBy('created_at', 'desc')->take(5)->get();
        $recent_heroes = Hero::orderBy('created_at', 'desc')->take(5)->get();
        $recent_registrations = Registration::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'stats',
            'recent_onisans',
            'recent_news',
            'recent_heroes',
            'recent_registrations'
        ));
    }
}
