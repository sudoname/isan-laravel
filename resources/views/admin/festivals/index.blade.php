@extends('admin.layouts.admin')

@section('title', 'Manage Festivals')
@section('page-title', 'Manage Festivals')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Manage all festivals and cultural events</p>
        </div>
        <a href="{{ route('admin.festivals.create') }}" class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition">
            <i class="fas fa-plus mr-2"></i> Add New Festival
        </a>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow p-6">
        <form method="GET" action="{{ route('admin.festivals.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           placeholder="Search festivals...">
                </div>

                <!-- Status Filter -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" id="status"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">All Status</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <div class="flex space-x-2 w-full">
                        <a href="{{ route('admin.festivals.index') }}"
                           class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Clear Filters
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 flex-1">
                            <i class="fas fa-filter mr-2"></i> Apply Filters
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Festivals Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Festival
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Event Date
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Location
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Order
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($festivals as $festival)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($festival->featured_image)
                                    <img src="{{ asset('storage/' . $festival->featured_image) }}"
                                         alt="{{ $festival->title }}"
                                         class="w-16 h-12 rounded object-cover">
                                @else
                                    <div class="w-16 h-12 rounded bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-calendar-alt text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $festival->title }}</div>
                                    <div class="text-xs text-gray-500">{{ Str::limit($festival->short_description, 50) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                @if($festival->event_date)
                                    {{ $festival->event_date->format('M d, Y') }}
                                @else
                                    <span class="text-gray-400">Not set</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ $festival->location ?? '-' }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($festival->is_published)
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
                            {{ $festival->display_order ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('festivals.show', $festival->slug) }}"
                                   target="_blank"
                                   class="text-gray-600 hover:text-gray-900"
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.festivals.edit', $festival) }}"
                                   class="text-purple-600 hover:text-purple-900"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.festivals.destroy', $festival) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this festival? This action cannot be undone.');">
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
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <i class="fas fa-calendar-alt text-4xl mb-4"></i>
                                <p class="text-lg font-medium">No festivals yet</p>
                                <p class="text-sm">Get started by adding your first festival</p>
                                <a href="{{ route('admin.festivals.create') }}"
                                   class="mt-4 inline-block px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                                    <i class="fas fa-plus mr-2"></i> Add New Festival
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($festivals->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-lg">
            {{ $festivals->links() }}
        </div>
    @endif
</div>
@endsection
