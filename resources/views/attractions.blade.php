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

    <!-- Main Attractions Grid -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Must-Visit Places</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Explore the landmarks and natural wonders that define Isan Ekiti
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <!-- Featured Attraction 1 -->
                <div class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500 h-[600px]">
                    <img src="https://images.unsplash.com/photo-1590012314607-cda9d9b699ae?w=800&h=1200&fit=crop"
                         alt="Traditional palace"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-10 text-white">
                        <span class="inline-block bg-orange-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            Historical Site
                        </span>
                        <h3 class="text-4xl font-bold mb-4">Alisan's Palace</h3>
                        <p class="text-xl text-gray-200 mb-4 leading-relaxed">
                            The traditional palace of the paramount ruler of Isan Ekiti. A stunning architectural
                            masterpiece that showcases Yoruba traditional design and serves as the seat of
                            traditional governance.
                        </p>
                        <div class="flex items-center gap-4 text-sm text-gray-300">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Town Center</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Open to visitors</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured Attraction 2 -->
                <div class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-500 h-[600px]">
                    <img src="https://images.unsplash.com/photo-1502082553048-f009c37129b9?w=800&h=1200&fit=crop"
                         alt="Sacred grove"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/95 via-green-900/50 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-10 text-white">
                        <span class="inline-block bg-green-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                            Natural Site
                        </span>
                        <h3 class="text-4xl font-bold mb-4">Sacred Grove</h3>
                        <p class="text-xl text-gray-200 mb-4 leading-relaxed">
                            A pristine forest preserve that holds deep spiritual significance to the Isan Ekiti
                            people. Home to ancient trees and traditional shrines, this sacred space connects
                            us to our ancestral roots.
                        </p>
                        <div class="flex items-center gap-4 text-sm text-gray-300">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Outskirts</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Guided tours available</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Secondary Attractions Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Attraction Card 1 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1588345921523-c2dcdb7f1dcd?w=600&h=400&fit=crop"
                             alt="Town hall"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                        <span class="absolute top-4 right-4 bg-blue-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Civic
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Community Town Hall</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Modern facility hosting community events, meetings, and celebrations. Features
                            state-of-the-art amenities and a large auditorium.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            Central District
                        </div>
                    </div>
                </div>

                <!-- Attraction Card 2 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1519682337058-a94d519337bc?w=600&h=400&fit=crop"
                             alt="Market"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                        <span class="absolute top-4 right-4 bg-purple-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Market
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Central Market</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Vibrant marketplace where locals trade farm produce, crafts, and traditional items.
                            Experience the bustling energy of daily commerce.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Open daily 7AM - 6PM
                        </div>
                    </div>
                </div>

                <!-- Attraction Card 3 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&h=400&fit=crop"
                             alt="School"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                        <span class="absolute top-4 right-4 bg-green-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Education
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Historic School Building</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            One of the first educational institutions in the region, this historic building
                            represents our commitment to education and learning.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            School District
                        </div>
                    </div>
                </div>

                <!-- Attraction Card 4 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1605732562742-3023a888e56e?w=600&h=400&fit=crop"
                             alt="Stream"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                        <span class="absolute top-4 right-4 bg-cyan-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Nature
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Natural Springs</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Fresh water springs that have sustained the community for generations. A peaceful
                            spot for reflection and connection with nature.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                            </svg>
                            Rural Area
                        </div>
                    </div>
                </div>

                <!-- Attraction Card 5 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1548407260-da850faa41e3?w=600&h=400&fit=crop"
                             alt="Sports complex"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                        <span class="absolute top-4 right-4 bg-red-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Recreation
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Sports Complex</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Modern sports facilities including football pitch, basketball court, and athletics
                            track. Hosts local and regional sporting events.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Open daily
                        </div>
                    </div>
                </div>

                <!-- Attraction Card 6 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-64 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1598599604436-43c2c64e8b1e?w=600&h=400&fit=crop"
                             alt="Monument"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>
                        <span class="absolute top-4 right-4 bg-indigo-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Monument
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Freedom Monument</h3>
                        <p class="text-gray-600 mb-4 leading-relaxed">
                            Monument commemorating Nigeria's independence and the contributions of Isan Ekiti
                            to the nation's development. A symbol of pride and patriotism.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            Town Square
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-orange-600 font-semibold text-sm uppercase tracking-wider">Activities</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Things to Do</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Experience the vibrant culture and activities that Isan Ekiti offers
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Activity 1 -->
                <div class="text-center p-6 bg-gradient-to-br from-orange-50 to-white rounded-2xl hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Cultural Festivals</h3>
                    <p class="text-gray-600">Participate in traditional celebrations with music and dance</p>
                </div>

                <!-- Activity 2 -->
                <div class="text-center p-6 bg-gradient-to-br from-green-50 to-white rounded-2xl hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Nature Walks</h3>
                    <p class="text-gray-600">Explore scenic trails and natural landscapes</p>
                </div>

                <!-- Activity 3 -->
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-white rounded-2xl hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Historical Tours</h3>
                    <p class="text-gray-600">Learn about our heritage with guided historical tours</p>
                </div>

                <!-- Activity 4 -->
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-white rounded-2xl hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Local Crafts</h3>
                    <p class="text-gray-600">Shop for authentic handmade traditional crafts and art</p>
                </div>
            </div>
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
