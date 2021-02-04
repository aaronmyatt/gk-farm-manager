<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block w-auto h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('Home') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('sites') }}" :active="request()->routeIs('sites')">
                        {{ __('Sites') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('tanks') }}" :active="request()->routeIs('tanks')">
                        {{ __('Tanks') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('livestock') }}" :active="request()->routeIs('livestock')">
                        {{ __('Livestock') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('measurements') }}" :active="request()->routeIs('measurements')">
                        {{ __('Measurements') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                @if(Auth::check())
                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf
    
                        <x-jet-nav-link onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Logout') }}
                        </x-jet-nav-link>
                    </form>
                @else
                    <x-jet-nav-link href="{{ route('login') }}">
                        {{ __('Login') }}
                    </x-jet-nav-link>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
            <x-jet-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('sites') }}" :active="request()->routeIs('sites')">
                {{ __('Sites') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('tanks') }}" :active="request()->routeIs('tanks')">
                {{ __('Tanks') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('livestock') }}" :active="request()->routeIs('livestock')">
                {{ __('Livestock') }}
            </x-jet-responsive-nav-link>
            <x-jet-responsive-nav-link href="{{ route('measurements') }}" :active="request()->routeIs('measurements')">
                {{ __('Measurements') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <x-jet-responsive-nav-link href="{{ route('login') }}">
                {{ __('Login') }}
            </x-jet-responsive-nav-link>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
