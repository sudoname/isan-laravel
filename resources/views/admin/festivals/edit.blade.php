@extends('admin.layouts.admin')

@section('title', 'Edit Festival')
@section('page-title', 'Edit Festival: ' . $festival->title)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form id="festivalForm" action="{{ route('admin.festivals.update', $festival) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Basic Information</h3>

                <div class="grid grid-cols-1 gap-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Festival Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $festival->title) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="e.g., New Yam Festival"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            URL Slug
                        </label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $festival->slug) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="Auto-generated from title (optional)">
                        <p class="mt-1 text-xs text-gray-500">Leave empty to auto-generate from title</p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Short Description -->
                    <div>
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Short Description <span class="text-red-500">*</span>
                        </label>
                        <textarea name="short_description" id="short_description" rows="3"
                                  maxlength="500"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                  placeholder="Brief description displayed in listings (max 500 characters)"
                                  required>{{ old('short_description', $festival->short_description) }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Brief description shown in festival listings (max 500 characters)</p>
                        @error('short_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Full Description -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Full Description</h3>
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Full Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="description" id="description" rows="10"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent tinymce">{{ old('description', $festival->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Event Details -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Event Details</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Event Date -->
                    <div>
                        <label for="event_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Event Date
                        </label>
                        <input type="date" name="event_date" id="event_date"
                               value="{{ old('event_date', $festival->event_date ? $festival->event_date->format('Y-m-d') : '') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        @error('event_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                            Location
                        </label>
                        <input type="text" name="location" id="location" value="{{ old('location', $festival->location) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="e.g., Isan Ekiti, Ekiti State">
                        @error('location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Media -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Media</h3>

                <!-- Current Featured Image -->
                @if($festival->featured_image)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Featured Image</label>
                        <img src="{{ asset('storage/' . $festival->featured_image) }}"
                             alt="{{ $festival->title }}"
                             class="w-full max-w-md h-64 object-cover rounded-lg">
                    </div>
                @endif

                <!-- Featured Image -->
                <div class="mb-6">
                    <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                        Change Featured Image
                    </label>
                    <input type="file" name="featured_image" id="featured_image" accept="image/*"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           onchange="previewFeaturedImage(event)">
                    <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image. Main image for the festival (JPEG, JPG, PNG, WEBP, max 5MB)</p>
                    @error('featured_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div id="featuredImagePreview" class="mt-4 hidden">
                        <img src="" alt="Preview" class="w-full max-w-md h-64 object-cover rounded-lg">
                    </div>
                </div>

                <!-- Video URL -->
                <div class="mb-6">
                    <label for="video_url" class="block text-sm font-medium text-gray-700 mb-2">
                        Video URL
                    </label>
                    <input type="url" name="video_url" id="video_url" value="{{ old('video_url', $festival->video_url) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           placeholder="https://www.youtube.com/watch?v=...">
                    <p class="mt-1 text-xs text-gray-500">YouTube, Vimeo, or other video URL</p>
                    @error('video_url')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Existing Gallery Images -->
                @if(!empty($festival->images) && count($festival->images) > 0)
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Gallery Images</label>
                        <p class="text-xs text-gray-500 mb-3">Select images to remove them from the gallery</p>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            @foreach($festival->images as $image)
                                <div class="relative">
                                    <img src="{{ asset('storage/' . $image) }}"
                                         alt="Gallery image"
                                         class="w-full h-32 object-cover rounded-lg">
                                    <label class="absolute top-2 right-2 bg-white rounded-lg p-2 cursor-pointer hover:bg-red-50">
                                        <input type="checkbox" name="remove_gallery_images[]" value="{{ $image }}"
                                               class="w-4 h-4 text-red-600 border-gray-300 rounded focus:ring-red-500">
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Add New Gallery Images -->
                <div>
                    <label for="gallery_images" class="block text-sm font-medium text-gray-700 mb-2">
                        Add Gallery Images
                    </label>
                    <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           onchange="previewGalleryImages(event)">
                    <p class="mt-1 text-xs text-gray-500">Select multiple images to add to the gallery (JPEG, JPG, PNG, WEBP, max 5MB each)</p>
                    @error('gallery_images.*')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <div id="galleryPreview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4"></div>
                </div>
            </div>

            <!-- Publishing Options -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Publishing Options</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Published Checkbox -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published" value="1"
                               {{ old('is_published', $festival->is_published) ? 'checked' : '' }}
                               class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                        <label for="is_published" class="ml-2 block text-sm font-medium text-gray-700">
                            Publish this festival
                        </label>
                    </div>

                    <!-- Display Order -->
                    <div>
                        <label for="display_order" class="block text-sm font-medium text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input type="number" name="display_order" id="display_order"
                               value="{{ old('display_order', $festival->display_order) }}"
                               min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="0">
                        <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                        @error('display_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.festivals.index') }}"
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                    <i class="fas fa-save mr-2"></i> Update Festival
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/8/tinymce.min.js" referrerpolicy="origin"></script>
<script>
// Initialize TinyMCE
tinymce.init({
    selector: '.tinymce',
    height: 400,
    menubar: false,
    plugins: [
        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
        'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | help',
    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; font-size: 14px; }',
    automatic_uploads: false,
    file_picker_types: 'image',
    promotion: false
});

// Handle form submission - ensure TinyMCE content is saved
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('festivalForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            // Save all TinyMCE editors
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }
        });
    }
});

// Preview featured image
function previewFeaturedImage(event) {
    const preview = document.getElementById('featuredImagePreview');
    const img = preview.querySelector('img');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            img.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('hidden');
    }
}

// Preview gallery images
function previewGalleryImages(event) {
    const preview = document.getElementById('galleryPreview');
    preview.innerHTML = '';
    const files = event.target.files;

    if (files.length > 0) {
        Array.from(files).forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function(e) {
                const div = document.createElement('div');
                div.className = 'relative';
                div.innerHTML = `
                    <img src="${e.target.result}" alt="New ${index + 1}" class="w-full h-32 object-cover rounded-lg">
                    <div class="absolute bottom-2 right-2 bg-green-500 text-white text-xs px-2 py-1 rounded">
                        New ${index + 1}
                    </div>
                `;
                preview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }
}
</script>
@endsection
