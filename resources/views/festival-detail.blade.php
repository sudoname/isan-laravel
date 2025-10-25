@extends('layouts.public')

@section('title', $festival->title . ' - Festivals of Isan Ekiti')

@section('content')
    <!-- Festival Header Section -->
    <section class="relative h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $festival->featured_image ? asset('storage/' . $festival->featured_image) : 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3?w=1920&h=1080&fit=crop' }}"
                 alt="{{ $festival->title }}"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-purple-900/95 via-purple-900/80 to-purple-900/60"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
            <div class="max-w-4xl">
                <span class="inline-block bg-purple-600 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    Cultural Event
                </span>
                <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">{{ $festival->title }}</h1>
                @if($festival->short_description)
                    <p class="text-xl md:text-2xl text-gray-200 animate-fade-in-up">{{ $festival->short_description }}</p>
                @endif
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="md:col-span-2">
                    <!-- Description -->
                    <div class="prose prose-lg max-w-none mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">About This Festival</h2>
                        <div class="text-gray-700 leading-relaxed">
                            {!! $festival->description !!}
                        </div>
                    </div>

                    <!-- Video Section -->
                    @if($festival->video_url)
                        <div class="mb-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Watch Video</h2>
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl" style="padding-bottom: 56.25%;">
                                @php
                                    $videoUrl = $festival->video_url;
                                    $embedUrl = '';

                                    // Convert YouTube URL to embed URL
                                    if (strpos($videoUrl, 'youtube.com/watch') !== false) {
                                        parse_str(parse_url($videoUrl, PHP_URL_QUERY), $params);
                                        if (isset($params['v'])) {
                                            $embedUrl = 'https://www.youtube.com/embed/' . $params['v'];
                                        }
                                    } elseif (strpos($videoUrl, 'youtube.com/shorts/') !== false) {
                                        // Handle YouTube Shorts URLs
                                        preg_match('/shorts\/([a-zA-Z0-9_-]+)/', $videoUrl, $matches);
                                        if (isset($matches[1])) {
                                            $embedUrl = 'https://www.youtube.com/embed/' . $matches[1];
                                        }
                                    } elseif (strpos($videoUrl, 'youtu.be') !== false) {
                                        $videoId = basename(parse_url($videoUrl, PHP_URL_PATH));
                                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                                    } elseif (strpos($videoUrl, 'vimeo.com') !== false) {
                                        $videoId = basename(parse_url($videoUrl, PHP_URL_PATH));
                                        $embedUrl = 'https://player.vimeo.com/video/' . $videoId;
                                    } else {
                                        $embedUrl = $videoUrl;
                                    }
                                @endphp

                                @if($embedUrl)
                                    <iframe class="absolute top-0 left-0 w-full h-full"
                                            src="{{ $embedUrl }}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Image Gallery -->
                    @if($festival->images && count($festival->images) > 0)
                        <div class="mb-12">
                            <h2 class="text-3xl font-bold text-gray-900 mb-6">Photo Gallery</h2>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($festival->images as $image)
                                    <div class="group relative overflow-hidden rounded-lg shadow-lg hover:shadow-2xl transition-all duration-300 cursor-pointer"
                                         onclick="openLightbox('{{ asset('storage/' . $image) }}')">
                                        <img src="{{ asset('storage/' . $image) }}"
                                             alt="{{ $festival->title }} gallery"
                                             class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                                        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-30 transition-opacity duration-300"></div>
                                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                            </svg>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="md:col-span-1">
                    <!-- Event Details Card -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8 sticky top-8 shadow-lg border border-purple-200">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">Event Details</h3>

                        <div class="space-y-6">
                            @if($festival->event_date)
                                <div class="pb-6 border-b border-purple-200">
                                    <p class="text-sm text-gray-600 uppercase tracking-wide mb-2">Date & Time</p>
                                    <div class="flex items-start">
                                        <svg class="w-6 h-6 text-purple-600 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <div>
                                            <p class="text-lg font-bold text-gray-900">{{ $festival->event_date->format('F j, Y') }}</p>
                                            <p class="text-sm text-gray-600">{{ $festival->event_date->format('l') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($festival->location)
                                <div class="pb-6 border-b border-purple-200">
                                    <p class="text-sm text-gray-600 uppercase tracking-wide mb-2">Location</p>
                                    <div class="flex items-start">
                                        <svg class="w-6 h-6 text-purple-600 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <p class="text-lg font-semibold text-gray-900">{{ $festival->location }}</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Share Section -->
                            <div>
                                <p class="text-sm text-gray-600 uppercase tracking-wide mb-3">Share This Event</p>
                                <div class="flex space-x-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('festivals.show', $festival->slug)) }}"
                                       target="_blank"
                                       class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('festivals.show', $festival->slug)) }}&text={{ urlencode($festival->title) }}"
                                       target="_blank"
                                       class="flex items-center justify-center w-10 h-10 bg-sky-500 text-white rounded-full hover:bg-sky-600 transition">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="https://wa.me/?text={{ urlencode($festival->title . ' - ' . route('festivals.show', $festival->slug)) }}"
                                       target="_blank"
                                       class="flex items-center justify-center w-10 h-10 bg-green-600 text-white rounded-full hover:bg-green-700 transition">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- CTA Button -->
                        <div class="mt-8 pt-6 border-t border-purple-200">
                            <a href="{{ route('contact') }}"
                               class="block w-full bg-purple-600 text-white text-center px-6 py-4 rounded-xl font-bold hover:bg-purple-700 transition-colors shadow-lg hover:shadow-xl">
                                <i class="fas fa-envelope mr-2"></i> Contact Us for More Info
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Events CTA -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Explore More Events</h2>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Discover other cultural celebrations and festivals in Isan Ekiti
            </p>
            <a href="{{ route('festivals') }}"
               class="inline-block bg-purple-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-purple-700 hover:scale-105 transition-all duration-300 shadow-xl">
                <i class="fas fa-calendar-alt mr-2"></i> View All Festivals
            </a>
        </div>
    </section>

    <!-- Image Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden bg-black bg-opacity-90 flex items-center justify-center p-4" onclick="closeLightbox()">
        <div class="relative max-w-7xl max-h-full">
            <button onclick="closeLightbox()" class="absolute top-4 right-4 text-white text-4xl font-bold hover:text-gray-300 z-10">
                &times;
            </button>
            <img id="lightbox-image" src="" alt="Lightbox image" class="max-w-full max-h-[90vh] object-contain rounded-lg">
        </div>
    </div>

    <script>
        function openLightbox(imageSrc) {
            document.getElementById('lightbox-image').src = imageSrc;
            document.getElementById('lightbox').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close lightbox on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
@endsection
