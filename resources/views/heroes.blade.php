@extends('layouts.public')

@section('title', 'Heroes of Isan Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1531384441138-2736e62e0919?w=1920&h=600&fit=crop"
                 alt="Successful people"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/95 to-blue-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Our Heroes</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Celebrating the illustrious sons and daughters of Isan Ekiti who have made us proud
            </p>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto mb-16">
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">Legacy</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 mt-2">A Heritage of Excellence</h2>
                <p class="text-xl text-gray-600 leading-relaxed">
                    Isan Ekiti has produced many distinguished individuals who have excelled in various fields
                    including academia, politics, business, medicine, engineering, and the arts. Their achievements
                    serve as inspiration to current and future generations of indigenes.
                </p>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Fields of Excellence</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Our heroes have distinguished themselves across multiple sectors
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20">
                <!-- Category Badge 1 -->
                <div class="bg-white rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Academia</h3>
                    <p class="text-sm text-gray-600 mt-1">Professors & Scholars</p>
                </div>

                <!-- Category Badge 2 -->
                <div class="bg-white rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Business</h3>
                    <p class="text-sm text-gray-600 mt-1">Entrepreneurs</p>
                </div>

                <!-- Category Badge 3 -->
                <div class="bg-white rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Politics</h3>
                    <p class="text-sm text-gray-600 mt-1">Public Servants</p>
                </div>

                <!-- Category Badge 4 -->
                <div class="bg-white rounded-xl p-6 text-center shadow-lg hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900">Healthcare</h3>
                    <p class="text-sm text-gray-600 mt-1">Medical Professionals</p>
                </div>
            </div>

            <!-- Featured Heroes Grid -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Distinguished Indigenes</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    A selection of our most accomplished sons and daughters
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($heroes as $hero)
                    <!-- Hero Card -->
                    <a href="{{ route('heroes.show', $hero->slug) }}" class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                        <div class="relative h-80 overflow-hidden">
                            <img src="{{ $hero->image_url ?? 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=600&h=800&fit=crop' }}"
                                 alt="{{ $hero->name }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent"></div>
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <span class="inline-block bg-{{ $hero->category_color }}-600 text-white px-3 py-1 rounded-full text-xs font-semibold mb-3">
                                    {{ $hero->category }}
                                </span>
                                <h3 class="text-2xl font-bold mb-2">{{ $hero->title }} {{ $hero->name }}</h3>
                                <p class="text-gray-200 text-sm">{{ $hero->position }}</p>
                            </div>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-600 leading-relaxed mb-4">
                                {{ $hero->short_description }}
                            </p>
                            @if($hero->tags && count($hero->tags) > 0)
                                <div class="flex flex-wrap gap-2">
                                    @foreach(array_slice($hero->tags, 0, 3) as $tag)
                                        <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500 text-lg">No heroes have been added yet. Check back soon!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Legacy Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl overflow-hidden shadow-2xl">
                <div class="grid md:grid-cols-2 gap-0">
                    <div class="p-12 flex flex-col justify-center text-white">
                        <h2 class="text-4xl font-bold mb-6">Honoring Our Legacy</h2>
                        <p class="text-xl mb-6 leading-relaxed text-blue-100">
                            The achievements of our heroes inspire us to reach greater heights. Their dedication
                            to excellence and commitment to community development serve as a beacon for current
                            and future generations.
                        </p>
                        <p class="text-lg text-blue-100 mb-8">
                            Know someone who should be featured? Nominate them to be recognized for their
                            outstanding contributions to Isan Ekiti and society at large.
                        </p>
                        <div>
                            <a href="{{ route('contact') }}"
                               class="inline-block bg-white text-blue-700 px-8 py-4 rounded-full font-bold text-lg hover:bg-blue-50 hover:scale-105 transition-all duration-300 shadow-xl">
                                Nominate a Hero
                            </a>
                        </div>
                    </div>
                    <div class="relative h-full min-h-[400px]">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800&h=800&fit=crop"
                             alt="Team success"
                             class="absolute inset-0 w-full h-full object-cover">
                    </div>
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
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/95 to-blue-700/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Join the Legacy</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Register as an indigene and become part of our community of excellence
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('registration') }}"
                   class="inline-block bg-white text-blue-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-blue-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                    Register Now
                </a>
                <a href="{{ route('history') }}"
                   class="inline-block border-3 border-white text-white px-12 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-blue-700 transition-all duration-300">
                    Explore Our History
                </a>
            </div>
        </div>
    </section>
@endsection
