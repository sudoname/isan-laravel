@extends('layouts.public')

@section('title', 'News & Updates - Isan Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1920&h=600&fit=crop"
                 alt="News"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-red-900/95 to-red-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">News & Updates</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Stay informed with the latest news and updates from the Isan Ekiti community
            </p>
        </div>
    </section>

    <!-- News Grid Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($posts->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach($posts as $post)
                        <article class="group bg-white rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                            <!-- Featured Image -->
                            <div class="relative h-56 overflow-hidden">
                                <img src="{{ $post->featured_image ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&h=400&fit=crop' }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent"></div>

                                <!-- Category Badge -->
                                @if($post->category)
                                    <span class="absolute top-4 left-4 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                        {{ $post->category }}
                                    </span>
                                @endif
                            </div>

                            <!-- Content -->
                            <div class="p-6">
                                <!-- Meta Info -->
                                <div class="flex items-center text-sm text-gray-500 mb-3">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>{{ $post->created_at->format('M d, Y') }}</span>
                                    <span class="mx-2">•</span>
                                    <span>By {{ $post->author->name ?? 'Admin' }}</span>
                                </div>

                                <!-- Title -->
                                <h2 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-red-600 transition-colors">
                                    {{ $post->title }}
                                </h2>

                                <!-- Excerpt -->
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
                                </p>

                                <!-- Read More Link -->
                                <a href="{{ route('news.show', $post) }}"
                                   class="inline-flex items-center text-red-600 font-semibold hover:text-red-700 transition-colors">
                                    Read More
                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <svg class="w-24 h-24 text-gray-400 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No News Yet</h3>
                    <p class="text-gray-600 max-w-md mx-auto">
                        Check back soon for the latest news and updates from the Isan Ekiti community.
                    </p>
                </div>
            @endif
        </div>
    </section>

    <!-- Newsletter CTA Section -->
    <section class="relative py-24 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=1920&h=600&fit=crop"
                 alt="CTA Background"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-red-900/95 to-red-700/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Stay Updated</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Register as an indigene to receive news updates and stay connected with the community
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('registration') }}"
                   class="inline-block bg-white text-red-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-red-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                    Register Now
                </a>
                <a href="{{ route('forum.index') }}"
                   class="inline-block border-3 border-white text-white px-12 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-red-700 transition-all duration-300">
                    Join Community Forum
                </a>
            </div>
        </div>
    </section>
@endsection
