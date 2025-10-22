@extends('layouts.public')

@section('title', 'Attractions in Isan Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1484318571209-661cf29a69c3?w=1920&h=600&fit=crop"
                 alt="Beautiful landscape"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-900/95 to-orange-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Attractions & Landmarks</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Discover the beautiful sites, landmarks, and hidden gems of Isan Ekiti
            </p>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <span class="text-orange-600 font-semibold text-sm uppercase tracking-wider">Explore</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 mt-2">Experience Isan Ekiti</h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Isan Ekiti is blessed with natural beauty, rich cultural sites, and historical landmarks that
                    tell the story of our people. From sacred groves to modern facilities, explore what makes
                    our town unique and worth visiting.
                </p>
            </div>
        </div>
    </section>

    <!-- Attractions Grid -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($attractions->isEmpty())
                <div class="text-center py-20">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-map-marked-alt text-6xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Attractions Yet</h3>
                    <p class="text-gray-600">Check back soon for exciting places to visit in Isan Ekiti!</p>
                </div>
            @else
                <!-- Featured Attractions -->
                @php
                    $featured = $attractions->where('is_featured', true)->take(2);
                    $regular = $attractions->where('is_featured', false);
                @endphp

                @if($featured->isNotEmpty())
                    <div class="mb-16">
                        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Featured Attractions</h2>
                        <div class="grid md:grid-cols-2 gap-8">
                            @foreach($featured as $attraction)
                                <div class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500 h-[600px]">
                                    @if($attraction->image_url)
                                        <img src="{{ asset('storage/' . $attraction->image_url) }}"
                                             alt="{{ $attraction->name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1590012314607-cda9d9b699ae?w=800&h=1200&fit=crop"
                                             alt="{{ $attraction->name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/50 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-10 text-white">
                                        <span class="inline-block bg-{{ $attraction->category_color }}-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                                            {{ $attraction->category }}
                                        </span>
                                        <h3 class="text-4xl font-bold mb-4">{{ $attraction->name }}</h3>
                                        <p class="text-xl text-gray-200 mb-4 leading-relaxed">
                                            {{ $attraction->description }}
                                        </p>
                                        @if($attraction->location)
                                            <div class="flex items-center gap-2 text-sm text-gray-300">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <span>{{ $attraction->location }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Regular Attractions -->
                @if($regular->isNotEmpty())
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">More Places to Visit</h2>
                        <div class="grid md:grid-cols-3 gap-8">
                            @foreach($regular as $attraction)
                                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                                    <div class="relative h-64 overflow-hidden">
                                        @if($attraction->image_url)
                                            <img src="{{ asset('storage/' . $attraction->image_url) }}"
                                                 alt="{{ $attraction->name }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <img src="https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?w=600&h=400&fit=crop"
                                                 alt="{{ $attraction->name }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @endif
                                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                                        <span class="absolute top-4 right-4 bg-{{ $attraction->category_color }}-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                                            {{ $attraction->category }}
                                        </span>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $attraction->name }}</h3>
                                        <p class="text-gray-600 mb-4 leading-relaxed">
                                            {{ $attraction->description }}
                                        </p>
                                        @if($attraction->location)
                                            <div class="flex items-center text-sm text-gray-500">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                </svg>
                                                {{ $attraction->location }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=1920&h=600&fit=crop"
                 alt="CTA Background"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-900/95 to-orange-700/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Plan Your Visit</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Experience the beauty and culture of Isan Ekiti firsthand. Connect with us today!
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('contact') }}"
                   class="inline-block bg-white text-orange-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-orange-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                    Contact Us
                </a>
                <a href="{{ route('isan-day') }}"
                   class="inline-block border-3 border-white text-white px-12 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-orange-700 transition-all duration-300">
                    Isan Day Celebration
                </a>
            </div>
        </div>
    </section>
@endsection
