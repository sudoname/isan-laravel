@extends('admin.layouts.admin')

@section('title', 'Create News/Blog Post')
@section('page-title', 'Create News/Blog Post')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Basic Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Basic Information</h3>

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               placeholder="Enter post title"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <select name="category" id="category"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                required>
                            <option value="">Select Category</option>
                            <option value="news" {{ old('category') == 'news' ? 'selected' : '' }}>News</option>
                            <option value="blog" {{ old('category') == 'blog' ? 'selected' : '' }}>Blog</option>
                            <option value="announcement" {{ old('category') == 'announcement' ? 'selected' : '' }}>Announcement</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Excerpt -->
                    <div>
                        <label for="excerpt" class="block text-sm font-medium text-gray-700 mb-2">
                            Excerpt
                        </label>
                        <textarea name="excerpt" id="excerpt" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                  placeholder="Brief summary of the post (shown in listings)">{{ old('excerpt') }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Brief summary displayed in post listings. If left empty, content will be auto-excerpted.</p>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                            Featured Image
                        </label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               onchange="previewImage(event)">
                        <p class="mt-1 text-xs text-gray-500">Recommended: 1200x630px, max 2MB</p>
                        @error('featured_image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <div id="imagePreview" class="mt-4 hidden">
                            <img src="" alt="Preview" class="max-w-md rounded-lg">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Content</h3>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                        Post Content <span class="text-red-500">*</span>
                    </label>
                    <textarea name="content" id="content" rows="15"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent tinymce"
                              required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Publishing Options -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Publishing Options</h3>

                <div class="space-y-4">
                    <!-- Published At -->
                    <div>
                        <label for="published_at" class="block text-sm font-medium text-gray-700 mb-2">
                            Publish Date & Time
                        </label>
                        <input type="datetime-local" name="published_at" id="published_at"
                               value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Set the publish date and time. Leave as current time for immediate publishing.</p>
                        @error('published_at')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Is Published -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published" value="1"
                               {{ old('is_published', true) ? 'checked' : '' }}
                               class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="is_published" class="ml-2 block text-sm text-gray-900">
                            Publish immediately (Uncheck to save as draft)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.news.index') }}"
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    <i class="fas fa-save mr-2"></i> Create Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize TinyMCE v8 with enhanced plugins
    tinymce.init({
        selector: '.tinymce',
        height: 500,
        plugins: [
            'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
        ],
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: '{{ Auth::user()->name }}',
        uploadcare_public_key: '682d4029dd931b43b477'
    });

    // Image preview
    function previewImage(event) {
        const preview = document.getElementById('imagePreview');
        const img = preview.querySelector('img');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
