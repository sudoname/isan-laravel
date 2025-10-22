@extends('admin.layouts.admin')

@section('title', 'Manage News & Blogs')
@section('page-title', 'Manage News & Blogs')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Manage all news posts, blogs, and announcements</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
            <i class="fas fa-plus mr-2"></i> Add News/Blog Post
        </a>
    </div>

    <!-- Filter Tabs -->
    <div class="bg-white rounded-lg shadow">
        <div class="border-b border-gray-200">
            <nav class="flex -mb-px">
                <a href="?category=all" class="px-6 py-4 text-sm font-medium {{ !request('category') || request('category') == 'all' ? 'border-b-2 border-green-500 text-green-600' : 'text-gray-500 hover:text-gray-700' }}">
                    All Posts
                </a>
                <a href="?category=news" class="px-6 py-4 text-sm font-medium {{ request('category') == 'news' ? 'border-b-2 border-green-500 text-green-600' : 'text-gray-500 hover:text-gray-700' }}">
                    News
                </a>
                <a href="?category=blog" class="px-6 py-4 text-sm font-medium {{ request('category') == 'blog' ? 'border-b-2 border-green-500 text-green-600' : 'text-gray-500 hover:text-gray-700' }}">
                    Blog
                </a>
                <a href="?category=announcement" class="px-6 py-4 text-sm font-medium {{ request('category') == 'announcement' ? 'border-b-2 border-green-500 text-green-600' : 'text-gray-500 hover:text-gray-700' }}">
                    Announcements
                </a>
            </nav>
        </div>
    </div>

    <!-- News Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Post
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Category
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Author
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Views
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($news as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}"
                                         alt="{{ $post->title }}"
                                         class="w-16 h-16 rounded object-cover">
                                @else
                                    <div class="w-16 h-16 rounded bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-newspaper text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ Str::limit($post->title, 50) }}
                                    </div>
                                    @if($post->excerpt)
                                        <div class="text-xs text-gray-500">
                                            {{ Str::limit($post->excerpt, 60) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded
                                {{ $post->category == 'news' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $post->category == 'blog' ? 'bg-purple-100 text-purple-800' : '' }}
                                {{ $post->category == 'announcement' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                {{ ucfirst($post->category) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $post->author?->name ?? 'Unknown' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $post->published_at?->format('M d, Y') ?? 'Not published' }}
                            </div>
                            <div class="text-xs text-gray-500">
                                Created: {{ $post->created_at->format('M d, Y') }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($post->is_published)
                                <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded">
                                    <i class="fas fa-check-circle mr-1"></i> Published
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded">
                                    <i class="fas fa-clock mr-1"></i> Draft
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <i class="fas fa-eye mr-1"></i> {{ $post->views ?? 0 }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('news.show', $post->slug) }}"
                                   target="_blank"
                                   class="text-gray-600 hover:text-gray-900"
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.news.edit', $post) }}"
                                   class="text-blue-600 hover:text-blue-900"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.news.destroy', $post) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-900"
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <i class="fas fa-newspaper text-4xl mb-4"></i>
                                <p class="text-lg font-medium">No posts yet</p>
                                <p class="text-sm">Get started by creating your first news or blog post</p>
                                <a href="{{ route('admin.news.create') }}"
                                   class="mt-4 inline-block px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                                    <i class="fas fa-plus mr-2"></i> Add News/Blog Post
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($news->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-lg">
            {{ $news->links() }}
        </div>
    @endif
</div>
@endsection
