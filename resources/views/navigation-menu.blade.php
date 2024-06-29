<nav x-data="{ open: false }" class="bg-gray-50 dark:bg-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-18">
            <div class="flex">
                <!-- Logo -->
{{--                <div class="py-2 shrink-0 flex items-center sm:hidden">--}}
{{--                    <a href="{{ route('home') }}">--}}
{{--                        <x-application-logo />--}}
{{--                    </a>--}}
{{--                </div>--}}

                <!-- Navigation Links -->
                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.*')">
                        {{ __('Blog') }}
                    </x-nav-link>
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->username }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                    {{ Auth::user()->username }}

                                                    <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>

                                    <x-slot name="content">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>

                                        <x-dropdown-link wire:navigate href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                                        <div class="border-t border-orange-500/30"></div>

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}" x-data>
                                            @csrf

                                            <x-dropdown-link href="{{ route('logout') }}"
                                                             @click.prevent="$root.submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        @else
                            <div class="flex space-x-2 items-center">
                                <x-link-default href="{{ route('login') }}">Login</x-link-default>
                                <x-link-default href="{{ route('register') }}">register</x-link-default>
                            </div>
                        @endauth
                    </nav>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 dark:hover:text-gray-50 hover:bg-gray-100 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-600 focus:text-gray-500 dark:focus:text-gray-50 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-responsive-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-nav-responsive-link>
            <x-nav-responsive-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.*')">
                {{ __('Blog') }}
            </x-nav-responsive-link>
        </div>

        <!-- Responsive Settings Options -->
        @if (Route::has('login'))
            <div class="pt-4 pb-1 border-t border-gray-200">
                @auth()
                    <div class="flex items-center px-4">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div class="shrink-0 me-3">
                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->username }}" />
                            </div>
                        @endif
                        <div>
                            <div class="font-medium text-base text-gray-700 dark:text-gray-50">{{ Auth::user()->username }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <!-- Account Management -->
                        <x-nav-responsive-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                            {{ __('Profile') }}
                        </x-nav-responsive-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-nav-responsive-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-nav-responsive-link>
                        </form>
                    </div>
                @else
                    <x-nav-responsive-link href="{{ route('login') }}">Login</x-nav-responsive-link>
                    <x-nav-responsive-link href="{{ route('register') }}">Register</x-nav-responsive-link>
                @endauth
            </div>
        @endif
    </div>
</nav>
