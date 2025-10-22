@extends('admin.layouts.admin')

@section('title', 'Create Attraction')
@section('page-title', 'Create Attraction')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.attractions.index') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i> Back to Attractions
        </a>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.attractions.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Basic Information</h3>

                <div class="space-y-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Attraction Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                            Slug (URL)
                        </label>
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ old('slug') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('slug') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500">Leave blank to auto-generate from name</p>
                        @error('slug')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category and Location -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                Category <span class="text-red-500">*</span>
                            </label>
                            <select name="category"
                                    id="category"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('category') border-red-500 @enderror">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                Location
                            </label>
                            <input type="text"
                                   name="location"
                                   id="location"
                                   value="{{ old('location') }}"
                                   placeholder="e.g., Downtown Isan Ekiti"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('location') border-red-500 @enderror">
                            @error('location')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                            Short Description
                        </label>
                        <textarea name="description"
                                  id="description"
                                  rows="3"
                                  maxlength="500"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Brief description for listings (max 500 characters)</p>
                        @error('description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Full Description -->
                    <div>
                        <label for="full_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Description
                        </label>
                        <textarea name="full_description"
                                  id="full_description"
                                  rows="10"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent tinymce @error('full_description') border-red-500 @enderror">{{ old('full_description') }}</textarea>
                        @error('full_description')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">
                            Attraction Image
                        </label>
                        <input type="file"
                               name="image_url"
                               id="image_url"
                               accept="image/*"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               onchange="previewImage(event)">
                        <p class="mt-1 text-xs text-gray-500">Recommended: 1200x800px, max 5MB</p>
                        @error('image_url')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                        <div id="imagePreview" class="mt-4 hidden">
                            <img src="" alt="Preview" class="max-w-md rounded-lg">
                        </div>
                    </div>

                    <!-- Display Order -->
                    <div>
                        <label for="display_order" class="block text-sm font-medium text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input type="number"
                               name="display_order"
                               id="display_order"
                               value="{{ old('display_order', 0) }}"
                               min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('display_order') border-red-500 @enderror">
                        <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                        @error('display_order')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Checkboxes -->
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox"
                                   name="is_featured"
                                   id="is_featured"
                                   value="1"
                                   {{ old('is_featured') ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="is_featured" class="ml-2 text-sm text-gray-700">
                                <i class="fas fa-star mr-1"></i> Feature this attraction
                            </label>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                   name="is_published"
                                   id="is_published"
                                   value="1"
                                   {{ old('is_published') ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="is_published" class="ml-2 text-sm text-gray-700">
                                <i class="fas fa-check-circle mr-1"></i> Publish this attraction
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-6 border-t">
                <a href="{{ route('admin.attractions.index') }}"
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                    <i class="fas fa-save mr-2"></i> Create Attraction
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const slug = this.value.toLowerCase()
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/^-+|-+$/g, '');
        document.getElementById('slug').value = slug;
    });

    // Image preview
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.getElementById('imagePreview');
                const img = preview.querySelector('img');
                img.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

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
        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | code',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; font-size: 14px; }'
    });
</script>
@endpush
@endsection
