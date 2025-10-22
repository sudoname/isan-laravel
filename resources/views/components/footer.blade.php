<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About Section -->
            <div>
                <h3 class="text-white text-xl font-bold mb-4">Isan Ekiti</h3>
                <p class="text-sm leading-relaxed mb-4">
                    Preserving our heritage and building a brighter future for the Isan Ekiti community.
                </p>
                <p class="text-sm text-gray-400">
                    Oye Local Government<br>
                    Ekiti State, Nigeria
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('history') }}" class="hover:text-green-400 transition-colors">Our History</a></li>
                    <li><a href="{{ route('heroes') }}" class="hover:text-green-400 transition-colors">Our Heroes</a></li>
                    <li><a href="{{ route('attractions') }}" class="hover:text-green-400 transition-colors">Attractions</a></li>
                    <li><a href="{{ route('isan-day') }}" class="hover:text-green-400 transition-colors">Isan Day</a></li>
                </ul>
            </div>

            <!-- Community -->
            <div>
                <h4 class="text-white font-semibold mb-4">Community</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('registration') }}" class="hover:text-green-400 transition-colors">Register as Indigene</a></li>
                    <li><a href="{{ route('forum.index') }}" class="hover:text-green-400 transition-colors">Community Forum</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-green-400 transition-colors">News & Updates</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="text-white font-semibold mb-4">Contact</h4>
                <ul class="space-y-2 text-sm">
                    <li>Email: info@isanekiti.com</li>
                    <li>Phone: +234 XXX XXX XXXX</li>
                    <li class="pt-4">
                        <a href="{{ route('contact') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                            Contact Us
                        </a>
                    </li>
                </ul>

                <!-- Social Links -->
                <div class="flex gap-4 mt-4">
                    <a href="#" class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-sm">
            <div class="mb-4">
                <a href="{{ route('policy.privacy') }}" class="text-gray-300 hover:text-purple-400 transition-colors mx-3">Privacy Policy</a>
                <span class="text-gray-600">•</span>
                <a href="{{ route('policy.terms') }}" class="text-gray-300 hover:text-purple-400 transition-colors mx-3">Terms of Service</a>
            </div>
            <p>&copy; {{ date('Y') }} Isan Ekiti. All rights reserved. Built with ❤️ for the Isan Ekiti community by <a href="#" class="text-green-400 hover:text-green-300 font-semibold transition-colors">Khan Innovations Nigeria Limited</a></p>
        </div>
    </div>
</footer>
