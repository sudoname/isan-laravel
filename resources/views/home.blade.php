@extends('layouts.public')

@section('title', 'Isan Ekiti - Welcome Home')

@section('content')
    <!-- Hero Section with Background Image -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            @php
                $settings = \App\Models\SiteSetting::getSettings();
                $heroImage = $settings->homepage_hero_image
                    ? asset('storage/' . $settings->homepage_hero_image)
                    : 'https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?w=1920&h=1080&fit=crop';
            @endphp
            <img src="{{ $heroImage }}"
                 alt="Isan Ekiti"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-900/85 via-purple-800/75 to-indigo-700/65"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <div class="space-y-8">
                <h1 class="text-5xl md:text-7xl font-bold leading-tight tracking-tight animate-fade-in drop-shadow-lg" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.8);">
                    Welcome to Isan Ekiti
                </h1>
                <p class="text-xl md:text-3xl font-light max-w-4xl mx-auto leading-relaxed drop-shadow-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">
                    The Home of Pottery
                    <br class="hidden md:block">
                    <span class="font-semibold drop-shadow-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Rich Cultural Heritage • Vibrant Community • Proud Legacy</span>
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center pt-8">
                    <a href="{{ route('registration') }}"
                       class="group bg-white text-green-700 px-10 py-4 rounded-full font-bold text-lg shadow-2xl hover:shadow-green-500/50 hover:scale-105 transition-all duration-300 flex items-center justify-center gap-2">
                        <span>Register as Indigene</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                    <a href="{{ route('history') }}"
                       class="group border-3 border-white text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-white hover:text-green-700 transition-all duration-300 flex items-center justify-center gap-2">
                        <span>Explore Our History</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-green-600 font-semibold text-sm uppercase tracking-wider">Explore</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Discover Isan Ekiti</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">Explore our rich heritage, vibrant community, and the beauty that makes us unique</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 - History -->
                @php
                    $historyImage = $settings->tile_history_image
                        ? asset('storage/' . $settings->tile_history_image)
                        : 'https://images.unsplash.com/photo-1577495508326-19a1b3cf65b7?w=600&h=400&fit=crop';
                @endphp
                <a href="{{ route('history') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ $historyImage }}" alt="History" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/95 via-green-800/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2 drop-shadow-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Our History</h3>
                        <p class="text-green-50 mb-3 drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">Journey through centuries of rich heritage</p>
                        <span class="inline-flex items-center text-sm font-semibold text-white drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">
                            Explore Now →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 2 - Heroes -->
                @php
                    $heroesImage = $settings->tile_heroes_image
                        ? asset('storage/' . $settings->tile_heroes_image)
                        : 'https://images.unsplash.com/photo-1531384441138-2736e62e0919?w=600&h=400&fit=crop';
                @endphp
                <a href="{{ route('heroes') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ $heroesImage }}" alt="Heroes" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/95 via-blue-800/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2 drop-shadow-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Our Heroes</h3>
                        <p class="text-blue-50 mb-3 drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">Celebrating illustrious sons and daughters</p>
                        <span class="inline-flex items-center text-sm font-semibold text-white drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">
                            Meet Them →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 3 - Attractions -->
                @php
                    $attractionsImage = $settings->tile_attractions_image
                        ? asset('storage/' . $settings->tile_attractions_image)
                        : 'https://images.unsplash.com/photo-1484318571209-661cf29a69c3?w=600&h=400&fit=crop';
                @endphp
                <a href="{{ route('attractions') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ $attractionsImage }}" alt="Attractions" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-900/95 via-orange-800/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2 drop-shadow-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Attractions</h3>
                        <p class="text-orange-50 mb-3 drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">Discover beautiful landmarks and sites</p>
                        <span class="inline-flex items-center text-sm font-semibold text-white drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">
                            Explore →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 4 - Isan Day -->
                @php
                    $isanDayImage = $settings->tile_isan_day_image
                        ? asset('storage/' . $settings->tile_isan_day_image)
                        : 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=600&h=400&fit=crop';
                @endphp
                <a href="{{ route('isan-day') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ $isanDayImage }}" alt="Isan Day" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/95 via-purple-800/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2 drop-shadow-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Isan Day</h3>
                        <p class="text-purple-50 mb-3 drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">Annual celebration of our community</p>
                        <span class="inline-flex items-center text-sm font-semibold text-white drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">
                            Learn More →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 5 - News -->
                @php
                    $newsImage = $settings->tile_news_image
                        ? asset('storage/' . $settings->tile_news_image)
                        : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&h=400&fit=crop';
                @endphp
                <a href="{{ route('news.index') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ $newsImage }}" alt="News" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/95 via-red-800/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2 drop-shadow-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">News & Updates</h3>
                        <p class="text-red-50 mb-3 drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">Stay informed with latest community news</p>
                        <span class="inline-flex items-center text-sm font-semibold text-white drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">
                            Read News →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 6 - Forum -->
                @php
                    $forumImage = $settings->tile_forum_image
                        ? asset('storage/' . $settings->tile_forum_image)
                        : 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=600&h=400&fit=crop';
                @endphp
                <a href="{{ route('forum.index') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="{{ $forumImage }}" alt="Forum" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/95 via-indigo-800/70 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2 drop-shadow-lg" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.8);">Community Forum</h3>
                        <p class="text-indigo-50 mb-3 drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">Join discussions with fellow indigenes</p>
                        <span class="inline-flex items-center text-sm font-semibold text-white drop-shadow-lg" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.7);">
                            Join Forum →
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=1920&h=600&fit=crop" alt="CTA Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/95 to-green-700/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Are You an Indigene of Isan Ekiti?</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Register today and stay connected with your roots. Be part of our growing global community!
            </p>
            <a href="{{ route('registration') }}" class="inline-block bg-white text-green-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-green-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                Register Now - It's Free!
            </a>
        </div>
    </section>
@endsection
