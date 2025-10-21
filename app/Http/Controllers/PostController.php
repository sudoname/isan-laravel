<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of published posts (public).
     */
    public function index()
    {
        $posts = Post::where('published', true)
            ->with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('news.index', compact('posts'));
    }

    /**
     * Display the specified post (public).
     */
    public function show(Post $post)
    {
        // Only show published posts to public
        if (!$post->published && (!Auth::check() || !Auth::user()->is_admin)) {
            abort(404);
        }

        $recentPosts = Post::where('published', true)
            ->where('id', '!=', $post->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('news.show', compact('post', 'recentPosts'));
    }

    /**
     * Display a listing of all posts for admin.
     */
    public function adminIndex()
    {
        $posts = Post::with('author')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created post.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'featured_image' => ['nullable', 'url'],
            'category' => ['nullable', 'string', 'max:100'],
            'published' => ['boolean'],
        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . time(),
            'content' => $validated['content'],
            'excerpt' => $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 200),
            'featured_image' => $validated['featured_image'] ?? null,
            'author_id' => Auth::id(),
            'category' => $validated['category'] ?? 'General',
            'published' => $request->has('published'),
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post created successfully!');
    }

    /**
     * Show the form for editing the post.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified post.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'featured_image' => ['nullable', 'url'],
            'category' => ['nullable', 'string', 'max:100'],
            'published' => ['boolean'],
        ]);

        $post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . $post->id,
            'content' => $validated['content'],
            'excerpt' => $validated['excerpt'] ?? Str::limit(strip_tags($validated['content']), 200),
            'featured_image' => $validated['featured_image'] ?? $post->featured_image,
            'category' => $validated['category'] ?? 'General',
            'published' => $request->has('published'),
        ]);

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified post.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
