@extends('layouts.public')

@section('title', $hero->title . ' ' . $hero->name . ' - Heroes of Isan Ekiti')

@section('content')
    <!-- Hero Header Section -->
    <section class="relative h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $hero->image_url ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=1920&h=1080&fit=crop' }}"
                 alt="{{ $hero->name }}"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/95 via-gray-900/80 to-gray-900/60"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
            <div class="max-w-4xl">
                <span class="inline-block bg-{{ $hero->category_color }}-600 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    {{ $hero->category }}
                </span>
                <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">{{ $hero->title }} {{ $hero->name }}</h1>
                <p class="text-2xl md:text-3xl text-gray-200 animate-fade-in-up">{{ $hero->position }}</p>
            </div>
        </div>
    </section>

    <!-- Biography Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <div class="prose prose-lg max-w-none">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Biography</h2>
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $hero->biography }}
                        </div>
                    </div>

                    <!-- Achievements Section -->
                    @if($hero->achievements && count($hero->achievements) > 0)
                        <div class="mt-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Key Achievements</h2>
                            <div class="space-y-4">
                                @foreach($hero->achievements as $achievement)
                                    <div class="flex items-start">
                                        <svg class="w-6 h-6 text-{{ $hero->category_color }}-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <p class="text-gray-700">{{ $achievement }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Awards Section -->
                    @if($hero->awards && count($hero->awards) > 0)
                        <div class="mt-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Awards & Recognitions</h2>
                            <div class="grid sm:grid-cols-2 gap-4">
                                @foreach($hero->awards as $award)
                                    <div class="bg-gradient-to-br from-{{ $hero->category_color }}-50 to-{{ $hero->category_color }}-100 rounded-lg p-6 border border-{{ $hero->category_color }}-200">
                                        <svg class="w-10 h-10 text-{{ $hero->category_color }}-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg>
                                        <p class="text-gray-800 font-medium">{{ $award }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <!-- Quick Info Card -->
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-2xl p-8 sticky top-8 shadow-lg">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Quick Info</h3>

                        <div class="space-y-6">
                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Full Name</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $hero->title }} {{ $hero->name }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Position</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $hero->position }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Field</p>
                                <span class="inline-block bg-{{ $hero->category_color }}-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    {{ $hero->category }}
                                </span>
                            </div>

                            @if($hero->tags && count($hero->tags) > 0)
                                <div>
                                    <p class="text-sm text-gray-500 uppercase tracking-wide mb-3">Expertise</p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($hero->tags as $tag)
                                            <span class="bg-white text-gray-700 px-3 py-1 rounded-full text-xs border border-gray-300">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Social Links -->
                            @if($hero->linkedin_url || $hero->twitter_url || $hero->facebook_url)
                                <div class="pt-6 border-t border-gray-300">
                                    <p class="text-sm text-gray-500 uppercase tracking-wide mb-4">Connect</p>
                                    <div class="flex gap-3">
                                        @if($hero->linkedin_url)
                                            <a href="{{ $hero->linkedin_url }}" target="_blank" class="w-10 h-10 bg-blue-600 hover:bg-blue-700 rounded-full flex items-center justify-center text-white transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                                </svg>
                                            </a>
                                        @endif
                                        @if($hero->twitter_url)
                                            <a href="{{ $hero->twitter_url }}" target="_blank" class="w-10 h-10 bg-sky-500 hover:bg-sky-600 rounded-full flex items-center justify-center text-white transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                                                </svg>
                                            </a>
                                        @endif
                                        @if($hero->facebook_url)
                                            <a href="{{ $hero->facebook_url }}" target="_blank" class="w-10 h-10 bg-blue-700 hover:bg-blue-800 rounded-full flex items-center justify-center text-white transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Other Heroes Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Other Distinguished Indigenes</h2>
                <p class="text-xl text-gray-600">Explore more heroes from Isan Ekiti</p>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('heroes') }}"
                   class="inline-block bg-blue-600 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-blue-700 hover:scale-105 transition-all duration-300 shadow-xl">
                    View All Heroes
                </a>
            </div>
        </div>
    </section>
@endsection
