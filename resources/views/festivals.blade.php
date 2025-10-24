@extends('layouts.public')

@section('title', 'Festivals & Cultural Events in Isan Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=1920&h=600&fit=crop"
                 alt="Festival celebration"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/95 to-purple-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Festivals & Cultural Events</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Experience the vibrant traditions and celebrations of Isan Ekiti
            </p>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Celebrate</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 mt-2">Our Cultural Heritage</h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Isan Ekiti is rich in cultural heritage, with vibrant festivals and events throughout the year.
                    From the New Yam Festival to other traditional celebrations, join us in celebrating our customs
                    and traditions that have been passed down through generations.
                </p>
            </div>
        </div>
    </section>

    <!-- Festivals Grid -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($festivals->isEmpty())
                <div class="text-center py-20">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-calendar-alt text-6xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-700 mb-2">No Festivals Listed Yet</h3>
                    <p class="text-gray-600">Check back soon for upcoming cultural events and celebrations!</p>
                </div>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($festivals as $festival)
                        <a href="{{ route('festivals.show', $festival->slug) }}"
                           class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 block">
                            <!-- Festival Image -->
                            <div class="relative h-64 overflow-hidden">
                                @if($festival->featured_image)
                                    <img src="{{ asset('storage/' . $festival->featured_image) }}"
                                         alt="{{ $festival->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=600&h=400&fit=crop"
                                         alt="{{ $festival->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>

                                <!-- Event Date Badge -->
                                @if($festival->event_date)
                                    <div class="absolute top-4 right-4 bg-purple-600 px-4 py-2 rounded-lg text-white text-center shadow-lg">
                                        <div class="text-xs font-semibold uppercase">{{ $festival->event_date->format('M') }}</div>
                                        <div class="text-2xl font-bold">{{ $festival->event_date->format('d') }}</div>
                                        <div class="text-xs">{{ $festival->event_date->format('Y') }}</div>
                                    </div>
                                @endif
                            </div>

                            <!-- Festival Info -->
                            <div class="p-6">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-purple-600 transition-colors">
                                    {{ $festival->title }}
                                </h3>
                                <p class="text-gray-600 mb-4 leading-relaxed line-clamp-3">
                                    {{ $festival->short_description }}
                                </p>

                                <!-- Location & Date -->
                                <div class="space-y-2">
                                    @if($festival->location)
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $festival->location }}
                                        </div>
                                    @endif
                                    @if($festival->event_date)
                                        <div class="flex items-center text-sm text-gray-500">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $festival->event_date->format('F j, Y') }}
                                        </div>
                                    @endif
                                </div>

                                <!-- Read More Link -->
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <span class="text-purple-600 font-semibold group-hover:text-purple-700 inline-flex items-center">
                                        Learn More
                                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=1920&h=600&fit=crop"
                 alt="Cultural celebration"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/95 to-purple-700/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Join Us in Celebration</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Be part of our vibrant cultural festivities and experience the true spirit of Isan Ekiti
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('contact') }}"
                   class="inline-block bg-white text-purple-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-purple-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                    Contact Us
                </a>
                <a href="{{ route('isan-day') }}"
                   class="inline-block border-3 border-white text-white px-12 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-purple-700 transition-all duration-300">
                    Isan Day Celebration
                </a>
            </div>
        </div>
    </section>
@endsection
