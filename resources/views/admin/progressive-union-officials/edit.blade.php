@extends('admin.layouts.admin')

@section('title', 'Edit Official')
@section('page-title', 'Edit Official')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.progressive-union-officials.index') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i> Back to Officials
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.progressive-union-officials.update', $official) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', $official->name) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        Title/Position <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="title"
                           id="title"
                           value="{{ old('title', $official->title) }}"
                           placeholder="e.g. President, Vice President"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    @error('title')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Year From -->
                <div>
                    <label for="year_from" class="block text-sm font-medium text-gray-700 mb-2">
                        Year From <span class="text-red-500">*</span>
                    </label>
                    <input type="number"
                           name="year_from"
                           id="year_from"
                           value="{{ old('year_from', $official->year_from) }}"
                           min="1900"
                           max="{{ date('Y') + 10 }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    @error('year_from')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Year To -->
                <div>
                    <label for="year_to" class="block text-sm font-medium text-gray-700 mb-2">
                        Year To
                    </label>
                    <input type="number"
                           name="year_to"
                           id="year_to"
                           value="{{ old('year_to', $official->year_to) }}"
                           min="1900"
                           max="{{ date('Y') + 10 }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Leave blank if currently serving</p>
                    @error('year_to')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Display Order -->
                <div>
                    <label for="display_order" class="block text-sm font-medium text-gray-700 mb-2">
                        Display Order
                    </label>
                    <input type="number"
                           name="display_order"
                           id="display_order"
                           value="{{ old('display_order', $official->display_order) }}"
                           min="0"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                    @error('display_order')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="flex items-center">
                    <input type="checkbox"
                           name="is_active"
                           id="is_active"
                           value="1"
                           {{ old('is_active', $official->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                    <label for="is_active" class="ml-2 text-sm text-gray-700">
                        Active (Display on public page)
                    </label>
                </div>

                <!-- Image -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        Photo
                    </label>

                    @if($official->image)
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Current Photo:</p>
                            <img src="{{ asset('storage/' . $official->image) }}"
                                 alt="{{ $official->name }}"
                                 class="w-32 h-32 rounded-full object-cover border-2 border-gray-300">
                        </div>
                    @endif

                    <input type="file"
                           name="image"
                           id="image"
                           accept="image/*"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                           onchange="previewImage(event)">
                    <p class="mt-1 text-xs text-gray-500">JPG, PNG or WEBP. Max 2MB. Recommended: 400x400px</p>
                    @error('image')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror

                    <div id="imagePreview" class="mt-4 hidden">
                        <p class="text-xs text-gray-500 mb-2">New Photo Preview:</p>
                        <img src="" alt="Preview" class="w-32 h-32 rounded-full object-cover border-2 border-gray-300">
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t mt-6">
                <a href="{{ route('admin.progressive-union-officials.index') }}"
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
                    <i class="fas fa-save mr-2"></i> Update Official
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const preview = document.getElementById('imagePreview');
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
