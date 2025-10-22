@extends('admin.layouts.admin')

@section('title', 'Isan Day Page Images')
@section('page-title', 'Manage Isan Day Page Images')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <p class="text-gray-600">Manage all images displayed on the Isan Day public page. Leave blank to use the current image or default placeholder.</p>
        </div>

        <form action="{{ route('admin.isan-day-page-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <!-- Hero Section -->
            <div class="mb-10 pb-8 border-b">
                <h3 class="text-xl font-semibold mb-6 text-purple-600">
                    <i class="fas fa-image mr-2"></i> Hero Section
                </h3>

                <div class="space-y-6">
                    @php
                        $sections = [
                            [
                                'field' => 'hero_image',
                                'label' => 'Hero Background Image',
                                'description' => 'Large background image for the main hero section (Recommended: 1920x1080px)'
                            ],
                        ];
                    @endphp

                    @foreach($sections as $section)
                        <div>
                            <label for="{{ $section['field'] }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $section['label'] }}
                            </label>

                            @if($settings->{{ $section['field'] }})
                                <div class="mb-4">
                                    <p class="text-xs text-gray-500 mb-2">Current Image:</p>
                                    <img src="{{ asset('storage/' . $settings->{{ $section['field'] }}) }}"
                                         alt="{{ $section['label'] }}"
                                         class="max-w-md rounded-lg shadow-md">
                                </div>
                            @endif

                            <input type="file"
                                   name="{{ $section['field'] }}"
                                   id="{{ $section['field'] }}"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   onchange="previewImage(event, '{{ $section['field'] }}_preview')">
                            <p class="mt-1 text-xs text-gray-500">{{ $section['description'] }} (max 5MB)</p>
                            @error($section['field'])
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror

                            <div id="{{ $section['field'] }}_preview" class="mt-4 hidden">
                                <p class="text-xs text-gray-500 mb-2">Preview:</p>
                                <img src="" alt="Preview" class="max-w-md rounded-lg shadow-md">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- About Section -->
            <div class="mb-10 pb-8 border-b">
                <h3 class="text-xl font-semibold mb-6 text-purple-600">
                    <i class="fas fa-info-circle mr-2"></i> About Section
                </h3>

                <div class="space-y-6">
                    @php
                        $sections = [
                            [
                                'field' => 'about_image',
                                'label' => '"What is Isan Day?" Image',
                                'description' => 'Image displayed beside the about text (Recommended: 800x600px)'
                            ],
                        ];
                    @endphp

                    @foreach($sections as $section)
                        <div>
                            <label for="{{ $section['field'] }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $section['label'] }}
                            </label>

                            @if($settings->{{ $section['field'] }})
                                <div class="mb-4">
                                    <p class="text-xs text-gray-500 mb-2">Current Image:</p>
                                    <img src="{{ asset('storage/' . $settings->{{ $section['field'] }}) }}"
                                         alt="{{ $section['label'] }}"
                                         class="max-w-md rounded-lg shadow-md">
                                </div>
                            @endif

                            <input type="file"
                                   name="{{ $section['field'] }}"
                                   id="{{ $section['field'] }}"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   onchange="previewImage(event, '{{ $section['field'] }}_preview')">
                            <p class="mt-1 text-xs text-gray-500">{{ $section['description'] }} (max 5MB)</p>
                            @error($section['field'])
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror

                            <div id="{{ $section['field'] }}_preview" class="mt-4 hidden">
                                <p class="text-xs text-gray-500 mb-2">Preview:</p>
                                <img src="" alt="Preview" class="max-w-md rounded-lg shadow-md">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Event Highlights Section -->
            <div class="mb-10 pb-8 border-b">
                <h3 class="text-xl font-semibold mb-6 text-purple-600">
                    <i class="fas fa-calendar-alt mr-2"></i> Event Highlights (6 Cards)
                </h3>

                <div class="grid md:grid-cols-2 gap-8">
                    @php
                        $highlights = [
                            [
                                'field' => 'highlight_cultural_image',
                                'label' => '1. Cultural Performances',
                                'description' => 'Traditional music & dance'
                            ],
                            [
                                'field' => 'highlight_reception_image',
                                'label' => '2. Grand Reception',
                                'description' => 'Welcome ceremony'
                            ],
                            [
                                'field' => 'highlight_sports_image',
                                'label' => '3. Sports & Recreation',
                                'description' => 'Football & athletics'
                            ],
                            [
                                'field' => 'highlight_summit_image',
                                'label' => '4. Development Summit',
                                'description' => 'Community planning'
                            ],
                            [
                                'field' => 'highlight_cuisine_image',
                                'label' => '5. Traditional Cuisine Fair',
                                'description' => 'Food showcase'
                            ],
                            [
                                'field' => 'highlight_gala_image',
                                'label' => '6. Grand Gala Night',
                                'description' => 'Awards & entertainment'
                            ],
                        ];
                    @endphp

                    @foreach($highlights as $highlight)
                        <div>
                            <label for="{{ $highlight['field'] }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $highlight['label'] }}
                            </label>
                            <p class="text-xs text-gray-500 mb-3">{{ $highlight['description'] }}</p>

                            @if($settings->{{ $highlight['field'] }})
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $settings->{{ $highlight['field'] }}) }}"
                                         alt="{{ $highlight['label'] }}"
                                         class="w-full h-40 object-cover rounded-lg shadow-md">
                                </div>
                            @endif

                            <input type="file"
                                   name="{{ $highlight['field'] }}"
                                   id="{{ $highlight['field'] }}"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm"
                                   onchange="previewImage(event, '{{ $highlight['field'] }}_preview')">
                            <p class="mt-1 text-xs text-gray-500">Recommended: 600x400px</p>
                            @error($highlight['field'])
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror

                            <div id="{{ $highlight['field'] }}_preview" class="mt-3 hidden">
                                <img src="" alt="Preview" class="w-full h-40 object-cover rounded-lg shadow-md">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- CTA Sections -->
            <div class="mb-10">
                <h3 class="text-xl font-semibold mb-6 text-purple-600">
                    <i class="fas fa-bullhorn mr-2"></i> Call-to-Action Sections
                </h3>

                <div class="space-y-8">
                    @php
                        $ctas = [
                            [
                                'field' => 'cta_image',
                                'label' => 'Registration CTA Image',
                                'description' => 'Background image for the registration call-to-action section (Recommended: 800x800px)'
                            ],
                            [
                                'field' => 'final_cta_image',
                                'label' => 'Final CTA Background',
                                'description' => 'Background image for the final call-to-action section (Recommended: 1920x600px)'
                            ],
                        ];
                    @endphp

                    @foreach($ctas as $cta)
                        <div>
                            <label for="{{ $cta['field'] }}" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $cta['label'] }}
                            </label>

                            @if($settings->{{ $cta['field'] }})
                                <div class="mb-4">
                                    <p class="text-xs text-gray-500 mb-2">Current Image:</p>
                                    <img src="{{ asset('storage/' . $settings->{{ $cta['field'] }}) }}"
                                         alt="{{ $cta['label'] }}"
                                         class="max-w-md rounded-lg shadow-md">
                                </div>
                            @endif

                            <input type="file"
                                   name="{{ $cta['field'] }}"
                                   id="{{ $cta['field'] }}"
                                   accept="image/*"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   onchange="previewImage(event, '{{ $cta['field'] }}_preview')">
                            <p class="mt-1 text-xs text-gray-500">{{ $cta['description'] }} (max 5MB)</p>
                            @error($cta['field'])
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror

                            <div id="{{ $cta['field'] }}_preview" class="mt-4 hidden">
                                <p class="text-xs text-gray-500 mb-2">Preview:</p>
                                <img src="" alt="Preview" class="max-w-md rounded-lg shadow-md">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="{{ route('admin.dashboard') }}"
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    <i class="fas fa-save mr-2"></i> Save All Images
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event, previewId) {
    const preview = document.getElementById(previewId);
    const img = preview.querySelector('img');

    if (event.target.files && event.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
}
</script>
@endsection
