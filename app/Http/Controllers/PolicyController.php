<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PolicyController extends Controller
{
    /**
     * Display the privacy policy page
     */
    public function privacy(): View
    {
        return view('policy.privacy');
    }

    /**
     * Display the terms of service page
     */
    public function terms(): View
    {
        return view('policy.terms');
    }

    /**
     * Display the Facebook data deletion callback page
     */
    public function facebookCallback(): View
    {
        return view('policy.facebook-callback');
    }
}
