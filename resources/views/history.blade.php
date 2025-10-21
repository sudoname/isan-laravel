@extends('layouts.public')

@section('title', 'History of Isan Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1577495508326-19a1b3cf65b7?w=1920&h=600&fit=crop"
                 alt="Historical books and artifacts"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/95 to-green-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">History of Isan Ekiti</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Journey through centuries of rich heritage, culture, and traditions
            </p>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="animate-slide-in-left">
                    <img src="https://images.unsplash.com/photo-1604580864964-0462f5d5b1a8?w=800&h=600&fit=crop"
                         alt="Traditional Nigerian architecture"
                         class="rounded-2xl shadow-2xl">
                </div>
                <div class="animate-slide-in-right">
                    <span class="text-green-600 font-semibold text-sm uppercase tracking-wider">Our Heritage</span>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6 mt-2">A Town of Rich History</h2>
                    <p class="text-lg text-gray-600 mb-4 leading-relaxed">
                        Isan Ekiti is a historic town in Ekiti State, located in the southwestern region of Nigeria.
                        The town has a rich cultural heritage that spans several centuries, deeply rooted in the
                        traditions of the Ekiti people.
                    </p>
                    <p class="text-lg text-gray-600 mb-4 leading-relaxed">
                        The people of Isan Ekiti are known for their strong community bonds, educational pursuits,
                        and significant contributions to the development of Ekiti State and Nigeria as a whole.
                    </p>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Our history is marked by the resilience and determination of our ancestors, who established
                        a thriving community that continues to flourish today.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-20 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-green-600 font-semibold text-sm uppercase tracking-wider">Timeline</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Historical Milestones</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Key moments that shaped the history of Isan Ekiti
                </p>
            </div>

            <div class="relative">
                <!-- Timeline Line -->
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-green-200"></div>

                <!-- Timeline Items -->
                <div class="space-y-12">
                    <!-- Timeline Item 1 -->
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right animate-fade-in-up">
                            <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-shadow">
                                <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full font-bold text-sm mb-4">
                                    Pre-Colonial Era
                                </span>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Early Settlement</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    The founding of Isan Ekiti dates back centuries, established by our forefathers
                                    who migrated from Ile-Ife, the ancestral home of the Yoruba people. The town
                                    developed as a thriving agricultural community.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <img src="https://images.unsplash.com/photo-1590012314607-cda9d9b699ae?w=600&h=400&fit=crop"
                                 alt="Traditional village"
                                 class="rounded-2xl shadow-xl">
                        </div>
                        <!-- Timeline Dot -->
                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-600 rounded-full border-4 border-white shadow-lg"></div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:order-2 animate-fade-in-up animate-delay-100">
                            <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-shadow">
                                <span class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-bold text-sm mb-4">
                                    19th Century
                                </span>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Traditional Governance</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    The establishment of traditional governance structures with the Alisan (paramount ruler)
                                    at the helm, supported by a council of chiefs. This system maintained peace and
                                    social order in the community.
                                </p>
                            </div>
                        </div>
                        <div class="md:order-1 hidden md:block">
                            <img src="https://images.unsplash.com/photo-1605979399824-d484f17475b3?w=600&h=400&fit=crop"
                                 alt="Traditional ruler"
                                 class="rounded-2xl shadow-xl">
                        </div>
                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-blue-600 rounded-full border-4 border-white shadow-lg"></div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right animate-fade-in-up animate-delay-200">
                            <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-shadow">
                                <span class="inline-block bg-orange-100 text-orange-700 px-4 py-2 rounded-full font-bold text-sm mb-4">
                                    Early 20th Century
                                </span>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Colonial Period</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    During the colonial era, Isan Ekiti became part of the British protectorate.
                                    Despite colonial influence, the town maintained its cultural identity and
                                    traditional practices.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <img src="https://images.unsplash.com/photo-1541364983171-a8ba01e95cfc?w=600&h=400&fit=crop"
                                 alt="Colonial era building"
                                 class="rounded-2xl shadow-xl">
                        </div>
                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-orange-600 rounded-full border-4 border-white shadow-lg"></div>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:order-2 animate-fade-in-up animate-delay-300">
                            <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-shadow">
                                <span class="inline-block bg-purple-100 text-purple-700 px-4 py-2 rounded-full font-bold text-sm mb-4">
                                    1960s
                                </span>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Post-Independence</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Following Nigeria's independence in 1960, Isan Ekiti experienced significant
                                    growth in education and infrastructure. Many indigenes pursued higher education
                                    and returned to contribute to community development.
                                </p>
                            </div>
                        </div>
                        <div class="md:order-1 hidden md:block">
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&h=400&fit=crop"
                                 alt="Education"
                                 class="rounded-2xl shadow-xl">
                        </div>
                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-purple-600 rounded-full border-4 border-white shadow-lg"></div>
                    </div>

                    <!-- Timeline Item 5 -->
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:text-right animate-fade-in-up animate-delay-400">
                            <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-shadow">
                                <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-full font-bold text-sm mb-4">
                                    1996
                                </span>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Ekiti State Creation</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    The creation of Ekiti State on October 1, 1996, marked a new chapter in the
                                    history of Isan Ekiti. The town became part of the newly formed state, leading
                                    to increased political representation and development opportunities.
                                </p>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=600&h=400&fit=crop"
                                 alt="Government building"
                                 class="rounded-2xl shadow-xl">
                        </div>
                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-red-600 rounded-full border-4 border-white shadow-lg"></div>
                    </div>

                    <!-- Timeline Item 6 -->
                    <div class="relative grid md:grid-cols-2 gap-8 items-center">
                        <div class="md:order-2 animate-fade-in-up animate-delay-500">
                            <div class="bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-shadow">
                                <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-full font-bold text-sm mb-4">
                                    21st Century
                                </span>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Modern Era</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    Today, Isan Ekiti continues to thrive as a vibrant community with a strong
                                    emphasis on education, cultural preservation, and community development.
                                    Indigenes worldwide remain connected to their roots through annual celebrations
                                    and digital platforms.
                                </p>
                            </div>
                        </div>
                        <div class="md:order-1 hidden md:block">
                            <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?w=600&h=400&fit=crop"
                                 alt="Modern community"
                                 class="rounded-2xl shadow-xl">
                        </div>
                        <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-6 h-6 bg-green-600 rounded-full border-4 border-white shadow-lg"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultural Heritage Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-green-600 font-semibold text-sm uppercase tracking-wider">Culture</span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 mt-2">Cultural Heritage</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    The traditions and customs that define who we are
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Culture Card 1 -->
                <div class="bg-gradient-to-br from-green-50 to-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Traditional Festivals</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Annual celebrations bring the community together, featuring traditional music, dance,
                        and ceremonies that honor our ancestors and cultural heritage.
                    </p>
                </div>

                <!-- Culture Card 2 -->
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Oral Traditions</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Stories, proverbs, and historical accounts passed down through generations preserve
                        our collective memory and wisdom for future generations.
                    </p>
                </div>

                <!-- Culture Card 3 -->
                <div class="bg-gradient-to-br from-orange-50 to-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all hover:-translate-y-2">
                    <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Community Values</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Strong emphasis on respect for elders, communal support, hard work, and educational
                        excellence defines the character of Isan Ekiti people.
                    </p>
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
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/95 to-green-700/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Be Part of Our Story</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Connect with your heritage and join thousands of indigenes preserving our legacy
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('registration') }}"
                   class="inline-block bg-white text-green-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-green-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                    Register as Indigene
                </a>
                <a href="{{ route('heroes') }}"
                   class="inline-block border-3 border-white text-white px-12 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-green-700 transition-all duration-300">
                    Meet Our Heroes
                </a>
            </div>
        </div>
    </section>
@endsection
