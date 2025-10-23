@extends('admin.layouts.admin')

@section('title', 'Site Settings')
@section('page-title', 'Site Settings')

@section('content')
<div class="max-w-5xl mx-auto">
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" x-data="{ activeTab: 'general' }">
        @csrf
        @method('PUT')

        <!-- Tabs -->
        <div class="bg-white rounded-lg shadow mb-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8 px-6" aria-label="Tabs">
                    <button type="button" @click="activeTab = 'general'"
                            :class="activeTab === 'general' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        <i class="fas fa-cog mr-2"></i> General
                    </button>
                    <button type="button" @click="activeTab = 'hero'"
                            :class="activeTab === 'hero' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        <i class="fas fa-image mr-2"></i> Homepage Hero
                    </button>
                    <button type="button" @click="activeTab = 'contact'"
                            :class="activeTab === 'contact' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        <i class="fas fa-phone mr-2"></i> Contact
                    </button>
                    <button type="button" @click="activeTab = 'social'"
                            :class="activeTab === 'social' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        <i class="fas fa-share-alt mr-2"></i> Social Media
                    </button>
                    <button type="button" @click="activeTab = 'tiles'"
                            :class="activeTab === 'tiles' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        <i class="fas fa-th-large mr-2"></i> Tile Images
                    </button>
                    <button type="button" @click="activeTab = 'footer'"
                            :class="activeTab === 'footer' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'"
                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                        <i class="fas fa-align-center mr-2"></i> Footer
                    </button>
                </nav>
            </div>
        </div>

        <!-- Tab Content -->
        <div class="bg-white rounded-lg shadow p-6">
            <!-- General Settings -->
            <div x-show="activeTab === 'general'" class="space-y-6">
                <h3 class="text-lg font-semibold mb-4">General Settings</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Name *</label>
                    <input type="text" name="site_name" value="{{ old('site_name', $settings->site_name) }}" required class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Tagline</label>
                    <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings->site_tagline) }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Site Description</label>
                    <textarea name="site_description" rows="4" class="w-full border-gray-300 rounded-lg">{{ old('site_description', $settings->site_description) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Logo</label>
                        @if($settings->logo_url)
                            <img src="{{ asset('storage/' . $settings->logo_url) }}" alt="Current Logo" class="mb-2 max-h-20">
                        @endif
                        <input type="file" name="logo_url" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-sm text-gray-500 mt-1">Max 5MB. Supported: JPG, PNG, WebP</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Favicon</label>
                        @if($settings->favicon_url)
                            <img src="{{ asset('storage/' . $settings->favicon_url) }}" alt="Current Favicon" class="mb-2 max-h-8">
                        @endif
                        <input type="file" name="favicon_url" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-sm text-gray-500 mt-1">Max 1MB. Supported: ICO, PNG</p>
                    </div>
                </div>
            </div>

            <!-- Homepage Hero -->
            <div x-show="activeTab === 'hero'" class="space-y-6">
                <h3 class="text-lg font-semibold mb-4">Homepage Hero Section</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Background Image</label>
                    @if($settings->homepage_hero_image)
                        <img src="{{ asset('storage/' . $settings->homepage_hero_image) }}" alt="Current Hero" class="mb-2 max-h-40 rounded">
                    @endif
                    <input type="file" name="homepage_hero_image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                    <p class="text-sm text-gray-500 mt-1">Max 5MB. Recommended: 1920x600px</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Title</label>
                    <input type="text" name="homepage_hero_title" value="{{ old('homepage_hero_title', $settings->homepage_hero_title) }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Hero Subtitle</label>
                    <textarea name="homepage_hero_subtitle" rows="3" class="w-full border-gray-300 rounded-lg">{{ old('homepage_hero_subtitle', $settings->homepage_hero_subtitle) }}</textarea>
                </div>
            </div>

            <!-- Contact Information -->
            <div x-show="activeTab === 'contact'" class="space-y-6">
                <h3 class="text-lg font-semibold mb-4">Contact Information</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Contact Email</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings->contact_email) }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Contact Phone</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings->contact_phone) }}" class="w-full border-gray-300 rounded-lg">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Contact Address</label>
                    <textarea name="contact_address" rows="3" class="w-full border-gray-300 rounded-lg">{{ old('contact_address', $settings->contact_address) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Google Maps Embed URL</label>
                    <textarea name="google_maps_embed_url" rows="3" class="w-full border-gray-300 rounded-lg" placeholder="<iframe src='...'></iframe>">{{ old('google_maps_embed_url', $settings->google_maps_embed_url) }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">Paste the entire embed code from Google Maps</p>
                </div>
            </div>

            <!-- Social Media -->
            <div x-show="activeTab === 'social'" class="space-y-6">
                <h3 class="text-lg font-semibold mb-4">Social Media Links</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-facebook text-blue-600"></i> Facebook URL
                    </label>
                    <input type="url" name="social_facebook" value="{{ old('social_facebook', $settings->social_facebook) }}" class="w-full border-gray-300 rounded-lg" placeholder="https://facebook.com/...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-twitter text-blue-400"></i> Twitter URL
                    </label>
                    <input type="url" name="social_twitter" value="{{ old('social_twitter', $settings->social_twitter) }}" class="w-full border-gray-300 rounded-lg" placeholder="https://twitter.com/...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-instagram text-pink-600"></i> Instagram URL
                    </label>
                    <input type="url" name="social_instagram" value="{{ old('social_instagram', $settings->social_instagram) }}" class="w-full border-gray-300 rounded-lg" placeholder="https://instagram.com/...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-youtube text-red-600"></i> YouTube URL
                    </label>
                    <input type="url" name="social_youtube" value="{{ old('social_youtube', $settings->social_youtube) }}" class="w-full border-gray-300 rounded-lg" placeholder="https://youtube.com/...">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        <i class="fab fa-linkedin text-blue-700"></i> LinkedIn URL
                    </label>
                    <input type="url" name="social_linkedin" value="{{ old('social_linkedin', $settings->social_linkedin) }}" class="w-full border-gray-300 rounded-lg" placeholder="https://linkedin.com/...">
                </div>
            </div>

            <!-- Tile Images -->
            <div x-show="activeTab === 'tiles'" class="space-y-6">
                <h3 class="text-lg font-semibold mb-4">Homepage Tile Images</h3>
                <p class="text-gray-600 mb-6">Upload custom images for each tile on the homepage. These will replace the default images.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- History Tile -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-book text-green-600 mr-1"></i> History Tile
                        </label>
                        @if($settings->tile_history_image)
                            <img src="{{ asset('storage/' . $settings->tile_history_image) }}" alt="History Tile" class="mb-2 rounded-lg max-h-40 w-full object-cover">
                        @endif
                        <input type="file" name="tile_history_image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-xs text-gray-500 mt-1">Recommended: 600x400px, max 5MB</p>
                    </div>

                    <!-- Heroes Tile -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-star text-blue-600 mr-1"></i> Heroes Tile
                        </label>
                        @if($settings->tile_heroes_image)
                            <img src="{{ asset('storage/' . $settings->tile_heroes_image) }}" alt="Heroes Tile" class="mb-2 rounded-lg max-h-40 w-full object-cover">
                        @endif
                        <input type="file" name="tile_heroes_image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-xs text-gray-500 mt-1">Recommended: 600x400px, max 5MB</p>
                    </div>

                    <!-- Attractions Tile -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-map-marked-alt text-orange-600 mr-1"></i> Attractions Tile
                        </label>
                        @if($settings->tile_attractions_image)
                            <img src="{{ asset('storage/' . $settings->tile_attractions_image) }}" alt="Attractions Tile" class="mb-2 rounded-lg max-h-40 w-full object-cover">
                        @endif
                        <input type="file" name="tile_attractions_image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-xs text-gray-500 mt-1">Recommended: 600x400px, max 5MB</p>
                    </div>

                    <!-- Isan Day Tile -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-calendar-day text-purple-600 mr-1"></i> Isan Day Tile
                        </label>
                        @if($settings->tile_isan_day_image)
                            <img src="{{ asset('storage/' . $settings->tile_isan_day_image) }}" alt="Isan Day Tile" class="mb-2 rounded-lg max-h-40 w-full object-cover">
                        @endif
                        <input type="file" name="tile_isan_day_image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-xs text-gray-500 mt-1">Recommended: 600x400px, max 5MB</p>
                    </div>

                    <!-- News Tile -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-newspaper text-red-600 mr-1"></i> News & Updates Tile
                        </label>
                        @if($settings->tile_news_image)
                            <img src="{{ asset('storage/' . $settings->tile_news_image) }}" alt="News Tile" class="mb-2 rounded-lg max-h-40 w-full object-cover">
                        @endif
                        <input type="file" name="tile_news_image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-xs text-gray-500 mt-1">Recommended: 600x400px, max 5MB</p>
                    </div>

                    <!-- Forum Tile -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-comments text-indigo-600 mr-1"></i> Forum Tile
                        </label>
                        @if($settings->tile_forum_image)
                            <img src="{{ asset('storage/' . $settings->tile_forum_image) }}" alt="Forum Tile" class="mb-2 rounded-lg max-h-40 w-full object-cover">
                        @endif
                        <input type="file" name="tile_forum_image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-xs text-gray-500 mt-1">Recommended: 600x400px, max 5MB</p>
                    </div>
                </div>

                <!-- Registration CTA Section -->
                <div class="border-t border-gray-200 pt-6 mt-6">
                    <h4 class="text-md font-semibold text-gray-800 mb-4">"Are You an Indigene?" Section</h4>
                    <div class="border border-gray-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <i class="fas fa-user-check text-green-600 mr-1"></i> Registration CTA Background
                        </label>
                        @if($settings->cta_registration_image)
                            <img src="{{ asset('storage/' . $settings->cta_registration_image) }}" alt="Registration CTA" class="mb-2 rounded-lg max-h-40 w-full object-cover">
                        @endif
                        <input type="file" name="cta_registration_image" accept="image/*" class="w-full border-gray-300 rounded-lg">
                        <p class="text-xs text-gray-500 mt-1">Recommended: 1920x600px, max 5MB. Background for registration call-to-action section.</p>
                    </div>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mt-6">
                    <p class="text-sm text-blue-800">
                        <i class="fas fa-info-circle mr-2"></i>
                        <strong>Note:</strong> If no custom image is uploaded, the default images will be used for each tile.
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div x-show="activeTab === 'footer'" class="space-y-6">
                <h3 class="text-lg font-semibold mb-4">Footer Settings</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Footer Text</label>
                    <textarea name="footer_text" rows="4" class="w-full border-gray-300 rounded-lg">{{ old('footer_text', $settings->footer_text) }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">Appears in the footer of every page</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Copyright Text</label>
                    <input type="text" name="footer_copyright" value="{{ old('footer_copyright', $settings->footer_copyright) }}" class="w-full border-gray-300 rounded-lg">
                    <p class="text-sm text-gray-500 mt-1">Example: Copyright 2025 Isan Ekiti. All rights reserved.</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4 pt-6 border-t mt-6">
                <a href="{{ route('admin.dashboard') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                    <i class="fas fa-save mr-2"></i> Save Settings
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endpush
@endsection
