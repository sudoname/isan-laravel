@extends('layouts.public')

@section('title', 'Contact Us - Isan Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1920&h=600&fit=crop"
                 alt="Contact background"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-teal-900/95 to-teal-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Get in Touch</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                We'd love to hear from you. Send us a message and we'll respond as soon as possible
            </p>
        </div>
    </section>

    <!-- Contact Form and Info Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12">
                <!-- Contact Information -->
                <div class="lg:col-span-1 space-y-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Contact Information</h2>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            Reach out to us through any of the following channels. We're here to help with
                            any questions or concerns you may have.
                        </p>
                    </div>

                    <!-- Contact Cards -->
                    <div class="space-y-6">
                        <!-- Location Card -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-teal-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Address</h3>
                                    <p class="text-gray-600">
                                        Isan Ekiti<br>
                                        Oye Local Government<br>
                                        Ekiti State, Nigeria
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Email Card -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Email</h3>
                                    <a href="mailto:info@isanekiti.com" class="text-teal-600 hover:text-teal-700">
                                        info@isanekiti.com
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Phone Card -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">Phone</h3>
                                    <a href="tel:+2348012345678" class="text-teal-600 hover:text-teal-700">
                                        +234 801 234 5678
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Card -->
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-shadow">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-bold text-gray-900 mb-2">Social Media</h3>
                                    <div class="flex gap-3">
                                        <a href="#" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center text-white hover:bg-blue-500 transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                            </svg>
                                        </a>
                                        <a href="#" class="w-8 h-8 bg-pink-600 rounded-full flex items-center justify-center text-white hover:bg-pink-700 transition-colors">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Send us a Message</h2>
                        <p class="text-gray-600 mb-8">Fill out the form below and we'll get back to you shortly</p>

                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <!-- Name Fields -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        First Name *
                                    </label>
                                    <input type="text"
                                           id="first_name"
                                           name="first_name"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                                           placeholder="John">
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Last Name *
                                    </label>
                                    <input type="text"
                                           id="last_name"
                                           name="last_name"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                                           placeholder="Doe">
                                </div>
                            </div>

                            <!-- Email and Phone -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Email Address *
                                    </label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                                           placeholder="john.doe@example.com">
                                </div>
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Phone Number
                                    </label>
                                    <input type="tel"
                                           id="phone"
                                           name="phone"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                                           placeholder="+234 801 234 5678">
                                </div>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Subject *
                                </label>
                                <input type="text"
                                       id="subject"
                                       name="subject"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                                       placeholder="How can we help you?">
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Message *
                                </label>
                                <textarea id="message"
                                          name="message"
                                          rows="6"
                                          required
                                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all resize-none"
                                          placeholder="Tell us more about your inquiry..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit"
                                        class="w-full bg-gradient-to-r from-teal-600 to-teal-700 text-white px-8 py-4 rounded-xl font-bold text-lg hover:from-teal-700 hover:to-teal-800 hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                    <span>Send Message</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </div>

                            <p class="text-sm text-gray-500 text-center">
                                By submitting this form, you agree to our privacy policy and terms of service.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section (Placeholder) -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Visit Us</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Find us in the heart of Ekiti State, Southwest Nigeria
                </p>
            </div>

            <div class="rounded-3xl overflow-hidden shadow-2xl">
                <!-- Google Maps Embed -->
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.189784886534!2d5.313462174010955!3d7.921883592106969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10480df9a4fc535b%3A0xf42b72a84238651!2sIsan-Ekiti%20371105%2C%20Ekiti%2C%20Nigeria!5e0!3m2!1sen!2sus!4v1729536000000!5m2!1sen!2sus"
                    width="100%"
                    height="500"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-[500px]">
                </iframe>
            </div>

            <!-- Map Info Cards -->
            <div class="grid md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                    <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Coordinates</h3>
                    <p class="text-gray-600 text-sm">7.9214° N, 5.3168° E</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Local Government</h3>
                    <p class="text-gray-600 text-sm">Oye Local Government<br>Ekiti State, Nigeria</p>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Time Zone</h3>
                    <p class="text-gray-600 text-sm">WAT (UTC+1)</p>
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
            <div class="absolute inset-0 bg-gradient-to-r from-teal-900/95 to-teal-700/95"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">Join Our Community</h2>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Register as an indigene and stay connected with Isan Ekiti worldwide
            </p>
            <div class="flex flex-col sm:flex-row gap-6 justify-center">
                <a href="{{ route('registration') }}"
                   class="inline-block bg-white text-teal-700 px-12 py-5 rounded-full font-bold text-xl hover:bg-teal-50 hover:scale-105 transition-all duration-300 shadow-2xl">
                    Register Now
                </a>
                <a href="{{ route('forum.index') }}"
                   class="inline-block border-3 border-white text-white px-12 py-5 rounded-full font-bold text-xl hover:bg-white hover:text-teal-700 transition-all duration-300">
                    Visit Forum
                </a>
            </div>
        </div>
    </section>
@endsection
