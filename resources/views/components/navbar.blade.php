@php
    // Helper: cek apakah route/URL saat ini cocok dengan pattern
    $isActive = fn (string $pattern) =>
        request()->routeIs($pattern) || request()->is(trim($pattern, '/') . '*');
@endphp

<nav
    x-data="{ open: false }"
    class="sticky top-0 z-50 w-full bg-white border-b border-gray-200 shadow-sm"
>
    <div class="max-w-7xl mx-auto px-4 md:px-6">

        {{-- TOP BAR --}}
        <div class="flex items-center justify-between h-16">

            {{-- BRAND --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0">
                <div class="size-9 rounded-lg bg-teal-700 flex items-center justify-center text-white">
                    <i class="fa-solid fa-cube text-sm"></i>
                </div>
                <span class="font-bold text-gray-800 text-lg">MyApp</span>
            </a>

            {{-- DESKTOP MENU --}}
            <ul class="hidden md:flex items-center gap-1">

                <li>
                    <a href="{{ url('/home') }}"
                       class="px-4 py-2 rounded-lg text-sm transition
                              {{ $isActive('home')
                                    ? 'font-semibold text-teal-700 bg-teal-50'
                                    : 'font-medium text-gray-700 hover:bg-teal-50 hover:text-teal-700' }}">
                        HOME
                    </a>
                </li>

                <li>
                    <a href="{{ url('/users') }}"
                       class="px-4 py-2 rounded-lg text-sm transition
                              {{ $isActive('users')
                                    ? 'font-semibold text-teal-700 bg-teal-50'
                                    : 'font-medium text-gray-700 hover:bg-teal-50 hover:text-teal-700' }}">
                        USERS
                    </a>
                </li>

                <li>
                    <a href="{{ url('/about') }}"
                       class="px-4 py-2 rounded-lg text-sm transition
                              {{ $isActive('about')
                                    ? 'font-semibold text-teal-700 bg-teal-50'
                                    : 'font-medium text-gray-700 hover:bg-teal-50 hover:text-teal-700' }}">
                        ABOUT
                    </a>
                </li>

                <li>
                    <a href="{{ url('/contact') }}"
                       class="px-4 py-2 rounded-lg text-sm transition
                              {{ $isActive('contact')
                                    ? 'font-semibold text-teal-700 bg-teal-50'
                                    : 'font-medium text-gray-700 hover:bg-teal-50 hover:text-teal-700' }}">
                        CONTACT
                    </a>
                </li>

            </ul>

            {{-- DESKTOP ACTION (kanan) --}}
            <div class="hidden md:flex items-center gap-2">
                <button
                    type="button"
                    class="size-9 rounded-lg text-gray-600 hover:bg-gray-100 hover:text-teal-700 transition flex items-center justify-center"
                >
                    <i class="fa-solid fa-bell"></i>
                </button>

                <button
                    type="button"
                    class="text-white bg-teal-700 hover:bg-teal-800 px-4 py-2 rounded-lg text-sm font-semibold cursor-pointer transition flex gap-2 items-center justify-center"
                >
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </div>

            {{-- HAMBURGER (mobile) --}}
            <button
                type="button"
                @click="open = !open"
                class="md:hidden size-10 rounded-lg text-gray-700 hover:bg-gray-100 transition flex items-center justify-center cursor-pointer"
                aria-label="Toggle menu"
            >
                <i x-show="!open" class="fa-solid fa-bars"></i>
                <i x-show="open" x-cloak class="fa-solid fa-xmark"></i>
            </button>

        </div>
    </div>

    {{-- MOBILE MENU --}}
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="md:hidden border-t border-gray-200 bg-white"
    >
        <ul class="px-4 py-3 space-y-1">

            <li>
                <a href="{{ url('/home') }}"
                   @click="open = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition
                          {{ $isActive('home')
                                ? 'font-semibold text-teal-700 bg-teal-50'
                                : 'font-medium text-gray-700 hover:bg-teal-50 hover:text-teal-700' }}">
                    <i class="fa-solid fa-house w-4 text-center"></i>
                    <span>HOME</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/users') }}"
                   @click="open = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition
                          {{ $isActive('users')
                                ? 'font-semibold text-teal-700 bg-teal-50'
                                : 'font-medium text-gray-700 hover:bg-teal-50 hover:text-teal-700' }}">
                    <i class="fa-solid fa-users w-4 text-center"></i>
                    <span>USERS</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/about') }}"
                   @click="open = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition
                          {{ $isActive('about')
                                ? 'font-semibold text-teal-700 bg-teal-50'
                                : 'font-medium text-gray-700 hover:bg-teal-50 hover:text-teal-700' }}">
                    <i class="fa-solid fa-circle-info w-4 text-center"></i>
                    <span>ABOUT</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/contact') }}"
                   @click="open = false"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm transition
                          {{ $isActive('contact')
                                ? 'font-semibold text-teal-700 bg-teal-50'
                                : 'font-medium text-gray-700 hover:bg-teal-50 hover:text-teal-700' }}">
                    <i class="fa-solid fa-envelope w-4 text-center"></i>
                    <span>CONTACT</span>
                </a>
            </li>

            {{-- Divider + Logout --}}
            <li class="pt-2 mt-2 border-t border-gray-100">
                <button
                    type="button"
                    class="w-full text-white bg-teal-700 hover:bg-teal-800 px-4 py-2.5 rounded-lg text-sm font-semibold cursor-pointer transition flex gap-2 items-center justify-center"
                >
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Logout</span>
                </button>
            </li>
        </ul>
    </div>
</nav>