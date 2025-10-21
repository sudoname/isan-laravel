@extends('layouts.public')

@section('title', $post->title . ' - Isan Ekiti News')

@section('content')
    <!-- Hero Section with Featured Image -->
    <section class="relative h-[500px] flex items-end overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ $post->featured_image ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1920&h=1000&fit=crop' }}"
                 alt="{{ $post->title }}"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/95 via-gray-900/70 to-gray-900/30"></div>
        </div>
        <div class="relative z-10 w-full pb-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
                <!-- Category Badge -->
                @if($post->category)
                    <span class="inline-block bg-red-600 text-white px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        {{ $post->category }}
                    </span>
                @endif

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl font-bold mb-4 leading-tight">
                    {{ $post->title }}
                </h1>

                <!-- Meta Information -->
                <div class="flex flex-wrap items-center text-gray-300 gap-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>By {{ $post->author->name ?? 'Admin' }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>{{ $post->created_at->format('F d, Y') }}</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Main Article Content -->
                <article class="lg:col-span-2">
                    <!-- Excerpt -->
                    @if($post->excerpt)
                        <div class="bg-gray-50 border-l-4 border-red-600 p-6 rounded-r-xl mb-8">
                            <p class="text-lg text-gray-700 italic leading-relaxed">
                                {{ $post->excerpt }}
                            </p>
                        </div>
                    @endif

                    <!-- Post Content -->
                    <div class="prose prose-lg max-w-none">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    <!-- Share Section -->
                    <div class="mt-12 pt-8 border-t-2 border-gray-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Share this article</h3>
                        <div class="flex gap-3">
                            <a href="#" class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                                Facebook
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 bg-blue-400 text-white rounded-lg hover:bg-blue-500 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                                Twitter
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="lg:col-span-1">
                    <!-- Recent Posts -->
                    @if($recentPosts->count() > 0)
                        <div class="bg-gray-50 rounded-2xl p-6 sticky top-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6 pb-3 border-b-2 border-red-600">
                                Recent News
                            </h3>

                            <div class="space-y-6">
                                @foreach($recentPosts as $recentPost)
                                    <a href="{{ route('news.show', $recentPost) }}"
                                       class="group block hover:bg-white rounded-xl p-3 -m-3 transition-colors">
                                        <div class="flex gap-4">
                                            <div class="flex-shrink-0">
                                                <img src="{{ $recentPost->featured_image ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=200&h=200&fit=crop' }}"
                                                     alt="{{ $recentPost->title }}"
                                                     class="w-20 h-20 object-cover rounded-lg">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <h4 class="font-semibold text-gray-900 group-hover:text-red-600 transition-colors line-clamp-2 mb-1">
                                                    {{ $recentPost->title }}
                                                </h4>
                                                <p class="text-xs text-gray-500">
                                                    {{ $recentPost->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>

                            <a href="{{ route('news.index') }}"
                               class="block mt-6 text-center text-red-600 font-semibold hover:text-red-700 transition-colors">
                                View All News →
                            </a>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </section>

    <!-- Related/Back Navigation -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('news.index') }}"
               class="inline-flex items-center text-gray-600 hover:text-red-600 font-semibold transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Back to All News
            </a>
        </div>
    </section>
@endsection
