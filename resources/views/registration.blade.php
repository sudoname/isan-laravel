@extends('layouts.public')

@section('title', 'Register as Indigene - Isan Ekiti')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1920&h=600&fit=crop"
                 alt="Registration"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/95 to-green-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Register as Indigene</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto animate-fade-in-up">
                Join our global community and stay connected with your roots
            </p>
        </div>
    </section>

    <!-- Registration Form Section -->
    <section class="py-20 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-8 bg-green-50 border-l-4 border-green-500 p-6 rounded-xl animate-fade-in">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-green-800">Success!</h3>
                            <p class="text-green-700 mt-1">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Introduction -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Registration Form</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Fill out the form below to register as an indigene of Isan Ekiti. All fields marked with an asterisk (*) are required.
                </p>
            </div>

            <!-- Registration Form -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12">
                <form action="{{ route('registration.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Personal Information Section -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 pb-3 border-b-2 border-green-500">
                            Personal Information
                        </h3>

                        <div class="space-y-6">
                            <!-- Name Fields -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        First Name *
                                    </label>
                                    <input type="text"
                                           id="first_name"
                                           name="first_name"
                                           value="{{ old('first_name') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('first_name') border-red-500 @enderror"
                                           placeholder="Enter your first name">
                                    @error('first_name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Last Name *
                                    </label>
                                    <input type="text"
                                           id="last_name"
                                           name="last_name"
                                           value="{{ old('last_name') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('last_name') border-red-500 @enderror"
                                           placeholder="Enter your last name">
                                    @error('last_name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email and Phone -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Email Address *
                                    </label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                                           placeholder="your.email@example.com">
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Phone Number *
                                    </label>
                                    <input type="tel"
                                           id="phone"
                                           name="phone"
                                           value="{{ old('phone') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('phone') border-red-500 @enderror"
                                           placeholder="+234 801 234 5678">
                                    @error('phone')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Date of Birth and Gender -->
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="date_of_birth" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Date of Birth *
                                    </label>
                                    <input type="date"
                                           id="date_of_birth"
                                           name="date_of_birth"
                                           value="{{ old('date_of_birth') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('date_of_birth') border-red-500 @enderror">
                                    @error('date_of_birth')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="gender" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Gender *
                                    </label>
                                    <select id="gender"
                                            name="gender"
                                            required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('gender') border-red-500 @enderror">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Information Section -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 pb-3 border-b-2 border-green-500">
                            Address Information
                        </h3>

                        <div class="space-y-6">
                            <!-- Current Address -->
                            <div>
                                <label for="current_address" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Current Address *
                                </label>
                                <textarea id="current_address"
                                          name="current_address"
                                          rows="3"
                                          required
                                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all resize-none @error('current_address') border-red-500 @enderror"
                                          placeholder="Enter your complete current address">{{ old('current_address') }}</textarea>
                                @error('current_address')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Hometown -->
                            <div>
                                <label for="hometown" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Hometown/Village in Isan Ekiti
                                </label>
                                <input type="text"
                                       id="hometown"
                                       name="hometown"
                                       value="{{ old('hometown') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('hometown') border-red-500 @enderror"
                                       placeholder="e.g., Oke-Isan, Isaba, etc.">
                                @error('hometown')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-2 text-sm text-gray-500">
                                    If you know your specific hometown or village within Isan Ekiti, please specify.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information Section -->
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-6 pb-3 border-b-2 border-green-500">
                            Professional Information
                        </h3>

                        <div class="space-y-6">
                            <!-- Occupation -->
                            <div>
                                <label for="occupation" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Occupation/Profession
                                </label>
                                <input type="text"
                                       id="occupation"
                                       name="occupation"
                                       value="{{ old('occupation') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all @error('occupation') border-red-500 @enderror"
                                       placeholder="e.g., Teacher, Engineer, Business Owner">
                                @error('occupation')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Agreement Section -->
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5 mt-1">
                                <input id="agree"
                                       name="agree"
                                       type="checkbox"
                                       required
                                       class="w-5 h-5 border-gray-300 rounded text-green-600 focus:ring-green-500">
                            </div>
                            <div class="ml-3">
                                <label for="agree" class="text-sm text-gray-700">
                                    I confirm that the information provided above is accurate and true. I understand that
                                    this registration will be reviewed by the Isan Ekiti community administrators. *
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit"
                                class="flex-1 bg-gradient-to-r from-green-600 to-green-700 text-white px-8 py-4 rounded-xl font-bold text-lg hover:from-green-700 hover:to-green-800 hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                            <span>Submit Registration</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                        <button type="reset"
                                class="px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-colors">
                            Reset Form
                        </button>
                    </div>

                    <p class="text-sm text-gray-500 text-center">
                        Your information will be kept confidential and used only for community purposes.
                    </p>
                </form>
            </div>

            <!-- Additional Information -->
            <div class="mt-12 bg-green-50 rounded-2xl p-8">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Why Register?</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="font-semibold text-gray-900 mb-1">Stay Connected</h4>
                            <p class="text-gray-600">Receive updates about community events, news, and developments</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="font-semibold text-gray-900 mb-1">Network with Indigenes</h4>
                            <p class="text-gray-600">Connect with fellow indigenes worldwide through our platform</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="font-semibold text-gray-900 mb-1">Isan Day Invitations</h4>
                            <p class="text-gray-600">Priority access to Isan Day celebrations and special events</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-green-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h4 class="font-semibold text-gray-900 mb-1">Community Support</h4>
                            <p class="text-gray-600">Access to community resources and support programs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
