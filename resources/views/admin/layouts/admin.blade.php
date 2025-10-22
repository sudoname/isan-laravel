<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - Isanekiti CMS</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/r7btf5o54ds930swdtut57iaxx4wii6qyez7mdgt3jcrhm92/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white flex-shrink-0">
            <div class="p-6">
                <h1 class="text-2xl font-bold">Isanekiti CMS</h1>
                <p class="text-sm text-gray-400">Admin Panel</p>
            </div>

            <nav class="mt-6 overflow-y-auto h-[calc(100vh-120px)]">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Content Management Section -->
                <div class="px-6 pt-6 pb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Content Management</p>
                </div>

                <a href="{{ route('admin.onisans.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.onisans.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-crown mr-3"></i>
                    <span>Onisans</span>
                </a>

                <a href="{{ route('admin.news.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.news.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-newspaper mr-3"></i>
                    <span>News & Blog</span>
                </a>

                <a href="{{ route('admin.heroes.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.heroes.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-star mr-3"></i>
                    <span>Heroes</span>
                </a>

                <a href="{{ route('admin.pages.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.pages.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-file-alt mr-3"></i>
                    <span>Pages</span>
                </a>

                <a href="{{ route('admin.attractions.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.attractions.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-map-marked-alt mr-3"></i>
                    <span>Attractions</span>
                </a>

                <a href="{{ route('admin.isan-day-celebrations.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.isan-day-celebrations.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-calendar-day mr-3"></i>
                    <span>Isan Day Celebrations</span>
                </a>

                <a href="{{ route('admin.isan-day-page-settings.edit') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.isan-day-page-settings.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-images mr-3"></i>
                    <span>Isan Day Page Images</span>
                </a>

                <a href="{{ route('admin.whatsapp-groups.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.whatsapp-groups.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fab fa-whatsapp mr-3"></i>
                    <span>WhatsApp Groups</span>
                </a>

                <!-- Site Settings Section -->
                <div class="px-6 pt-6 pb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Site Settings</p>
                </div>

                <a href="{{ route('admin.settings.edit') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.settings.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-cog mr-3"></i>
                    <span>General Settings</span>
                </a>

                <a href="{{ route('admin.media.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.media.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-images mr-3"></i>
                    <span>Media Library</span>
                </a>

                <!-- Users Section -->
                <div class="px-6 pt-6 pb-2">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Users</p>
                </div>

                <a href="{{ route('admin.users.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.users.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-users mr-3"></i>
                    <span>All Users</span>
                </a>

                <a href="{{ route('admin.registrations.index') }}" class="flex items-center px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.registrations.*') ? 'bg-gray-700 border-l-4 border-blue-500' : '' }}">
                    <i class="fas fa-user-check mr-3"></i>
                    <span>Registrations</span>
                </a>

                <div class="border-t border-gray-700 my-4"></div>

                <!-- My Account Section -->
                <a href="{{ route('profile.edit') }}" class="flex items-center px-6 py-3 hover:bg-gray-700">
                    <i class="fas fa-user-circle mr-3"></i>
                    <span>My Profile</span>
                </a>

                <a href="{{ route('home') }}" class="flex items-center px-6 py-3 hover:bg-gray-700" target="_blank">
                    <i class="fas fa-external-link-alt mr-3"></i>
                    <span>View Site</span>
                </a>

                <form method="POST" action="{{ route('logout') }}" class="px-6 py-3">
                    @csrf
                    <button type="submit" class="flex items-center text-left hover:text-red-400 w-full">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-6 py-4">
                    <h2 class="text-2xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>

                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">Welcome, {{ Auth::user()->name }}</span>
                        <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                             alt="{{ Auth::user()->name }}"
                             class="w-10 h-10 rounded-full">
                    </div>
                </div>
            </header>

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mx-6 mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="mx-6 mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="mx-6 mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Please fix the following errors:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endif

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
