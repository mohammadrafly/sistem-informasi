<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }} | {{ $title ?? 'Page Title Not Found' }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="flex min-h-screen">
            @auth
                @include('layouts.partials.sidebar')
                <div class="flex-1 bg-gray-100 dark:bg-black">
                    <div class="flex justify-between items-center text-white border-b border-gray-900 p-5">
                        <div class="text-lg font-bold">
                            {{ $title }}
                        </div>
                        <div class="relative">
                            <div class="text-sm font-medium bg-white rounded-full p-1 text-black cursor-pointer" id="profile-dropdown-toggle">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', auth()->user()->name)[1] ?? '', 0, 1)) }}
                            </div>

                            <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                                <ul class="py-2 font-bold">
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Profile</a>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                            @csrf
                                            <button type="button" onclick="confirmLogout()" class="w-full text-left px-4 py-2 text-red-500 hover:bg-gray-200">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        @yield('content')
                    </div>
                </div>
            @else
                <div class="m-auto">
                    @yield('content')
                </div>
            @endauth
        </div>
        <script>
            const profileDropdownToggle = document.getElementById('profile-dropdown-toggle');
            const profileDropdown = document.getElementById('profile-dropdown');

            profileDropdownToggle.addEventListener('click', function () {
                profileDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', function (event) {
                if (!profileDropdown.contains(event.target) && !profileDropdownToggle.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });

            function confirmLogout() {
                if (confirm('Are you sure you want to log out?')) {
                    document.getElementById('logout-form').submit();
                }
            }
        </script>
    </body>
</html>
