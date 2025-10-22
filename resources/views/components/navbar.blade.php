<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-green-600">Isan Ekiti</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('home') ? 'text-green-600' : '' }}">
                    Home
                </a>

                <!-- About Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium flex items-center">
                        About Isan
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition
                         class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5">
                        <a href="{{ route('history') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600">Our History</a>
                        <a href="{{ route('heroes') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600">Our Heroes</a>
                        <a href="{{ route('onisan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600">Onisan</a>
                        <a href="{{ route('progressive-union') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600">Isan Progressive Union</a>
                        <a href="{{ route('natural-resources') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600">Natural Resources</a>
                    </div>
                </div>

                <a href="{{ route('attractions') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('attractions') ? 'text-green-600' : '' }}">
                    Attractions
                </a>
                <a href="{{ route('registration') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('registration') ? 'text-green-600' : '' }}">
                    Registration Portal
                </a>
                <a href="{{ route('isan-day') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('isan-day') ? 'text-green-600' : '' }}">
                    Isan Day Celebration
                </a>
                <a href="{{ route('news.index') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium {{ request()->routeIs('news.*') ? 'text-green-600' : '' }}">
                    News
                </a>

                <!-- Contact Us Dropdown -->
                <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium flex items-center {{ request()->routeIs('contact') || request()->routeIs('forum.*') ? 'text-green-600' : '' }}">
                        Contact Us
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition
                         class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5">
                        <a href="{{ route('contact') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600">Contact</a>
                        <a href="{{ route('forum.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600">Forum</a>
                    </div>
                </div>

                @auth
                    @if(Auth::user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">
                            Admin
                        </a>
                    @else
                        <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">
                            Profile
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-green-600 px-3 py-2 text-sm font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-green-600 text-white hover:bg-green-700 px-4 py-2 text-sm font-medium rounded-md">
                        Register
                    </a>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-green-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" x-transition class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t">
            <a href="{{ route('home') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Home</a>
            <a href="{{ route('history') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Our History</a>
            <a href="{{ route('heroes') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Our Heroes</a>
            <a href="{{ route('onisan') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Onisan</a>
            <a href="{{ route('progressive-union') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Isan Progressive Union</a>
            <a href="{{ route('natural-resources') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Natural Resources</a>
            <a href="{{ route('attractions') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Attractions</a>
            <a href="{{ route('registration') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Registration Portal</a>
            <a href="{{ route('isan-day') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Isan Day Celebration</a>
            <a href="{{ route('news.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">News</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Contact</a>
            <a href="{{ route('forum.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Forum</a>
            @auth
                @if(Auth::user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Admin</a>
                @else
                    <a href="{{ route('profile.edit') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Profile</a>
                @endif
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-green-600 hover:bg-green-50 rounded-md">Login</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium text-white bg-green-600 hover:bg-green-700 rounded-md">Register</a>
            @endauth
        </div>
    </div>
</nav>
