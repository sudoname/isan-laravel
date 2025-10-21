@extends('layouts.public')

@section('title', 'The Onisan of Isan-Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1609137144813-7d9921338f24?w=1920&h=600&fit=crop"
                 alt="Royal Heritage"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/95 to-purple-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">The Onisan of Isan-Ekiti</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Custodian of Our Culture, Heritage, and Traditions
            </p>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Royal Heritage</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 mt-2">The Institution of Onisan</h2>
                <p class="text-xl text-gray-600 leading-relaxed mb-6">
                    The Onisan of Isan-Ekiti is the traditional ruler and paramount king of Isan-Ekiti, a historic town
                    located in Oye Local Government Area of Ekiti State, Nigeria. The Onisan serves as the custodian of
                    the town's culture, heritage, and traditions, representing the unity and leadership of the Isan people.
                </p>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Beyond his royal duties, the Onisan plays a vital role in community development, fostering peace,
                    guiding local governance, and preserving the customs that define Isan-Ekiti's identity within the
                    larger Ekiti kingdom.
                </p>
            </div>

            <!-- Royal Roles Grid -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <div class="bg-purple-50 rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Cultural Custodian</h3>
                    <p class="text-gray-600">Preserving and promoting the rich cultural heritage and traditions of Isan-Ekiti</p>
                </div>

                <div class="bg-purple-50 rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Community Leader</h3>
                    <p class="text-gray-600">Unifying the Isan people and representing their interests at all levels</p>
                </div>

                <div class="bg-purple-50 rounded-2xl p-8 text-center">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Development Champion</h3>
                    <p class="text-gray-600">Driving initiatives for economic growth and social development of the community</p>
                </div>
            </div>
        </div>
    </section>

    @if($currentOnisan)
        <!-- Current Onisan Section -->
        <section class="py-20 bg-gradient-to-b from-purple-50 to-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Current Ruler</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">His Royal Majesty</h2>
                    <p class="text-xl text-gray-600">The reigning monarch of Isan-Ekiti</p>
                </div>

                <!-- Featured Current Onisan Card -->
                <a href="{{ route('onisan.show', $currentOnisan->slug) }}" class="group block max-w-5xl mx-auto">
                    <div class="bg-white rounded-3xl overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-300 hover:-translate-y-2">
                        <div class="grid md:grid-cols-2 gap-0">
                            <!-- Image Side -->
                            <div class="relative h-96 md:h-auto overflow-hidden">
                                <img src="{{ $currentOnisan->image_url ? asset($currentOnisan->image_url) : 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=800&h=800&fit=crop' }}"
                                     alt="{{ $currentOnisan->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-purple-900/60 to-transparent"></div>
                                <div class="absolute top-6 right-6">
                                    <span class="bg-purple-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
                                        Current Ruler
                                    </span>
                                </div>
                            </div>

                            <!-- Content Side -->
                            <div class="p-12 flex flex-col justify-center">
                                <div class="mb-6">
                                    <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">{{ $currentOnisan->title }}</span>
                                    <h3 class="text-4xl font-bold text-gray-900 mb-2 mt-2">{{ $currentOnisan->name }}</h3>
                                    @if($currentOnisan->full_title)
                                        <p class="text-lg text-gray-600 italic mb-4">{{ $currentOnisan->full_title }}</p>
                                    @endif
                                    @if($currentOnisan->reign_start)
                                        <p class="text-gray-600 mb-6">
                                            <span class="font-semibold">Reign:</span>
                                            {{ $currentOnisan->reign_start->format('Y') }} - Present
                                            @if($currentOnisan->reign_duration)
                                                <span class="text-purple-600 ml-2">({{ $currentOnisan->reign_duration }} years)</span>
                                            @endif
                                        </p>
                                    @endif
                                </div>

                                <p class="text-gray-600 leading-relaxed mb-8 text-lg">
                                    {{ $currentOnisan->short_description }}
                                </p>

                                <div class="inline-flex items-center text-purple-600 font-semibold group-hover:text-purple-700 transition-colors">
                                    <span class="text-lg">Learn More About His Majesty</span>
                                    <svg class="w-6 h-6 ml-2 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </section>
    @endif

    <!-- Past Onisans Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="text-purple-600 font-semibold text-sm uppercase tracking-wider">Royal Lineage</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Past Onisans</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Honoring the distinguished monarchs who have shaped the history and development of Isan-Ekiti
                </p>
            </div>

            @if($pastOnisans->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($pastOnisans as $onisan)
                        <a href="{{ route('onisan.show', $onisan->slug) }}" class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 border-gray-100">
                            <div class="relative h-80 overflow-hidden">
                                <img src="{{ $onisan->image_url ? asset($onisan->image_url) : 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600&h=800&fit=crop' }}"
                                     alt="{{ $onisan->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent"></div>
                                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                    <span class="inline-block bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold mb-3">
                                        {{ $onisan->title }}
                                    </span>
                                    <h3 class="text-2xl font-bold mb-2">{{ $onisan->name }}</h3>
                                    @if($onisan->reign_start)
                                        <p class="text-gray-200 text-sm">
                                            {{ $onisan->reign_start->format('Y') }} - {{ $onisan->reign_end ? $onisan->reign_end->format('Y') : 'Present' }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-600 leading-relaxed">
                                    {{ Str::limit($onisan->short_description, 150) }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <!-- Placeholder Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @for($i = 1; $i <= 6; $i++)
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl overflow-hidden shadow-lg border-2 border-purple-200">
                            <div class="relative h-80 overflow-hidden bg-purple-200 flex items-center justify-center">
                                <svg class="w-24 h-24 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-400 mb-2">Past Onisan {{ $i }}</h3>
                                <p class="text-gray-500 text-sm">Information coming soon</p>
                            </div>
                        </div>
                    @endfor
                </div>

                <div class="text-center mt-12">
                    <div class="bg-purple-50 border-2 border-purple-200 rounded-2xl p-8 max-w-2xl mx-auto">
                        <svg class="w-16 h-16 text-purple-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Historical Records Coming Soon</h3>
                        <p class="text-gray-600 text-lg">
                            We are currently compiling comprehensive information about the distinguished past rulers of Isan-Ekiti.
                            This section will feature detailed profiles of our royal lineage.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1609137144813-7d9921338f24?w=1920&h=600&fit=crop"
                 alt="CTA Background"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/95 to-purple-700/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Connect With Your Heritage</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Learn more about our rich history and royal traditions
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('history') }}"
                   class="inline-block bg-white text-purple-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-purple-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                    Our History
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-block border-3 border-white text-white px-12 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-purple-700 transition-all duration-300">
                    Contact Palace
                </a>
            </div>
        </div>
    </section>
@endsection
