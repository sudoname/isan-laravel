@extends('admin.layouts.admin')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.users.index') }}" class="text-blue-600 hover:text-blue-800">
            <i class="fas fa-arrow-left mr-2"></i> Back to Users
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PATCH')

            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="name"
                           id="name"
                           value="{{ old('name', $user->name) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email"
                           name="email"
                           id="email"
                           value="{{ old('email', $user->email) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        New Password
                    </label>
                    <input type="password"
                           name="password"
                           id="password"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror">
                    <p class="mt-1 text-xs text-gray-500">Leave blank to keep current password</p>
                    @error('password')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        Confirm New Password
                    </label>
                    <input type="password"
                           name="password_confirmation"
                           id="password_confirmation"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Role Selection -->
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
                        User Role <span class="text-red-500">*</span>
                    </label>
                    <select name="role"
                            id="role"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('role') border-red-500 @enderror"
                            onchange="togglePermissions()">
                        <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>
                            <i class="fas fa-user"></i> User (Regular User)
                        </option>
                        <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>
                            <i class="fas fa-shield-alt"></i> Admin (Limited CMS Access)
                        </option>
                        @if(auth()->user()->isSuperAdmin())
                            <option value="superadmin" {{ old('role', $user->role) === 'superadmin' ? 'selected' : '' }}>
                                <i class="fas fa-crown"></i> SuperAdmin (Full Access)
                            </option>
                        @endif
                    </select>
                    @error('role')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">
                        SuperAdmins have full access. Admins only see selected menus below.
                    </p>
                </div>

                <!-- Admin Permissions (Only shown for Admin role) -->
                <div id="permissions-section" class="border rounded-lg p-4 bg-gray-50" style="display: {{ old('role', $user->role) === 'admin' ? 'block' : 'none' }};">
                    <h3 class="text-sm font-medium text-gray-700 mb-3">
                        <i class="fas fa-lock mr-2"></i> Admin Menu Permissions
                    </h3>
                    <p class="text-xs text-gray-500 mb-4">Select which CMS menu items this admin can access:</p>

                    @php
                        $permissions = [
                            'dashboard' => 'Dashboard',
                            'onisans' => 'Onisan of the Day',
                            'news' => 'News & Announcements',
                            'heroes' => 'Distinguished Indigenes',
                            'hero-nominations' => 'Hero Nominations',
                            'pages' => 'Pages',
                            'attractions' => 'Tourist Attractions',
                            'isan-day-celebrations' => 'Isan Day Celebrations',
                            'isan-day-page-settings' => 'Isan Day Page Settings',
                            'progressive-union-officials' => 'Progressive Union Officials',
                            'natural-resources' => 'Natural Resources',
                            'whatsapp-groups' => 'WhatsApp Groups',
                            'settings' => 'Site Settings',
                            'media' => 'Media Library',
                            'users' => 'User Management',
                            'registrations' => 'Indigene Registrations',
                        ];
                        $userPermissions = old('admin_permissions', $user->admin_permissions ?? []);
                    @endphp

                    <div class="grid grid-cols-2 gap-3">
                        @foreach($permissions as $key => $label)
                            <div class="flex items-center">
                                <input type="checkbox"
                                       name="admin_permissions[]"
                                       id="permission_{{ $key }}"
                                       value="{{ $key }}"
                                       {{ in_array($key, $userPermissions) ? 'checked' : '' }}
                                       class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                <label for="permission_{{ $key }}" class="ml-2 text-sm text-gray-700">
                                    {{ $label }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Email Verification -->
                <div class="flex items-center">
                    <input type="checkbox"
                           name="is_email_verified"
                           id="is_email_verified"
                           value="1"
                           {{ old('is_email_verified', $user->is_email_verified) ? 'checked' : '' }}
                           class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <label for="is_email_verified" class="ml-2 text-sm text-gray-700">
                        <i class="fas fa-check-circle mr-1"></i> Email Verified
                    </label>
                </div>

                <script>
                function togglePermissions() {
                    const roleSelect = document.getElementById('role');
                    const permissionsSection = document.getElementById('permissions-section');

                    if (roleSelect.value === 'admin') {
                        permissionsSection.style.display = 'block';
                    } else {
                        permissionsSection.style.display = 'none';
                    }
                }
                </script>

                <!-- User Info -->
                <div class="border-t pt-4">
                    <h3 class="text-sm font-medium text-gray-700 mb-3">User Information</h3>
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-500">User ID:</span>
                            <span class="font-medium ml-2">{{ $user->id }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Joined:</span>
                            <span class="font-medium ml-2">{{ $user->created_at->format('M d, Y') }}</span>
                        </div>
                        <div>
                            <span class="text-gray-500">Last Updated:</span>
                            <span class="font-medium ml-2">{{ $user->updated_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-6 border-t">
                    <a href="{{ route('admin.users.index') }}"
                       class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                        <i class="fas fa-save mr-2"></i> Update User
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
