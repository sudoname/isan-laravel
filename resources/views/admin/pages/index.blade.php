@extends('admin.layouts.admin')

@section('title', 'Manage Pages')
@section('page-title', 'Manage Pages')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Manage all website pages</p>
        </div>
        <a href="{{ route('admin.pages.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
            <i class="fas fa-plus mr-2"></i> Add New Page
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow p-6">
        <form method="GET" action="{{ route('admin.pages.index') }}" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search pages..."
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-search mr-2"></i> Search
                </button>
                @if(request()->hasAny(['search', 'status']))
                    <a href="{{ route('admin.pages.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Pages Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Page
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Order
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Last Updated
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($pages as $page)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($page->featured_image)
                                    <img src="{{ asset('storage/' . $page->featured_image) }}"
                                         alt="{{ $page->title }}"
                                         class="w-12 h-12 rounded object-cover">
                                @else
                                    <div class="w-12 h-12 rounded bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-file-alt text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $page->title }}</div>
                                    <div class="text-sm text-gray-500">/{{ $page->slug }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($page->is_published)
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
                            {{ $page->display_order ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $page->updated_at->format('M d, Y') }}</div>
                            <div class="text-xs text-gray-500">{{ $page->updated_at->diffForHumans() }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('admin.pages.edit', $page) }}"
                                   class="text-blue-600 hover:text-blue-900"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.pages.destroy', $page) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this page? This action cannot be undone.');">
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
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <i class="fas fa-file-alt text-4xl mb-4"></i>
                                <p class="text-lg font-medium">No pages yet</p>
                                <p class="text-sm">Get started by adding your first page</p>
                                <a href="{{ route('admin.pages.create') }}"
                                   class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    <i class="fas fa-plus mr-2"></i> Add New Page
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($pages->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-lg">
            {{ $pages->links() }}
        </div>
    @endif
</div>
@endsection
