@extends('layouts.public')

@section('title', 'Isan Progressive Union')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1920&h=600&fit=crop"
                 alt="Community gathering"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/95 to-blue-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Isan Progressive Union</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Uniting Isan sons and daughters for progress and development
            </p>
        </div>
    </section>

    <!-- About IPU Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-4xl font-bold text-gray-900 mb-6 text-center">About Isan Progressive Union</h2>
                <div class="prose prose-lg max-w-none text-gray-700 space-y-4">
                    <p>
                        The Isan Progressive Union (IPU) is a socio-cultural organization established to foster unity,
                        development, and progress among the indigenes of Isan Ekiti, both at home and in the diaspora.
                    </p>
                    <p>
                        Our mission is to promote the social, economic, and cultural development of Isan Ekiti while
                        preserving our rich heritage and traditions for future generations.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Objectives Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Our Objectives</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-users text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Unity & Cooperation</h3>
                    <p class="text-gray-600">Foster unity and cooperation among all Isan indigenes</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-graduation-cap text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Education & Development</h3>
                    <p class="text-gray-600">Promote education and human capital development</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-heart text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Cultural Heritage</h3>
                    <p class="text-gray-600">Preserve and promote our cultural heritage and traditions</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-building text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Infrastructure</h3>
                    <p class="text-gray-600">Support infrastructure and community development projects</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-hands-helping text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Social Welfare</h3>
                    <p class="text-gray-600">Enhance the social welfare of our people</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="text-blue-600 mb-4">
                        <i class="fas fa-globe text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Global Network</h3>
                    <p class="text-gray-600">Build a strong network of Isan indigenes worldwide</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">Join the Isan Progressive Union</h2>
            <p class="text-xl text-gray-700 mb-8">
                Become part of a dynamic community working together for the progress and development of Isan Ekiti.
            </p>
            <a href="{{ route('contact') }}"
               class="inline-block bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl">
                Contact Us to Join
            </a>
        </div>
    </section>
@endsection
