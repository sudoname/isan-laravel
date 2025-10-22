@extends('layouts.public')

@section('title', 'Community Forum - Isan Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1920&h=600&fit=crop"
                 alt="Community background"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-teal-900/95 to-teal-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Community Forum</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Join our WhatsApp groups to connect with Isan community members worldwide
            </p>
        </div>
    </section>

    <!-- WhatsApp Groups Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">WhatsApp Community Groups</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Connect with fellow Isan indigenes, share ideas, and stay updated on community events
                </p>
            </div>

            @if($groups->isEmpty())
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fab fa-whatsapp text-4xl text-gray-400"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No Groups Available Yet</h3>
                    <p class="text-gray-600">Check back soon for community WhatsApp groups</p>
                </div>
            @else
                <div class="space-y-12">
                    @foreach($groups as $category => $categoryGroups)
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                                <span class="px-4 py-2 bg-{{ $categoryGroups->first()->category_color }}-100 text-{{ $categoryGroups->first()->category_color }}-800 rounded-lg">
                                    {{ $category }}
                                </span>
                                <span class="ml-4 text-sm text-gray-500 font-normal">({{ $categoryGroups->count() }} {{ Str::plural('group', $categoryGroups->count()) }})</span>
                            </h3>

                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach($categoryGroups as $group)
                                    <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-transparent hover:border-green-500">
                                        <!-- Group Icon -->
                                        <div class="flex items-start justify-between mb-4">
                                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                                                <i class="fab fa-whatsapp text-3xl text-green-600"></i>
                                            </div>
                                            <span class="px-3 py-1 text-xs font-semibold bg-{{ $group->category_color }}-100 text-{{ $group->category_color }}-800 rounded-full">
                                                {{ $group->category }}
                                            </span>
                                        </div>

                                        <!-- Group Name -->
                                        <h4 class="text-xl font-bold text-gray-900 mb-2">{{ $group->name }}</h4>

                                        <!-- Group Description -->
                                        @if($group->description)
                                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                                {{ $group->description }}
                                            </p>
                                        @endif

                                        <!-- Admin Info -->
                                        @if($group->admin_name || $group->admin_phone)
                                            <div class="mb-4 pb-4 border-b border-gray-200">
                                                <p class="text-xs text-gray-500 mb-1">Group Admin</p>
                                                @if($group->admin_name)
                                                    <p class="text-sm font-medium text-gray-900">{{ $group->admin_name }}</p>
                                                @endif
                                                @if($group->admin_phone)
                                                    <p class="text-sm text-gray-600">{{ $group->admin_phone }}</p>
                                                @endif
                                            </div>
                                        @endif

                                        <!-- Join Button -->
                                        <a href="{{ $group->invite_link }}"
                                           target="_blank"
                                           rel="noopener noreferrer"
                                           class="block w-full text-center px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition-colors duration-300">
                                            <i class="fab fa-whatsapp mr-2"></i> Join Group
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Info Box -->
            <div class="mt-16 bg-blue-50 border-l-4 border-blue-500 p-6 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">About Our WhatsApp Groups</h3>
                        <div class="text-blue-800 space-y-2">
                            <p>These WhatsApp groups are official channels for the Isan community to connect, share information, and support each other.</p>
                            <p class="font-medium">Group Guidelines:</p>
                            <ul class="list-disc list-inside space-y-1 ml-2">
                                <li>Be respectful and courteous to all members</li>
                                <li>Stay on topic and avoid spam</li>
                                <li>No hate speech, discrimination, or harassment</li>
                                <li>Share relevant and accurate information</li>
                                <li>Respect privacy and confidentiality</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
