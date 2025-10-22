@extends('layouts.public')

@section('title', $page->title)

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            @if($page->featured_image)
                <img src="{{ asset('storage/' . $page->featured_image) }}"
                     alt="{{ $page->title }}"
                     class="w-full h-full object-cover">
            @else
                <img src="https://images.unsplash.com/photo-1577495508326-19a1b3cf65b7?w=1920&h=600&fit=crop"
                     alt="{{ $page->title }}"
                     class="w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/95 to-green-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">{{ $page->title }}</h1>
            @if($page->meta_description)
                <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                    {{ $page->meta_description }}
                </p>
            @endif
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="prose prose-lg max-w-none">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection
