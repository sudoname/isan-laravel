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

                <!-- Checkboxes -->
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox"
                               name="is_admin"
                               id="is_admin"
                               value="1"
                               {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                               class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="is_admin" class="ml-2 text-sm text-gray-700">
                            <i class="fas fa-shield-alt mr-1"></i> Administrator
                        </label>
                    </div>

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
                </div>

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
