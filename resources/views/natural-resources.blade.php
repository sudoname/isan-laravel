@extends('layouts.public')

@section('title', 'Natural Resources')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1464207687429-7505649dae38?w=1920&h=600&fit=crop"
                 alt="Natural Resources"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/90 to-green-700/85"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Natural Resources of Isan Ekiti</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Discover the rich natural wealth and resources of our beloved town
            </p>
        </div>
    </section>

    @if($resources->isEmpty())
        <!-- Empty State -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="max-w-2xl mx-auto">
                    <i class="fas fa-seedling text-6xl text-gray-300 mb-4"></i>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Coming Soon</h2>
                    <p class="text-xl text-gray-600">
                        Information about our natural resources will be available here soon.
                    </p>
                </div>
            </div>
        </section>
    @else
        @if($resourcesByCategory->isNotEmpty())
            <!-- Resources by Category -->
            @foreach($resourcesByCategory as $category => $categoryResources)
                <section class="py-20 {{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        @if($category)
                            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">{{ $category }}</h2>
                        @else
                            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Other Resources</h2>
                        @endif

                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($categoryResources as $resource)
                                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                    @if($resource->image)
                                        <div class="h-48 overflow-hidden">
                                            <img src="{{ asset('storage/' . $resource->image) }}"
                                                 alt="{{ $resource->name }}"
                                                 class="w-full h-full object-cover">
                                        </div>
                                    @else
                                        <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                                            <i class="fas fa-leaf text-white text-6xl opacity-50"></i>
                                        </div>
                                    @endif

                                    <div class="p-6">
                                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $resource->name }}</h3>
                                        <p class="text-gray-600 mb-4">{{ $resource->description }}</p>

                                        @if($resource->content)
                                            <details class="mt-4">
                                                <summary class="cursor-pointer text-green-600 hover:text-green-700 font-semibold flex items-center">
                                                    <span>Learn More</span>
                                                    <i class="fas fa-chevron-down ml-2 text-sm"></i>
                                                </summary>
                                                <div class="mt-4 prose prose-sm max-w-none text-gray-700">
                                                    {!! nl2br(e($resource->content)) !!}
                                                </div>
                                            </details>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endforeach
        @else
            <!-- All Resources (No Categories) -->
            <section class="py-20 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($resources as $resource)
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                                @if($resource->image)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $resource->image) }}"
                                             alt="{{ $resource->name }}"
                                             class="w-full h-full object-cover">
                                    </div>
                                @else
                                    <div class="h-48 bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                                        <i class="fas fa-leaf text-white text-6xl opacity-50"></i>
                                    </div>
                                @endif

                                <div class="p-6">
                                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $resource->name }}</h3>
                                    @if($resource->category)
                                        <span class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded mb-3">
                                            {{ $resource->category }}
                                        </span>
                                    @endif
                                    <p class="text-gray-600 mb-4">{{ $resource->description }}</p>

                                    @if($resource->content)
                                        <details class="mt-4">
                                            <summary class="cursor-pointer text-green-600 hover:text-green-700 font-semibold flex items-center">
                                                <span>Learn More</span>
                                                <i class="fas fa-chevron-down ml-2 text-sm"></i>
                                            </summary>
                                            <div class="mt-4 prose prose-sm max-w-none text-gray-700">
                                                {!! nl2br(e($resource->content)) !!}
                                            </div>
                                        </details>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    @endif
@endsection
