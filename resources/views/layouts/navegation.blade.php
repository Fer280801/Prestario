<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md hidden sm:block">
        <div class="h-16 flex items-center justify-center border-b border-gray-200">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>
        <nav class="mt-4">
            <ul class="space-y-2 px-4">
                <li>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('catalog.index')" :active="request()->routeIs('catalog.*')">
                        {{ __('Catálogo') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('loans.index')" :active="request()->routeIs('loans.*')">
                        {{ __('Préstamos') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('members.index')" :active="request()->routeIs('members.*')">
                        {{ __('Miembros') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        {{ __('Perfil') }}
                    </x-nav-link>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-nav-link>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Navbar for Mobile -->
        <header class="bg-white shadow-md sm:hidden p-4 flex justify-between items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-8 w-auto fill-current text-gray-800" />
            </a>
            <button @click="open = !open" class="text-gray-600 focus:outline-none">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                          stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </header>

        <!-- Dynamic content slot -->
        <main class="p-6">
            {{ $slot ?? '' }}
        </main>
    </div>
</div>
