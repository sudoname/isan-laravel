@extends('admin.layouts.admin')

@section('title', 'Edit Onisan')
@section('page-title', 'Edit Onisan: ' . $onisan->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.onisans.update', $onisan) }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" name="name" id="name" value="{{ old('name', $onisan->name) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="title" id="title" value="{{ old('title', $onisan->title) }}"
                               placeholder="e.g., Oba of Lagos"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Full Title -->
                    <div class="md:col-span-2">
                        <label for="full_title" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Title
                        </label>
                        <input type="text" name="full_title" id="full_title" value="{{ old('full_title', $onisan->full_title) }}"
                               placeholder="Complete traditional title"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('full_title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Image -->
                    @if($onisan->image_url)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                            <img src="{{ asset($onisan->image_url) }}"
                                 alt="{{ $onisan->name }}"
                                 class="w-32 h-32 object-cover rounded-lg">
                        </div>
                    @endif

                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                            Change Profile Image
                        </label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               onchange="previewImage(event)">
                        <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image. Recommended: Square image, at least 500x500px, max 2MB</p>
                        @error('image')
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
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('short_description', $onisan->short_description) }}</textarea>
                        <p class="mt-1 text-xs text-gray-500">Brief introduction displayed in listings</p>
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
                        Full Biography
                    </label>
                    <textarea name="biography" id="biography" rows="10"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent tinymce">{{ old('biography', $onisan->biography) }}</textarea>
                    @error('biography')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Reign Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Reign Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Reign Start -->
                    <div>
                        <label for="reign_start" class="block text-sm font-medium text-gray-700 mb-2">
                            Reign Start Date
                        </label>
                        <input type="date" name="reign_start" id="reign_start" value="{{ old('reign_start', $onisan->reign_start?->format('Y-m-d')) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('reign_start')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Reign End -->
                    <div>
                        <label for="reign_end" class="block text-sm font-medium text-gray-700 mb-2">
                            Reign End Date
                        </label>
                        <input type="date" name="reign_end" id="reign_end" value="{{ old('reign_end', $onisan->reign_end?->format('Y-m-d')) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Leave empty if currently reigning</p>
                        @error('reign_end')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Display Order -->
                    <div>
                        <label for="display_order" class="block text-sm font-medium text-gray-700 mb-2">
                            Display Order
                        </label>
                        <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $onisan->display_order ?? 0) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('display_order')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Contact Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label for="palace_address" class="block text-sm font-medium text-gray-700 mb-2">
                            Palace Address
                        </label>
                        <textarea name="palace_address" id="palace_address" rows="3"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('palace_address', $onisan->palace_address) }}</textarea>
                        @error('palace_address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700 mb-2">
                            Contact Email
                        </label>
                        <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $onisan->contact_email) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('contact_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Contact Phone
                        </label>
                        <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $onisan->contact_phone) }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('contact_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Achievements -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Achievements</h3>
                <div id="achievements-container">
                    @php
                        $achievements = old('achievements', $onisan->achievements ?? []);
                    @endphp
                    @if(!empty($achievements) && is_array($achievements))
                        @foreach($achievements as $achievement)
                            <div class="achievement-item mb-3 flex gap-2">
                                <input type="text" name="achievements[]" value="{{ $achievement }}"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
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
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
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

            <!-- Development Projects -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Development Projects</h3>
                <div id="projects-container">
                    @php
                        $projects = old('development_projects', $onisan->development_projects ?? []);
                    @endphp
                    @if(!empty($projects) && is_array($projects))
                        @foreach($projects as $project)
                            <div class="project-item mb-3 flex gap-2">
                                <input type="text" name="development_projects[]" value="{{ $project }}"
                                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                       placeholder="Project description">
                                <button type="button" onclick="removeField(this)"
                                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    @else
                        <div class="project-item mb-3 flex gap-2">
                            <input type="text" name="development_projects[]"
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                   placeholder="Project description">
                            <button type="button" onclick="removeField(this)"
                                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    @endif
                </div>
                <button type="button" onclick="addProject()"
                        class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">
                    <i class="fas fa-plus mr-2"></i> Add Project
                </button>
            </div>

            <!-- Status -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold mb-4 border-b pb-2">Status</h3>

                <div class="space-y-4">
                    <!-- Is Current -->
                    <div class="flex items-center">
                        <input type="hidden" name="is_current" value="0">
                        <input type="checkbox" name="is_current" id="is_current" value="1"
                               {{ old('is_current', $onisan->is_current) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_current" class="ml-2 block text-sm text-gray-900">
                            Current Onisan (Only one can be marked as current)
                        </label>
                    </div>

                    <!-- Is Published -->
                    <div class="flex items-center">
                        <input type="hidden" name="is_published" value="0">
                        <input type="checkbox" name="is_published" id="is_published" value="1"
                               {{ old('is_published', $onisan->is_published) ? 'checked' : '' }}
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_published" class="ml-2 block text-sm text-gray-900">
                            Published (Make visible on the website)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex justify-between pt-6 border-t">
                <button type="button" onclick="document.getElementById('deleteForm').submit();"
                        class="px-6 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                    <i class="fas fa-trash mr-2"></i> Delete Onisan
                </button>

                <div class="flex space-x-4">
                    <a href="{{ route('admin.onisans.index') }}"
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                        <i class="fas fa-save mr-2"></i> Update Onisan
                    </button>
                </div>
            </div>
        </form>

        <!-- Delete form (separate from update form to avoid nesting) -->
        <form id="deleteForm" action="{{ route('admin.onisans.destroy', $onisan) }}" method="POST" class="hidden"
              onsubmit="return confirm('Are you sure you want to delete this Onisan? This action cannot be undone.');">
            @csrf
            @method('DELETE')
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Initialize TinyMCE
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
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   placeholder="Achievement description">
            <button type="button" onclick="removeField(this)"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                <i class="fas fa-times"></i>
            </button>
        `;
        container.appendChild(div);
    }

    // Add project field
    function addProject() {
        const container = document.getElementById('projects-container');
        const div = document.createElement('div');
        div.className = 'project-item mb-3 flex gap-2';
        div.innerHTML = `
            <input type="text" name="development_projects[]"
                   class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                   placeholder="Project description">
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
