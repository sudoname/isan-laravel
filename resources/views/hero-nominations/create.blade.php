@extends('layouts.public')

@section('title', 'Nominate a Hero')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-80 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1531384441138-2736e62e0919?w=1920&h=600&fit=crop"
                 alt="Nominate a Hero"
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/95 to-blue-700/90"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-5xl md:text-6xl font-bold mb-4">Nominate a Hero</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto">
                Know someone who deserves recognition? Nominate them today!
            </p>
        </div>
    </section>

    <!-- Form Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <strong>Please fix the following errors:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-lg p-8">
                <form action="{{ route('hero-nominations.store') }}" method="POST">
                    @csrf

                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Nominee Information</h2>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nominee's Full Name *</label>
                            <input type="text" name="nominee_name" value="{{ old('nominee_name') }}" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title (e.g., Prof., Dr., Chief)</label>
                            <input type="text" name="nominee_title" value="{{ old('nominee_title') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select name="category" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                                        {{ $category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Why should they be recognized? * (min 50 characters)</label>
                            <textarea name="reason" rows="5" required
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('reason') }}</textarea>
                            <p class="text-sm text-gray-500 mt-1">Tell us why this person deserves to be recognized as a hero of Isan Ekiti</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Key Achievements (Optional)</label>
                            <textarea name="achievements" rows="4"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ old('achievements') }}</textarea>
                        </div>
                    </div>

                    <h2 class="text-2xl font-bold text-gray-900 mt-10 mb-6">Your Information</h2>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Your Full Name *</label>
                            <input type="text" name="nominator_name" value="{{ old('nominator_name') }}" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Your Email *</label>
                            <input type="email" name="nominator_email" value="{{ old('nominator_email') }}" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Your Phone (Optional)</label>
                            <input type="text" name="nominator_phone" value="{{ old('nominator_phone') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="mt-8 flex gap-4">
                        <button type="submit"
                                class="flex-1 bg-blue-600 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-700 transition">
                            Submit Nomination
                        </button>
                        <a href="{{ route('heroes') }}"
                           class="px-8 py-4 border border-gray-300 rounded-lg hover:bg-gray-50 transition flex items-center justify-center">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
