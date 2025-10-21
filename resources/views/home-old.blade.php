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
            <div class="space-y-8 animate-fade-in-up">
                <h1 class="text-5xl md:text-7xl font-bold leading-tight tracking-tight">
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
                    <div class="aspect-w-16 aspect-h-12">
                        <img src="https://images.unsplash.com/photo-1577495508326-19a1b3cf65b7?w=600&h=400&fit=crop"
                             alt="History"
                             class="w-full h-72 object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/90 via-green-800/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-6 h-6 text-green-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <h3 class="text-2xl font-bold">Our History</h3>
                        </div>
                        <p class="text-green-100 mb-3">Journey through centuries of rich heritage and traditions</p>
                        <span class="inline-flex items-center text-sm font-semibold text-green-300 group-hover:text-white transition-colors">
                            Explore Now
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    </div>
                </a>

                <!-- Feature Card 2 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Our Heroes</h3>
                    <p class="text-gray-600 mb-4">Celebrating illustrious sons and daughters who have made Isan Ekiti proud.</p>
                    <a href="{{ route('heroes') }}" class="text-blue-600 font-semibold hover:text-blue-700">
                        Meet Them →
                    </a>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Attractions</h3>
                    <p class="text-gray-600 mb-4">Discover beautiful landmarks, tourist sites, and hidden gems of Isan Ekiti.</p>
                    <a href="{{ route('attractions') }}" class="text-orange-600 font-semibold hover:text-orange-700">
                        Explore →
                    </a>
                </div>

                <!-- Feature Card 4 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Isan Day</h3>
                    <p class="text-gray-600 mb-4">Learn about our annual celebration bringing indigenes together from around the world.</p>
                    <a href="{{ route('isan-day') }}" class="text-purple-600 font-semibold hover:text-purple-700">
                        Learn More →
                    </a>
                </div>

                <!-- Feature Card 5 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">News & Updates</h3>
                    <p class="text-gray-600 mb-4">Stay informed with the latest news and updates from the Isan Ekiti community.</p>
                    <a href="{{ route('news.index') }}" class="text-red-600 font-semibold hover:text-red-700">
                        Read News →
                    </a>
                </div>

                <!-- Feature Card 6 -->
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                    <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Community Forum</h3>
                    <p class="text-gray-600 mb-4">Join discussions, share ideas, and connect with fellow indigenes worldwide.</p>
                    <a href="{{ route('forum.index') }}" class="text-indigo-600 font-semibold hover:text-indigo-700">
                        Join Forum →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="bg-green-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Are You an Indigene of Isan Ekiti?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Register today and stay connected with your roots. Be part of our growing community!
            </p>
            <a href="{{ route('registration') }}" class="inline-block bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Register Now
            </a>
        </div>
    </section>
@endsection
