@extends('layouts.public')

@section('title', 'Isan Day Celebration')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=1920&h=1080&fit=crop"
                 alt="Festival celebration"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-900/90 via-purple-800/80 to-pink-700/70"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <div class="space-y-8">
                <span class="inline-block bg-purple-600 text-white px-6 py-3 rounded-full font-bold text-lg animate-fade-in">
                    Annual Celebration
                </span>
                <h1 class="text-5xl md:text-7xl font-bold leading-tight tracking-tight animate-fade-in">
                    Isan Day
                </h1>
                <p class="text-xl md:text-3xl font-light max-w-4xl mx-auto leading-relaxed animate-fade-in-up">
                    Bringing Indigenes Together from Around the World
                    <br class="hidden md:block">
                    <span class="text-purple-200">Unity • Culture • Celebration</span>
                </p>
                <div class="pt-8 animate-fade-in-up">
                    @if($upcomingCelebrations->isNotEmpty())
                        @php $nextCelebration = $upcomingCelebrations->first(); @endphp
                        <div class="inline-block bg-white/10 backdrop-blur-sm px-12 py-6 rounded-2xl border-2 border-white/30">
                            <p class="text-lg text-purple-200 mb-2">Next Celebration</p>
                            <p class="text-4xl font-bold">{{ $nextCelebration->formatted_date }}</p>
                            @if($nextCelebration->theme)
                                <p class="text-lg text-purple-200 mt-2">{{ $nextCelebration->theme }}</p>
                            @endif
                        </div>
                    @else
                        <div class="inline-block bg-white/10 backdrop-blur-sm px-12 py-6 rounded-2xl border-2 border-white/30">
                            <p class="text-lg text-purple-200 mb-2">Next Celebration</p>
                            <p class="text-4xl font-bold">November 2025</p>
                        </div>
                    @endif
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

    <!-- About Isan Day Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">About</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 mt-2">What is Isan Day?</h2>
                    <p class="text-lg text-gray-600 mb-4 leading-relaxed">
                        Isan Day is an annual celebration that brings together all indigenes of Isan Ekiti, both at
                        home and in the diaspora, to celebrate our shared heritage, culture, and achievements.
                    </p>
                    <p class="text-lg text-gray-600 mb-4 leading-relaxed">
                        Held every November, this grand event features cultural performances, traditional ceremonies,
                        educational programs, networking opportunities, and various activities that showcase the best
                        of Isan Ekiti.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        It's a time for reunion, reflection, and renewal of our commitment to the progress and
                        development of our beloved town.
                    </p>
                </div>
                <div class="order-1 md:order-2">
                    <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?w=800&h=600&fit=crop"
                         alt="Cultural celebration"
                         class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Event Highlights Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Program</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Event Highlights</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Experience the rich program of activities during Isan Day celebration
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Highlight Card 1 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=600&h=400&fit=crop"
                             alt="Cultural performance"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-purple-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Day 1
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Cultural Performances</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Traditional music, dance performances, and cultural displays showcasing the rich heritage
                            of Isan Ekiti. Features local artists and cultural troupes.
                        </p>
                        <div class="flex items-center text-sm text-purple-600 font-semibold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            6:00 PM - 10:00 PM
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 2 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600&h=400&fit=crop"
                             alt="Community gathering"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-blue-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Day 1
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Grand Reception</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Welcome ceremony for all indigenes featuring speeches from community leaders, recognition
                            of distinguished guests, and networking opportunities.
                        </p>
                        <div class="flex items-center text-sm text-blue-600 font-semibold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            2:00 PM - 5:00 PM
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 3 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600&h=400&fit=crop"
                             alt="Sports"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-green-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Day 2
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Sports & Recreation</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Football tournament, athletics competition, and other sporting activities. Brings together
                            youth and adults in friendly competition.
                        </p>
                        <div class="flex items-center text-sm text-green-600 font-semibold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            8:00 AM - 2:00 PM
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 4 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=600&h=400&fit=crop"
                             alt="Educational seminar"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-orange-900/80 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-orange-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Day 2
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Development Summit</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Strategic planning session discussing community development, infrastructure projects,
                            and initiatives to improve Isan Ekiti.
                        </p>
                        <div class="flex items-center text-sm text-orange-600 font-semibold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            3:00 PM - 6:00 PM
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 5 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=600&h=400&fit=crop"
                             alt="Food festival"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/80 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-red-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Day 3
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Traditional Cuisine Fair</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Showcase of traditional Ekiti delicacies and cooking demonstrations. Sample authentic
                            local dishes and learn about culinary heritage.
                        </p>
                        <div class="flex items-center text-sm text-red-600 font-semibold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            11:00 AM - 4:00 PM
                        </div>
                    </div>
                </div>

                <!-- Highlight Card 6 -->
                <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=600&h=400&fit=crop"
                             alt="Gala night"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/80 to-transparent"></div>
                        <div class="absolute top-4 right-4 bg-indigo-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                            Day 3
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Grand Gala Night</h3>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Elegant evening celebration featuring awards ceremony honoring outstanding indigenes,
                            dinner, live entertainment, and dancing.
                        </p>
                        <div class="flex items-center text-sm text-indigo-600 font-semibold">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            7:00 PM - 12:00 AM
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Past Events Gallery Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Memories</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Past Celebrations</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Relive the memorable moments from previous Isan Day celebrations
                </p>
            </div>

            @if($pastCelebrations->isNotEmpty())
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach($pastCelebrations as $celebration)
                        <div class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                            <div class="relative h-64 overflow-hidden">
                                @if($celebration->image_url)
                                    <img src="{{ asset('storage/' . $celebration->image_url) }}"
                                         alt="{{ $celebration->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=600&h=400&fit=crop"
                                         alt="{{ $celebration->title }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @endif
                                <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent"></div>
                                <div class="absolute top-4 right-4 bg-purple-600 px-3 py-1 rounded-full text-white text-xs font-semibold">
                                    {{ $celebration->celebration_date->format('Y') }}
                                </div>
                                <div class="absolute bottom-4 left-4 right-4 text-white">
                                    <h3 class="text-2xl font-bold mb-1">{{ $celebration->title }}</h3>
                                    @if($celebration->theme)
                                        <p class="text-sm text-purple-200">{{ $celebration->theme }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-600 mb-3">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ $celebration->formatted_date }}
                                </div>
                                @if($celebration->description)
                                    <p class="text-gray-600 leading-relaxed">
                                        {{ Str::limit($celebration->description, 120) }}
                                    </p>
                                @endif
                                @if($celebration->location)
                                    <div class="mt-3 flex items-center text-sm text-gray-500">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        </svg>
                                        {{ $celebration->location }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Fallback to placeholder images if no celebrations exist -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="relative h-64 overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-shadow group">
                        <img src="https://images.unsplash.com/photo-1530103862676-de8c9debad1d?w=400&h=500&fit=crop"
                             alt="Past event"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="relative h-64 overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-shadow group">
                        <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=400&h=500&fit=crop"
                             alt="Past event"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="relative h-64 overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-shadow group">
                        <img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=400&h=500&fit=crop"
                             alt="Past event"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="relative h-64 overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-shadow group">
                        <img src="https://images.unsplash.com/photo-1505236858219-8359eb29e329?w=400&h=500&fit=crop"
                             alt="Past event"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Registration CTA Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-purple-600 to-pink-600 rounded-3xl overflow-hidden shadow-2xl">
                <div class="grid md:grid-cols-2 gap-0">
                    <div class="p-12 md:p-16 flex flex-col justify-center text-white">
                        <h2 class="text-4xl md:text-5xl font-bold mb-6">Join Us for Isan Day 2025</h2>
                        <p class="text-xl mb-6 leading-relaxed text-purple-100">
                            Be part of this historic celebration! Register now to receive updates, exclusive
                            invitations, and early access to event tickets.
                        </p>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-lg">Priority registration for all events</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-lg">Exclusive networking opportunities</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-lg">Commemorative souvenirs and materials</span>
                            </li>
                        </ul>
                        <div>
                            <a href="{{ route('registration') }}"
                               class="inline-block bg-white text-purple-700 px-10 py-5 rounded-full font-bold text-xl hover:bg-purple-50 hover:scale-105 transition-all duration-300 shadow-xl">
                                Register as Indigene
                            </a>
                        </div>
                    </div>
                    <div class="relative h-full min-h-[500px]">
                        <img src="https://images.unsplash.com/photo-1496024840928-4c417adf211d?w=800&h=800&fit=crop"
                             alt="Celebration"
                             class="absolute inset-0 w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">FAQ</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Frequently Asked Questions</h2>
            </div>

            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">When is Isan Day held?</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Isan Day is typically held in November each year. The specific dates are announced several
                        months in advance to allow indigenes plan their attendance.
                    </p>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Who can attend Isan Day?</h3>
                    <p class="text-gray-600 leading-relaxed">
                        All indigenes of Isan Ekiti are welcome to attend, along with their families and friends.
                        Some events may require pre-registration, while others are open to all.
                    </p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Is there a registration fee?</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Registration as an indigene on our platform is completely free. However, some specific events
                        during Isan Day (like the Grand Gala Night) may have nominal fees to cover expenses.
                    </p>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:shadow-lg transition-shadow">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Are there accommodation arrangements?</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Yes, we provide information about accommodation options in Isan Ekiti and nearby areas.
                        Early registration helps us assist with lodging arrangements for those traveling from afar.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA Section -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=1920&h=600&fit=crop"
                 alt="CTA Background"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/95 to-pink-900/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Stay Connected</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Register today to receive updates about Isan Day 2025 and stay connected with your community
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('registration') }}"
                   class="inline-block bg-white text-purple-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-purple-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                    Register Now
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-block border-3 border-white text-white px-12 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-purple-700 transition-all duration-300">
                    Contact Us
                </a>
            </div>
        </div>
    </section>
@endsection
