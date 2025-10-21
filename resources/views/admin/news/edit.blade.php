@extends('admin.layouts.admin')

@section('title', 'Edit News/Blog Post')
@section('page-title', 'Edit Post: ' . Str::limit($news->title, 50))

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Basic Information</h3>

                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $news->title) }}"
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
                            <option value="news" {{ old('category', $news->category) == 'news' ? 'selected' : '' }}>News</option>
                            <option value="blog" {{ old('category', $news->category) == 'blog' ? 'selected' : '' }}>Blog</option>
                            <option value="announcement" {{ old('category', $news->category) == 'announcement' ? 'selected' : '' }}>Announcement</option>
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
                                  placeholder="Brief summary of the post (shown in listings)">{{ old('excerpt', $news->excerpt) }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Brief summary displayed in post listings. If left empty, content will be auto-excerpted.</p>
                        @error('excerpt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Featured Image -->
                    @if($news->featured_image)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Featured Image</label>
                            <img src="{{ asset($news->featured_image) }}"
                                 alt="{{ $news->title }}"
                                 class="max-w-md rounded-lg">
                        </div>
                    @endif

                    <!-- Featured Image -->
                    <div>
                        <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">
                            Change Featured Image
                        </label>
                        <input type="file" name="featured_image" id="featured_image" accept="image/*"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                               onchange="previewImage(event)">
                        <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image. Recommended: 1200x630px, max 2MB</p>
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
                              required>{{ old('content', $news->content) }}</textarea>
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
                               value="{{ old('published_at', $news->published_at?->format('Y-m-d\TH:i') ?? now()->format('Y-m-d\TH:i')) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Set the publish date and time.</p>
                        @error('published_at')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Is Published -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published" value="1"
                               {{ old('is_published', $news->is_published) ? 'checked' : '' }}
                               class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                        <label for="is_published" class="ml-2 block text-sm text-gray-900">
                            Published (Uncheck to save as draft)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Post Stats -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Post Statistics</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500">Views</p>
                        <p class="text-2xl font-semibold text-gray-900">{{ $news->views ?? 0 }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500">Author</p>
                        <p class="text-sm font-medium text-gray-900">{{ $news->author?->name ?? 'Unknown' }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500">Created</p>
                        <p class="text-sm font-medium text-gray-900">{{ $news->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500">Last Updated</p>
                        <p class="text-sm font-medium text-gray-900">{{ $news->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-between pt-6 border-t">
                <form action="{{ route('admin.news.destroy', $news) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this post? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                        <i class="fas fa-trash mr-2"></i> Delete Post
                    </button>
                </form>

                <div class="flex space-x-4">
                    <a href="{{ route('admin.news.index') }}"
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </a>
                    <a href="{{ route('news.show', $news->slug) }}"
                       target="_blank"
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-eye mr-2"></i> Preview
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                        <i class="fas fa-save mr-2"></i> Update Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize TinyMCE with more plugins for rich content editing
    tinymce.init({
        selector: '.tinymce',
        height: 500,
        menubar: false,
        plugins: [
            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'help', 'wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic underline | ' +
                 'alignleft aligncenter alignright alignjustify | ' +
                 'bullist numlist outdent indent | link image media | ' +
                 'removeformat code fullscreen help',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; font-size: 16px; line-height: 1.6; }',
        image_advtab: true,
        relative_urls: false,
        remove_script_host: false,
        convert_urls: true,
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
