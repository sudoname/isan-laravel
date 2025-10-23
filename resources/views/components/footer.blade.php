@php
    $settings = \App\Models\SiteSetting::getSettings();
@endphp

<footer class="bg-gray-900 text-gray-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About Section -->
            <div>
                <h3 class="text-white text-xl font-bold mb-4">{{ $settings->site_name ?? 'Isan Ekiti' }}</h3>
                <p class="text-sm leading-relaxed mb-4">
                    {{ $settings->footer_text ?? 'Preserving our heritage and building a brighter future for the Isan Ekiti community.' }}
                </p>
                @if($settings->contact_address)
                    <p class="text-sm text-gray-400">
                        {!! nl2br(e($settings->contact_address)) !!}
                    </p>
                @else
                    <p class="text-sm text-gray-400">
                        Oye Local Government<br>
                        Ekiti State, Nigeria
                    </p>
                @endif
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
                    @if($settings->contact_email)
                        <li>
                            <i class="fas fa-envelope mr-2"></i>
                            <a href="mailto:{{ $settings->contact_email }}" class="hover:text-green-400">{{ $settings->contact_email }}</a>
                        </li>
                    @endif
                    @if($settings->contact_phone)
                        <li>
                            <i class="fas fa-phone mr-2"></i>
                            <a href="tel:{{ $settings->contact_phone }}" class="hover:text-green-400">{{ $settings->contact_phone }}</a>
                        </li>
                    @endif
                    <li class="pt-4">
                        <a href="{{ route('contact') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-colors">
                            Contact Us
                        </a>
                    </li>
                </ul>

                <!-- Social Links -->
                <div class="flex gap-4 mt-4">
                    @if($settings->social_facebook)
                        <a href="{{ $settings->social_facebook }}" target="_blank" rel="noopener" class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                    @endif
                    @if($settings->social_twitter)
                        <a href="{{ $settings->social_twitter }}" target="_blank" rel="noopener" class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                    @endif
                    @if($settings->social_instagram)
                        <a href="{{ $settings->social_instagram }}" target="_blank" rel="noopener" class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                    @endif
                    @if($settings->social_youtube)
                        <a href="{{ $settings->social_youtube }}" target="_blank" rel="noopener" class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <i class="fab fa-youtube text-sm"></i>
                        </a>
                    @endif
                    @if($settings->social_linkedin)
                        <a href="{{ $settings->social_linkedin }}" target="_blank" rel="noopener" class="w-8 h-8 bg-gray-700 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                            <i class="fab fa-linkedin-in text-sm"></i>
                        </a>
                    @endif
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
            <p>{{ $settings->footer_copyright ?? '© ' . date('Y') . ' Isan Ekiti. All rights reserved.' }} Built with ❤️ for the Isan Ekiti community by <a href="#" class="text-green-400 hover:text-green-300 font-semibold transition-colors">Khan Innovations Nigeria Limited</a></p>
        </div>
    </div>
</footer>
