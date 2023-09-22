<div class="flex h-screen bg-gray-100">
    <!-- Barra de navegación lateral (izquierda) -->
    <nav class="w-64 bg-white border-r border-gray-200">
        <!-- Contenido de la barra de navegación lateral -->
        <div class="p-4">
            <!-- Logo o nombre de la aplicación -->
            <a href="{{ route('dashboard') }}" class="text-2xl font-semibold text-gray-800">SIMONDI</a>
        </div>
    
        <!-- Enlaces de navegación -->
        <div class="space-y-2">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="space-y-2">
                {{ __('Dashboard') }}
            </x-nav-link>
            <x-nav-link :href="route('cores.index')" :active="request()->routeIs('cores.index')">
                {{ __('Cores') }}
            </x-nav-link>
            <x-nav-link :href="route('modelos.index')" :active="request()->routeIs('modelos.index')">
                {{ __('Modelos') }}
            </x-nav-link>
            <x-nav-link :href="route('marcas.index')" :active="request()->routeIs('marcas.index')">
                {{ __('Marcas') }}
            </x-nav-link>
            <x-nav-link :href="route('tipos.index')" :active="request()->routeIs('tipos.index')">
                {{ __('Tipos') }}
            </x-nav-link>
        </div>
    </nav>

    <!-- Contenido principal (derecha) -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="w-full bg-white border-b border-gray-200">
            <!-- Aquí puedes colocar tu encabezado -->
        </header>

        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
            <!-- Contenido principal de la página -->
            @yield('content')
        </main>
    </div>
</div>
