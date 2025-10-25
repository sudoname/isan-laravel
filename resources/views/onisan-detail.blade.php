@extends('layouts.public')

@section('title', $onisan->title . ' ' . $onisan->name . ' - Onisan of Isan-Ekiti')

@section('content')
    <!-- Hero Header Section -->
    <section class="relative h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $onisan->image_url ? asset($onisan->image_url) : 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=1920&h=1080&fit=crop' }}"
                 alt="{{ $onisan->name }}"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/95 via-purple-900/80 to-purple-900/60"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
            <div class="max-w-4xl">
                <span class="inline-block bg-purple-600 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    {{ $onisan->title }}
                </span>
                <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">{{ $onisan->name }}</h1>
                @if($onisan->full_title)
                    <p class="text-2xl md:text-3xl text-gray-200 animate-fade-in-up italic">{{ $onisan->full_title }}</p>
                @endif
                @if($onisan->reign_start)
                    <p class="text-xl text-purple-200 mt-4">
                        Reign: {{ $onisan->reign_start->format('Y') }} - {{ $onisan->reign_end ? $onisan->reign_end->format('Y') : 'Present' }}
                        @if($onisan->reign_duration)
                            <span class="ml-2">({{ $onisan->reign_duration }})</span>
                        @endif
                    </p>
                @endif
            </div>
        </div>
    </section>

    <!-- Biography Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="bg-white">
                        <h2 class="text-3xl font-bold text-gray-900 mb-8 pb-4 border-b-2 border-purple-200">Royal Biography</h2>
                        <div class="prose prose-lg max-w-none text-gray-700">
                            {!! $onisan->biography !!}
                        </div>
                    </div>

                    <!-- Achievements Section -->
                    @if($onisan->achievements && count($onisan->achievements) > 0)
                        <div class="mt-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Notable Achievements</h2>
                            <div class="space-y-4">
                                @foreach($onisan->achievements as $achievement)
                                    <div class="flex items-start">
                                        <svg class="w-6 h-6 text-purple-600 mt-1 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg>
                                        <p class="text-gray-700">{{ $achievement }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Development Projects Section -->
                    @if($onisan->development_projects && count($onisan->development_projects) > 0)
                        <div class="mt-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Development Initiatives</h2>
                            <div class="grid sm:grid-cols-2 gap-4">
                                @foreach($onisan->development_projects as $project)
                                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-lg p-6 border border-purple-200">
                                        <svg class="w-10 h-10 text-purple-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                        <p class="text-gray-800 font-medium">{{ $project }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Image Gallery Slideshow -->
                    @if($onisan->gallery_images && count($onisan->gallery_images) > 0)
                        <div class="mt-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Photo Gallery</h2>
                            <div class="relative">
                                <!-- Slideshow Container -->
                                <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-gray-100">
                                    <!-- Slides -->
                                    @foreach($onisan->gallery_images as $index => $image)
                                        <div class="slideshow-item {{ $index === 0 ? '' : 'hidden' }}" data-slide="{{ $index }}">
                                            <img src="{{ asset($image) }}"
                                                 alt="{{ $onisan->name }} - Photo {{ $index + 1 }}"
                                                 class="w-full h-[500px] object-cover">
                                        </div>
                                    @endforeach

                                    <!-- Navigation Arrows -->
                                    @if(count($onisan->gallery_images) > 1)
                                        <button onclick="changeSlide(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-3 rounded-full transition">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button onclick="changeSlide(1)" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white p-3 rounded-full transition">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>

                                        <!-- Slide Indicators -->
                                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2">
                                            @foreach($onisan->gallery_images as $index => $image)
                                                <button onclick="goToSlide({{ $index }})"
                                                        class="slide-indicator w-3 h-3 rounded-full transition {{ $index === 0 ? 'bg-white' : 'bg-white/50' }}"
                                                        data-indicator="{{ $index }}">
                                                </button>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <!-- Thumbnails -->
                                @if(count($onisan->gallery_images) > 1)
                                    <div class="mt-4 grid grid-cols-4 md:grid-cols-6 gap-2">
                                        @foreach($onisan->gallery_images as $index => $image)
                                            <button onclick="goToSlide({{ $index }})"
                                                    class="thumbnail-btn rounded-lg overflow-hidden border-2 transition {{ $index === 0 ? 'border-purple-600' : 'border-transparent' }} hover:border-purple-400"
                                                    data-thumbnail="{{ $index }}">
                                                <img src="{{ asset($image) }}"
                                                     alt="Thumbnail {{ $index + 1 }}"
                                                     class="w-full h-20 object-cover">
                                            </button>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-8 space-y-6">
                    <!-- Quick Info Card -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 shadow-lg border-2 border-purple-200">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Royal Information</h3>

                        <div class="space-y-6">
                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Full Name</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $onisan->name }}</p>
                            </div>

                            <div>
                                <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Title</p>
                                <p class="text-lg font-semibold text-gray-900">{{ $onisan->title }}</p>
                            </div>

                            @if($onisan->full_title)
                                <div>
                                    <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Full Royal Title</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $onisan->full_title }}</p>
                                </div>
                            @endif

                            @if($onisan->reign_start)
                                <div>
                                    <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Reign Period</p>
                                    <p class="text-lg font-semibold text-gray-900">
                                        {{ $onisan->reign_start->format('Y') }} - {{ $onisan->reign_end ? $onisan->reign_end->format('Y') : 'Present' }}
                                    </p>
                                    @if($onisan->reign_duration)
                                        <span class="inline-block bg-purple-600 text-white px-3 py-1 rounded-full text-xs font-semibold mt-2">
                                            {{ $onisan->reign_duration }}
                                        </span>
                                    @endif
                                </div>
                            @endif

                            @if($onisan->is_current)
                                <div>
                                    <span class="inline-block bg-purple-600 text-white px-4 py-2 rounded-full text-sm font-semibold w-full text-center">
                                        Current Ruler
                                    </span>
                                </div>
                            @endif

                            <!-- Palace Contact Information -->
                            @if($onisan->palace_address || $onisan->contact_email || $onisan->contact_phone)
                                <div class="pt-6 border-t border-purple-300">
                                    <p class="text-sm text-gray-500 uppercase tracking-wide mb-4">Palace Contact</p>
                                    <div class="space-y-3">
                                        @if($onisan->palace_address)
                                            <div class="flex items-start">
                                                <svg class="w-5 h-5 text-purple-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                <p class="text-sm text-gray-700">{{ $onisan->palace_address }}</p>
                                            </div>
                                        @endif

                                        @if($onisan->contact_email)
                                            <div class="flex items-start">
                                                <svg class="w-5 h-5 text-purple-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <a href="mailto:{{ $onisan->contact_email }}" class="text-sm text-purple-600 hover:text-purple-700 hover:underline">
                                                    {{ $onisan->contact_email }}
                                                </a>
                                            </div>
                                        @endif

                                        @if($onisan->contact_phone)
                                            <div class="flex items-start">
                                                <svg class="w-5 h-5 text-purple-600 mt-0.5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                                </svg>
                                                <a href="tel:{{ $onisan->contact_phone }}" class="text-sm text-purple-600 hover:text-purple-700 hover:underline">
                                                    {{ $onisan->contact_phone }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Royal Legacy Card -->
                    <div class="bg-gradient-to-br from-purple-600 to-purple-800 rounded-2xl p-8 shadow-lg text-white">
                        <svg class="w-12 h-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <h4 class="text-xl font-bold mb-3">Royal Legacy</h4>
                        <p class="text-purple-100">
                            The Onisan institution represents centuries of cultural heritage and traditional governance in Isan-Ekiti.
                        </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Royal Duties Section -->
    <section class="py-20 bg-gradient-to-b from-purple-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">The Role of the Onisan</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Understanding the multifaceted responsibilities of Isan-Ekiti's traditional ruler
                </p>
            </div>

            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-purple-100 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Cultural Preservation</h3>
                    <p class="text-gray-600 text-sm">Safeguarding traditions, customs, and heritage</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-purple-100 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Community Leadership</h3>
                    <p class="text-gray-600 text-sm">Unifying and guiding the Isan people</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-purple-100 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Peace & Justice</h3>
                    <p class="text-gray-600 text-sm">Maintaining harmony and resolving disputes</p>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-lg border-2 border-purple-100 hover:shadow-xl transition-all">
                    <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Development</h3>
                    <p class="text-gray-600 text-sm">Driving economic and social progress</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Back to Onisans Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Explore Royal Heritage</h2>
                <p class="text-xl text-gray-600 mb-8">Learn more about the Onisan institution and past rulers</p>
                <a href="{{ route('onisan') }}"
                   class="inline-block bg-purple-600 text-white px-8 py-4 rounded-full font-bold text-lg hover:bg-purple-700 hover:scale-105 transition-all duration-300 shadow-xl">
                    View All Onisans
                </a>
            </div>
        </div>
    </section>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slideshow-item');
        const indicators = document.querySelectorAll('.slide-indicator');
        const thumbnails = document.querySelectorAll('.thumbnail-btn');

        function showSlide(index) {
            // Wrap around
            if (index >= slides.length) currentSlide = 0;
            else if (index < 0) currentSlide = slides.length - 1;
            else currentSlide = index;

            // Hide all slides
            slides.forEach(slide => slide.classList.add('hidden'));

            // Show current slide
            slides[currentSlide].classList.remove('hidden');

            // Update indicators
            indicators.forEach((indicator, i) => {
                if (i === currentSlide) {
                    indicator.classList.remove('bg-white/50');
                    indicator.classList.add('bg-white');
                } else {
                    indicator.classList.remove('bg-white');
                    indicator.classList.add('bg-white/50');
                }
            });

            // Update thumbnail borders
            thumbnails.forEach((thumbnail, i) => {
                if (i === currentSlide) {
                    thumbnail.classList.remove('border-transparent');
                    thumbnail.classList.add('border-purple-600');
                } else {
                    thumbnail.classList.remove('border-purple-600');
                    thumbnail.classList.add('border-transparent');
                }
            });
        }

        function changeSlide(direction) {
            showSlide(currentSlide + direction);
        }

        function goToSlide(index) {
            showSlide(index);
        }

        // Auto-advance slideshow every 5 seconds
        setInterval(() => {
            if (slides.length > 1) {
                changeSlide(1);
            }
        }, 5000);

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') changeSlide(-1);
            if (e.key === 'ArrowRight') changeSlide(1);
        });
    </script>
@endsection
