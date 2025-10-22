<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Avatar Upload -->
        <div>
            <x-input-label for="avatar" :value="__('Profile Picture')" />

            @if($user->avatar)
                <div class="mt-2 mb-3">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Current avatar" class="w-24 h-24 rounded-full object-cover border-2 border-gray-300">
                </div>
            @endif

            <input type="file"
                   id="avatar"
                   name="avatar"
                   accept="image/*"
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                   onchange="previewAvatar(event)">
            <p class="mt-1 text-xs text-gray-500">JPG, PNG or WEBP. Max 2MB.</p>
            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />

            <!-- Preview -->
            <div id="avatarPreview" class="mt-3 hidden">
                <p class="text-xs text-gray-500 mb-2">Preview:</p>
                <img src="" alt="Preview" class="w-24 h-24 rounded-full object-cover border-2 border-gray-300">
            </div>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Hometown -->
        <div>
            <x-input-label for="hometown" :value="__('Hometown')" />
            <x-text-input id="hometown" name="hometown" type="text" class="mt-1 block w-full" :value="old('hometown', $user->hometown)" autocomplete="address-level2" />
            <x-input-error class="mt-2" :messages="$errors->get('hometown')" />
        </div>

        <!-- Occupation -->
        <div>
            <x-input-label for="occupation" :value="__('Occupation')" />
            <x-text-input id="occupation" name="occupation" type="text" class="mt-1 block w-full" :value="old('occupation', $user->occupation)" autocomplete="organization-title" />
            <x-input-error class="mt-2" :messages="$errors->get('occupation')" />
        </div>

        <!-- Bio -->
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio"
                      name="bio"
                      rows="4"
                      class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                      placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>
            <p class="mt-1 text-xs text-gray-500">A short description about yourself.</p>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <script>
    function previewAvatar(event) {
        const preview = document.getElementById('avatarPreview');
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
</section>
