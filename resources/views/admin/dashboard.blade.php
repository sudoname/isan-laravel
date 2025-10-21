@extends('admin.layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Onisans Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                    <i class="fas fa-crown text-white text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Onisans</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_onisans'] }}</p>
                    <p class="text-xs text-gray-500">{{ $stats['published_onisans'] }} Published</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.onisans.index') }}" class="text-sm text-blue-600 hover:text-blue-800">
                    View all <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- News Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                    <i class="fas fa-newspaper text-white text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">News & Blog</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_news'] }}</p>
                    <p class="text-xs text-gray-500">{{ $stats['published_news'] }} Published</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.news.index') }}" class="text-sm text-green-600 hover:text-green-800">
                    View all <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Heroes Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                    <i class="fas fa-star text-white text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Heroes</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_heroes'] }}</p>
                    <p class="text-xs text-gray-500">{{ $stats['featured_heroes'] }} Featured</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.heroes.index') }}" class="text-sm text-purple-600 hover:text-purple-800">
                    View all <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Attractions Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                    <i class="fas fa-map-marked-alt text-white text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Attractions</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_attractions'] }}</p>
                    <p class="text-xs text-gray-500">{{ $stats['featured_attractions'] }} Featured</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.attractions.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                    View all <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Pages Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-cyan-500 rounded-md p-3">
                    <i class="fas fa-file-alt text-white text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Pages</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_pages'] }}</p>
                    <p class="text-xs text-gray-500">{{ $stats['published_pages'] }} Published</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.pages.index') }}" class="text-sm text-cyan-600 hover:text-cyan-800">
                    View all <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Users Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-orange-500 rounded-md p-3">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Total Users</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_users'] }}</p>
                    <p class="text-xs text-gray-500">{{ $stats['admin_users'] }} Admins</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.users.index') }}" class="text-sm text-orange-600 hover:text-orange-800">
                    View all <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        <!-- Registrations Stats -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-pink-500 rounded-md p-3">
                    <i class="fas fa-user-check text-white text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Registrations</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_registrations'] }}</p>
                    <p class="text-xs text-gray-500">{{ $stats['pending_registrations'] }} Pending</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.registrations.index') }}" class="text-sm text-pink-600 hover:text-pink-800">
                    View all <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Current Onisan -->
    @if($stats['current_onisan'])
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4 flex items-center">
            <i class="fas fa-crown text-yellow-500 mr-2"></i>
            Current Onisan
        </h3>
        <div class="flex items-center space-x-4">
            @if($stats['current_onisan']->image_url)
                <img src="{{ asset('storage/' . $stats['current_onisan']->image_url) }}"
                     alt="{{ $stats['current_onisan']->name }}"
                     class="w-20 h-20 rounded-full object-cover">
            @else
                <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-user text-gray-400 text-2xl"></i>
                </div>
            @endif
            <div>
                <h4 class="text-xl font-semibold">{{ $stats['current_onisan']->name }}</h4>
                <p class="text-gray-600">{{ $stats['current_onisan']->title }}</p>
                <p class="text-sm text-gray-500">Reign: {{ $stats['current_onisan']->reign_start?->format('Y') }} - Present</p>
            </div>
            <div class="ml-auto">
                <a href="{{ route('admin.onisans.edit', $stats['current_onisan']) }}"
                   class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    <i class="fas fa-edit mr-1"></i> Edit
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Heroes -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold">Recent Heroes</h3>
                <a href="{{ route('admin.heroes.create') }}" class="text-sm text-purple-600 hover:text-purple-800">
                    <i class="fas fa-plus mr-1"></i> Add New
                </a>
            </div>
            <div class="p-6">
                @forelse($recent_heroes as $hero)
                    <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                        <div class="flex items-center space-x-3">
                            @if($hero->image_url)
                                <img src="{{ asset('storage/' . $hero->image_url) }}"
                                     alt="{{ $hero->name }}"
                                     class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-400"></i>
                                </div>
                            @endif
                            <div>
                                <p class="font-medium">{{ Str::limit($hero->name, 30) }}</p>
                                <p class="text-sm text-gray-500">{{ $hero->category }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            @if($hero->is_featured)
                                <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">Featured</span>
                            @endif
                            @if($hero->is_published)
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Published</span>
                            @else
                                <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded">Draft</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">No heroes yet</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Registrations -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold">Recent Registrations</h3>
                <a href="{{ route('admin.registrations.index') }}" class="text-sm text-pink-600 hover:text-pink-800">
                    View all <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="p-6">
                @forelse($recent_registrations as $registration)
                    <div class="flex items-center justify-between py-3 border-b border-gray-100 last:border-0">
                        <div>
                            <p class="font-medium">{{ $registration->full_name }}</p>
                            <p class="text-sm text-gray-500">{{ $registration->hometown ?? 'N/A' }} • {{ $registration->created_at->diffForHumans() }}</p>
                        </div>
                        <span class="px-2 py-1 text-xs bg-{{ $registration->status_color }}-100 text-{{ $registration->status_color }}-800 rounded capitalize">
                            {{ $registration->status }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-4">No registrations yet</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.heroes.create') }}" class="flex items-center justify-center px-6 py-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition">
                <i class="fas fa-plus-circle text-purple-500 mr-2"></i>
                <span class="font-medium">Create Hero</span>
            </a>

            <a href="{{ route('admin.pages.create') }}" class="flex items-center justify-center px-6 py-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-cyan-500 hover:bg-cyan-50 transition">
                <i class="fas fa-plus-circle text-cyan-500 mr-2"></i>
                <span class="font-medium">Create Page</span>
            </a>

            <a href="{{ route('admin.attractions.create') }}" class="flex items-center justify-center px-6 py-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-indigo-500 hover:bg-indigo-50 transition">
                <i class="fas fa-plus-circle text-indigo-500 mr-2"></i>
                <span class="font-medium">Create Attraction</span>
            </a>

            <a href="{{ route('admin.settings.edit') }}" class="flex items-center justify-center px-6 py-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-gray-500 hover:bg-gray-50 transition">
                <i class="fas fa-cog text-gray-500 mr-2"></i>
                <span class="font-medium">Site Settings</span>
            </a>
        </div>
    </div>
</div>
@endsection
