@extends('admin.layouts.admin')

@section('title', 'Manage Onisans')
@section('page-title', 'Manage Onisans')

@section('content')
<div class="space-y-6">
    <!-- Header Actions -->
    <div class="flex justify-between items-center">
        <div>
            <p class="text-gray-600">Manage all Onisans (Traditional Rulers)</p>
        </div>
        <a href="{{ route('admin.onisans.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
            <i class="fas fa-plus mr-2"></i> Add New Onisan
        </a>
    </div>

    <!-- Onisans Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Onisan
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Reign Period
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
                @forelse($onisans as $onisan)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($onisan->image_url)
                                    <img src="{{ asset('storage/' . $onisan->image_url) }}"
                                         alt="{{ $onisan->name }}"
                                         class="w-12 h-12 rounded-full object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $onisan->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $onisan->title }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                {{ $onisan->reign_start?->format('Y') ?? 'N/A' }} -
                                {{ $onisan->reign_end?->format('Y') ?? 'Present' }}
                            </div>
                            @if($onisan->reign_duration)
                                <div class="text-xs text-gray-500">{{ $onisan->reign_duration }}</div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-col space-y-1">
                                @if($onisan->is_current)
                                    <span class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded">
                                        <i class="fas fa-crown mr-1"></i> Current
                                    </span>
                                @endif
                                @if($onisan->is_published)
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
                            {{ $onisan->display_order ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <a href="{{ route('onisan.show', $onisan->slug) }}"
                                   target="_blank"
                                   class="text-gray-600 hover:text-gray-900"
                                   title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.onisans.edit', $onisan) }}"
                                   class="text-blue-600 hover:text-blue-900"
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.onisans.destroy', $onisan) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this Onisan? This action cannot be undone.');">
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
                                <i class="fas fa-crown text-4xl mb-4"></i>
                                <p class="text-lg font-medium">No Onisans yet</p>
                                <p class="text-sm">Get started by adding your first Onisan</p>
                                <a href="{{ route('admin.onisans.create') }}"
                                   class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                    <i class="fas fa-plus mr-2"></i> Add New Onisan
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if($onisans->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6 rounded-lg">
            {{ $onisans->links() }}
        </div>
    @endif
</div>
@endsection
