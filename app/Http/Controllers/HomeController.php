<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get latest published posts for homepage
        $latestPosts = Post::where('published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home', compact('latestPosts'));
    }
}
