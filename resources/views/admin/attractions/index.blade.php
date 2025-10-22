@extends('admin.layouts.admin')

@section('title', 'Manage Attractions')
@section('page-title', 'Manage Attractions')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Manage tourist attractions and landmarks</p>
        </div>
        <a href="{{ route('admin.attractions.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
            <i class="fas fa-plus mr-2"></i> Add New Attraction
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow p-6">
        <form method="GET" action="{{ route('admin.attractions.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search attractions..."
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <div>
                <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
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
                @if(request()->hasAny(['search', 'category', 'status', 'featured']))
                    <a href="{{ route('admin.attractions.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Attractions Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Attraction
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Category
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
                @forelse($attractions as $attraction)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($attraction->image_url)
                                    <img src="{{ asset('storage/' . $attraction->image_url) }}"
                                         alt="{{ $attraction->name }}"
                                         class="w-12 h-12 rounded object-cover">
                                @else
                                    <div class="w-12 h-12 rounded bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-map-marked-alt text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $attraction->name }}</div>
                                    @if($attraction->description)
                                        <div class="text-sm text-gray-500">{{ Str::limit($attraction->description, 50) }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded">
                                {{ $attraction->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $attraction->location ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-col space-y-1">
                                @if($attraction->is_featured)
                                    <span class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded">
                                        <i class="fas fa-star mr-1"></i> Featured
                                    </span>
                                @endif
                                @if($attraction->is_published)
                                    <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded">
                                        <i class="fas fa-check-circle mr-1"></i> Published
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded">
                                        <i class="fas fa-clock mr-1"></i> Draft
                                    </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $attraction->display_order ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('admin.attractions.edit', $attraction) }}"
                                   class="text-blue-600 hover:text-blue-900"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.attractions.destroy', $attraction) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this attraction? This action cannot be undone.');">
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
                                <i class="fas fa-map-marked-alt text-4xl mb-4"></i>
                                <p class="text-lg font-medium">No attractions yet</p>
                                <p class="text-sm">Get started by adding your first attraction</p>
                                <a href="{{ route('admin.attractions.create') }}"
                                   class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    <i class="fas fa-plus mr-2"></i> Add New Attraction
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($attractions->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-lg">
            {{ $attractions->links() }}
        </div>
    @endif
</div>
@endsection
