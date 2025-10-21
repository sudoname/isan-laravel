# Admin View Templates

This document contains templates for creating all admin views. Copy and adapt these templates for each content type.

## Heroes Index Template
Location: `resources/views/admin/heroes/index.blade.php`

```blade
@extends('admin.layouts.admin')

@section('title', 'Heroes')
@section('page-title', 'Heroes Management')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-bold">Heroes</h1>
        <p class="text-gray-600">Manage notable indigenes of Isan Ekiti</p>
    </div>
    <a href="{{ route('admin.heroes.create') }}" class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-2 rounded-lg">
        <i class="fas fa-plus mr-2"></i> Add Hero
    </a>
</div>

<!-- Search & Filters -->
<div class="bg-white rounded-lg shadow p-6 mb-6">
    <form method="GET" action="{{ route('admin.heroes.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search heroes..." class="w-full border-gray-300 rounded-lg">
        </div>
        <div>
            <select name="category" class="w-full border-gray-300 rounded-lg">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <select name="status" class="w-full border-gray-300 rounded-lg">
                <option value="">All Status</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex-1">
                <i class="fas fa-search mr-2"></i> Filter
            </button>
            <a href="{{ route('admin.heroes.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                <i class="fas fa-times"></i>
            </a>
        </div>
    </form>
</div>

<!-- Heroes Table -->
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hero</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Category</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Order</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($heroes as $hero)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                        @if($hero->image_url)
                            <img src="{{ asset('storage/' . $hero->image_url) }}" class="h-10 w-10 rounded-full object-cover" alt="{{ $hero->name }}">
                        @else
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                        @endif
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{ $hero->name }}</div>
                            <div class="text-sm text-gray-500">{{ $hero->title }}</div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{ $hero->category_color }}-100 text-{{ $hero->category_color }}-800">
                        {{ $hero->category }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex gap-1">
                        @if($hero->is_featured)
                            <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded">Featured</span>
                        @endif
                        @if($hero->is_published)
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-800 rounded">Published</span>
                        @else
                            <span class="px-2 py-1 text-xs bg-gray-100 text-gray-800 rounded">Draft</span>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    {{ $hero->display_order ?? 0 }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('admin.heroes.edit', $hero) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.heroes.destroy', $hero) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                    No heroes found. <a href="{{ route('admin.heroes.create') }}" class="text-blue-600 hover:underline">Create one now</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t">
        {{ $heroes->links() }}
    </div>
</div>
@endsection
```

## Heroes Create Template
Location: `resources/views/admin/heroes/create.blade.php`

```blade
@extends('admin.layouts.admin')

@section('title', 'Create Hero')
@section('page-title', 'Create New Hero')

@section('content')
<div class="max-w-4xl mx-auto">
    <form action="{{ route('admin.heroes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="bg-white rounded-lg shadow p-6 space-y-6">
            <!-- Basic Information -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Basic Information</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full border-gray-300 rounded-lg @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" placeholder="e.g., Professor, Dr." class="w-full border-gray-300 rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                        <input type="text" name="position" value="{{ old('position') }}" placeholder="e.g., CEO, Director" class="w-full border-gray-300 rounded-lg">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                        <select name="category" required class="w-full border-gray-300 rounded-lg">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Portrait Image</label>
                <input type="file" name="image_url" accept="image/*" class="w-full border-gray-300 rounded-lg">
                <p class="text-sm text-gray-500 mt-1">Max 5MB. Supported: JPG, PNG, WebP</p>
            </div>

            <!-- Short Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Short Description</label>
                <textarea name="short_description" rows="3" class="w-full border-gray-300 rounded-lg" maxlength="500">{{ old('short_description') }}</textarea>
                <p class="text-sm text-gray-500 mt-1">Maximum 500 characters</p>
            </div>

            <!-- Biography -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Biography *</label>
                <textarea name="biography" id="biography" rows="10" class="w-full border-gray-300 rounded-lg" required>{{ old('biography') }}</textarea>
            </div>

            <!-- Contact Information -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact Information (Optional)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">LinkedIn URL</label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url') }}" class="w-full border-gray-300 rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Twitter URL</label>
                        <input type="url" name="twitter_url" value="{{ old('twitter_url') }}" class="w-full border-gray-300 rounded-lg">
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Settings</h3>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded border-gray-300">
                        <span class="ml-2 text-sm text-gray-700">Feature this hero</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded border-gray-300">
                        <span class="ml-2 text-sm text-gray-700">Publish immediately</span>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                <input type="number" name="display_order" value="{{ old('display_order', 0) }}" min="0" class="w-full border-gray-300 rounded-lg">
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-4 pt-6 border-t">
                <a href="{{ route('admin.heroes.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                    <i class="fas fa-save mr-2"></i> Create Hero
                </button>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
    tinymce.init({
        selector: '#biography',
        height: 400,
        menubar: false,
        plugins: 'lists link image code',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code'
    });
</script>
@endpush
@endsection
```

## Adapt This Template For:

### Pages (`resources/views/admin/pages/`)
- Change `heroes` to `pages`
- Change category field to meta description
- Adjust validation messages
- Use cyan color scheme

### Attractions (`resources/views/admin/attractions/`)
- Change `heroes` to `attractions`
- Add location field
- Add description and full_description
- Use indigo color scheme

### Users (`resources/views/admin/users/`)
- Simpler form (name, email, password, roles)
- No image upload needed
- Add is_admin toggle
- Use orange color scheme

### Registrations (`resources/views/admin/registrations/`)
- Index only (no create/edit)
- Show view with all registration details
- Status filter dropdown
- Use pink color scheme

Remember to:
1. Update route names
2. Update model variable names
3. Adjust form fields as needed
4. Match color schemes to dashboard
5. Include appropriate icons
