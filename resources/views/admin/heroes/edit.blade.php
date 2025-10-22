@extends('admin.layouts.admin')

@section('title', 'Edit Hero')
@section('page-title', 'Edit Hero: ' . $hero->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.heroes.update', $hero) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Basic Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Basic Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="name" id="name" value="{{ old('name', $hero->name) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="Full name"
                               required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Title
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $hero->title) }}"
                               placeholder="e.g., Dr., Prof., Chief"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700 mb-2">
                            Position
                        </label>
                        <input type="text" name="position" id="position" value="{{ old('position', $hero->position) }}"
                               placeholder="e.g., CEO of Company X"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        @error('position')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <select name="category" id="category"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $hero->category) == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Image -->
                    @if($hero->image_url)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                            <img src="{{ asset('storage/' . $hero->image_url) }}"
                                 alt="{{ $hero->name }}"
                                 class="w-32 h-32 object-cover rounded-lg">
                        </div>
                    @endif

                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label for="image_url" class="block text-sm font-medium text-gray-700 mb-2">
                            Change Profile Image
                        </label>
                        <input type="file" name="image_url" id="image_url" accept="image/*"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               onchange="previewImage(event)">
                        <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image. Recommended: Square image, at least 500x500px, max 5MB (JPEG, JPG, PNG, WEBP)</p>
                        @error('image_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <div id="imagePreview" class="mt-4 hidden">
                            <img src="" alt="Preview" class="w-32 h-32 object-cover rounded-lg">
                        </div>
                    </div>

                    <!-- Short Description -->
                    <div class="md:col-span-2">
                        <label for="short_description" class="block text-sm font-medium text-gray-700 mb-2">
                            Short Description
                        </label>
                        <textarea name="short_description" id="short_description" rows="3"
                                  maxlength="500"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                  placeholder="Brief introduction (max 500 characters)">{{ old('short_description', $hero->short_description) }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Brief introduction displayed in listings (max 500 characters)</p>
                        @error('short_description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Biography -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Biography</h3>
                <div>
                    <label for="biography" class="block text-sm font-medium text-gray-700 mb-2">
                        Full Biography <span class="text-red-500">*</span>
                    </label>
                    <textarea name="biography" id="biography" rows="10"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent tinymce"
                              required>{{ old('biography', $hero->biography) }}</textarea>
                    @error('biography')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Achievements -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Achievements</h3>
                <div id="achievements-container">
                    @php
                        $achievements = old('achievements', $hero->achievements ?? []);
                    @endphp
                    @if(!empty($achievements) && is_array($achievements))
                        @foreach($achievements as $achievement)
                            <div class="achievement-item mb-3 flex gap-2">
                                <input type="text" name="achievements[]" value="{{ $achievement }}"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                       placeholder="Achievement description">
                                <button type="button" onclick="removeField(this)"
                                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="achievement-item mb-3 flex gap-2">
                            <input type="text" name="achievements[]"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   placeholder="Achievement description">
                            <button type="button" onclick="removeField(this)"
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <button type="button" onclick="addAchievement()"
                        class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    <i class="fas fa-plus mr-2"></i> Add Achievement
                </button>
            </div>

            <!-- Awards -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Awards & Recognition</h3>
                <div id="awards-container">
                    @php
                        $awards = old('awards', $hero->awards ?? []);
                    @endphp
                    @if(!empty($awards) && is_array($awards))
                        @foreach($awards as $award)
                            <div class="award-item mb-3 flex gap-2">
                                <input type="text" name="awards[]" value="{{ $award }}"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                       placeholder="Award or recognition">
                                <button type="button" onclick="removeField(this)"
                                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="award-item mb-3 flex gap-2">
                            <input type="text" name="awards[]"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   placeholder="Award or recognition">
                            <button type="button" onclick="removeField(this)"
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <button type="button" onclick="addAward()"
                        class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    <i class="fas fa-plus mr-2"></i> Add Award
                </button>
            </div>

            <!-- Tags -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Tags</h3>
                <div id="tags-container">
                    @php
                        $tags = old('tags', $hero->tags ?? []);
                    @endphp
                    @if(!empty($tags) && is_array($tags))
                        @foreach($tags as $tag)
                            <div class="tag-item mb-3 flex gap-2">
                                <input type="text" name="tags[]" value="{{ $tag }}"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                       placeholder="Tag keyword">
                                <button type="button" onclick="removeField(this)"
                                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="tag-item mb-3 flex gap-2">
                            <input type="text" name="tags[]"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                   placeholder="Tag keyword">
                            <button type="button" onclick="removeField(this)"
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <button type="button" onclick="addTag()"
                        class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    <i class="fas fa-plus mr-2"></i> Add Tag
                </button>
            </div>

            <!-- Contact & Social Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Contact & Social Links</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input type="email" name="email" id="email" value="{{ old('email', $hero->email) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="email@example.com">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Phone
                        </label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $hero->phone) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="+234 xxx xxx xxxx">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- LinkedIn -->
                    <div>
                        <label for="linkedin_url" class="block text-sm font-medium text-gray-700 mb-2">
                            LinkedIn URL
                        </label>
                        <input type="url" name="linkedin_url" id="linkedin_url" value="{{ old('linkedin_url', $hero->linkedin_url) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="https://linkedin.com/in/username">
                        @error('linkedin_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Twitter -->
                    <div>
                        <label for="twitter_url" class="block text-sm font-medium text-gray-700 mb-2">
                            Twitter/X URL
                        </label>
                        <input type="url" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $hero->twitter_url) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="https://twitter.com/username">
                        @error('twitter_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Facebook -->
                    <div class="md:col-span-2">
                        <label for="facebook_url" class="block text-sm font-medium text-gray-700 mb-2">
                            Facebook URL
                        </label>
                        <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $hero->facebook_url) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                               placeholder="https://facebook.com/username">
                        @error('facebook_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Display Settings -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Display Settings</h3>

                <div class="space-y-4">
                    <!-- Display Order -->
                    <div>
                        <label for="display_order" class="block text-sm font-medium text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $hero->display_order ?? 0) }}"
                               min="0"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Lower numbers appear first. Use 0 for default ordering.</p>
                        @error('display_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Is Featured -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                               {{ old('is_featured', $hero->is_featured) ? 'checked' : '' }}
                               class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                            Featured Hero (Highlighted on homepage)
                        </label>
                    </div>

                    <!-- Is Published -->
                    <div class="flex items-center">
                        <input type="checkbox" name="is_published" id="is_published" value="1"
                               {{ old('is_published', $hero->is_published) ? 'checked' : '' }}
                               class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                        <label for="is_published" class="ml-2 block text-sm text-gray-900">
                            Published (Make visible on the website)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Hero Stats -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Hero Information</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500">Slug</p>
                        <p class="text-sm font-medium text-gray-900">{{ $hero->slug }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500">Created</p>
                        <p class="text-sm font-medium text-gray-900">{{ $hero->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500">Last Updated</p>
                        <p class="text-sm font-medium text-gray-900">{{ $hero->updated_at->format('M d, Y') }}</p>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <p class="text-xs text-gray-500">Status</p>
                        <p class="text-sm font-medium text-gray-900">
                            {{ $hero->is_published ? 'Published' : 'Draft' }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-between pt-6 border-t">
                <button type="button" onclick="document.getElementById('deleteForm').submit();"
                        class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    <i class="fas fa-trash mr-2"></i> Delete Hero
                </button>

                <div class="flex space-x-4">
                    <a href="{{ route('admin.heroes.index') }}"
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </a>
                    <a href="{{ route('heroes.show', $hero->slug) }}"
                       target="_blank"
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-eye mr-2"></i> Preview
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                        <i class="fas fa-save mr-2"></i> Update Hero
                    </button>
                </div>
            </div>
        </form>

        <!-- Delete form (separate from update form to avoid nesting) -->
        <form id="deleteForm" action="{{ route('admin.heroes.destroy', $hero) }}" method="POST" class="hidden"
              onsubmit="return confirm('Are you sure you want to delete this hero? This action cannot be undone.');">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize TinyMCE v8
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
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
        uploadcare_public_key: '682d4029dd931b43b477',
        content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; font-size: 14px; }'
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

    // Add achievement field
    function addAchievement() {
        const container = document.getElementById('achievements-container');
        const div = document.createElement('div');
        div.className = 'achievement-item mb-3 flex gap-2';
        div.innerHTML = `
            <input type="text" name="achievements[]"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                   placeholder="Achievement description">
            <button type="button" onclick="removeField(this)"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    }

    // Add award field
    function addAward() {
        const container = document.getElementById('awards-container');
        const div = document.createElement('div');
        div.className = 'award-item mb-3 flex gap-2';
        div.innerHTML = `
            <input type="text" name="awards[]"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                   placeholder="Award or recognition">
            <button type="button" onclick="removeField(this)"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    }

    // Add tag field
    function addTag() {
        const container = document.getElementById('tags-container');
        const div = document.createElement('div');
        div.className = 'tag-item mb-3 flex gap-2';
        div.innerHTML = `
            <input type="text" name="tags[]"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                   placeholder="Tag keyword">
            <button type="button" onclick="removeField(this)"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    }

    // Remove field
    function removeField(button) {
        button.parentElement.remove();
    }
</script>
@endpush
