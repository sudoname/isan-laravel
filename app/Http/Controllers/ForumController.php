<?php

namespace App\Http\Controllers;

use App\Models\WhatsAppGroup;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    /**
     * Display the forum index with WhatsApp groups
     */
    public function index()
    {
        // Get all active WhatsApp groups, ordered by category and display order
        $groups = WhatsAppGroup::active()
            ->ordered()
            ->get()
            ->groupBy('category');

        return view('forum.index', compact('groups'));
    }

    /**
     * Display a specific forum category
     */
    public function category($slug)
    {
        // TODO: Implement forum categories
        return view('forum.category');
    }

    /**
     * Display a specific forum topic
     */
    public function topic($topic)
    {
        // TODO: Implement forum topics
        return view('forum.topic');
    }

    /**
     * Show form to create a new topic
     */
    public function createTopic($slug)
    {
        // TODO: Implement create topic
        return view('forum.create-topic');
    }

    /**
     * Store a new topic
     */
    public function storeTopic(Request $request, $slug)
    {
        // TODO: Implement store topic
    }

    /**
     * Store a reply to a topic
     */
    public function storeReply(Request $request, $topic)
    {
        // TODO: Implement store reply
    }
}
