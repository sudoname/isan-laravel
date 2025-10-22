@extends('admin.layouts.admin')

@section('title', 'Manage Heroes')
@section('page-title', 'Manage Heroes')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Manage all heroes across different categories</p>
        </div>
        <a href="{{ route('admin.heroes.create') }}" class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition">
            <i class="fas fa-plus mr-2"></i> Add New Hero
        </a>
    </div>

    <!-- Search and Filters -->
    <div class="bg-white rounded-lg shadow p-6">
        <form method="GET" action="{{ route('admin.heroes.index') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           placeholder="Search heroes...">
                </div>

                <!-- Category Filter -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select name="category" id="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
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

                <!-- Featured Filter -->
                <div>
                    <label for="featured" class="block text-sm font-medium text-gray-700 mb-2">Featured</label>
                    <select name="featured" id="featured"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">All</option>
                        <option value="yes" {{ request('featured') == 'yes' ? 'selected' : '' }}>Featured Only</option>
                        <option value="no" {{ request('featured') == 'no' ? 'selected' : '' }}>Not Featured</option>
                    </select>
                </div>
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.heroes.index') }}"
                   class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Clear Filters
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                    <i class="fas fa-filter mr-2"></i> Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Heroes Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Hero
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Category
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Position
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
                @forelse($heroes as $hero)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($hero->image_url)
                                    <img src="{{ asset('storage/' . $hero->image_url) }}"
                                         alt="{{ $hero->name }}"
                                         class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $hero->name }}</div>
                                    <div class="text-xs text-gray-500">{{ $hero->title }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded bg-purple-100 text-purple-800">
                                {{ $hero->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900">
                                {{ Str::limit($hero->position ?? 'N/A', 30) }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-col space-y-1">
                                @if($hero->is_featured)
                                    <span class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded">
                                        <i class="fas fa-star mr-1"></i> Featured
                                    </span>
                                @endif
                                @if($hero->is_published)
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
                            {{ $hero->display_order ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('heroes.show', $hero->slug) }}"
                                   target="_blank"
                                   class="text-gray-600 hover:text-gray-900"
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.heroes.edit', $hero) }}"
                                   class="text-purple-600 hover:text-purple-900"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.heroes.destroy', $hero) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this hero? This action cannot be undone.');">
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
                                <i class="fas fa-user-shield text-4xl mb-4"></i>
                                <p class="text-lg font-medium">No heroes yet</p>
                                <p class="text-sm">Get started by adding your first hero</p>
                                <a href="{{ route('admin.heroes.create') }}"
                                   class="mt-4 inline-block px-4 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                                    <i class="fas fa-plus mr-2"></i> Add New Hero
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($heroes->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-lg">
            {{ $heroes->links() }}
        </div>
    @endif
</div>
@endsection
