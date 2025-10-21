@extends('layouts.public')

@section('title', 'Isan Ekiti - Welcome Home')

@section('content')
    <!-- Hero Section with Background Image -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1547471080-7cc2caa01a7e?w=1920&h=1080&fit=crop"
                 alt="Nigerian landscape"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-green-900/90 via-green-800/80 to-green-600/70"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <div class="space-y-8">
                <h1 class="text-5xl md:text-7xl font-bold leading-tight tracking-tight animate-fade-in">
                    Welcome to <span class="text-green-300">Isan Ekiti</span>
                </h1>
                <p class="text-xl md:text-3xl font-light max-w-4xl mx-auto leading-relaxed">
                    A Historic Town in Southwest Nigeria
                    <br class="hidden md:block">
                    <span class="text-green-200">Rich Cultural Heritage • Vibrant Community • Proud Legacy</span>
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
                <a href="{{ route('history') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1577495508326-19a1b3cf65b7?w=600&h=400&fit=crop" alt="History" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/90 via-green-800/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2">Our History</h3>
                        <p class="text-green-100 mb-3">Journey through centuries of rich heritage</p>
                        <span class="inline-flex items-center text-sm font-semibold text-green-300 group-hover:text-white">
                            Explore Now →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 2 - Heroes -->
                <a href="{{ route('heroes') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1531384441138-2736e62e0919?w=600&h=400&fit=crop" alt="Heroes" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/90 via-blue-800/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2">Our Heroes</h3>
                        <p class="text-blue-100 mb-3">Celebrating illustrious sons and daughters</p>
                        <span class="inline-flex items-center text-sm font-semibold text-blue-300 group-hover:text-white">
                            Meet Them →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 3 - Attractions -->
                <a href="{{ route('attractions') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1484318571209-661cf29a69c3?w=600&h=400&fit=crop" alt="Attractions" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-orange-900/90 via-orange-800/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2">Attractions</h3>
                        <p class="text-orange-100 mb-3">Discover beautiful landmarks and sites</p>
                        <span class="inline-flex items-center text-sm font-semibold text-orange-300 group-hover:text-white">
                            Explore →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 4 - Isan Day -->
                <a href="{{ route('isan-day') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=600&h=400&fit=crop" alt="Isan Day" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-purple-900/90 via-purple-800/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2">Isan Day</h3>
                        <p class="text-purple-100 mb-3">Annual celebration of our community</p>
                        <span class="inline-flex items-center text-sm font-semibold text-purple-300 group-hover:text-white">
                            Learn More →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 5 - News -->
                <a href="{{ route('news.index') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&h=400&fit=crop" alt="News" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/90 via-red-800/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2">News & Updates</h3>
                        <p class="text-red-100 mb-3">Stay informed with latest community news</p>
                        <span class="inline-flex items-center text-sm font-semibold text-red-300 group-hover:text-white">
                            Read News →
                        </span>
                    </div>
                </a>

                <!-- Feature Card 6 - Forum -->
                <a href="{{ route('forum.index') }}" class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=600&h=400&fit=crop" alt="Forum" class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/90 via-indigo-800/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <h3 class="text-2xl font-bold mb-2">Community Forum</h3>
                        <p class="text-indigo-100 mb-3">Join discussions with fellow indigenes</p>
                        <span class="inline-flex items-center text-sm font-semibold text-indigo-300 group-hover:text-white">
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
