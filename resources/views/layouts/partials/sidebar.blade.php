<div class="w-64 dark:bg-black text-white hidden lg:block border-r border-gray-900">
    <div class="p-5">
        <h2 class="text-lg font-bold uppercase">{{ env('APP_NAME') }}</h2>
    </div>
    <nav class="mt-5">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard.index') }}"
                   class="block px-5 py-2 text-gray-300 hover:bg-gray-700 transition-all duration-300 hover:text-white
                   {{ request()->routeIs('dashboard.index') ? 'bg-gray-700 text-white' : '' }}">
                    Dashboard
                </a>
            </li>
        </ul>
    </nav>
</div>
