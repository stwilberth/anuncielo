<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @isset($meta_tags_layout)
        {{ $meta_tags_layout }}
    @else
        <meta name="description"
            content="Anúncielo.com es un sitio web de anuncios clasificados en el que puedes publicar anuncios gratis y sin comisión.">
        <title>Anúncielo.com</title>
    @endisset

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @isset($scripts_layout_top)
        {{ $scripts_layout_top }}
    @endisset
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-2 sm:pt-0 bg-gray-100">
        <div>
            <a href="{{ route('welcome') }}" wire:navigate>
                <img
                    src="{{ asset('logo_transparent.png') }}"
                    alt="Anúncielo.com Logo"
                    class="h-full w-auto object-contain"
                />
            </a>
        </div>

            <!-- Tabs -->
            <div class="sm:hidden">
                <select onchange="window.location.href=this.value" class="block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                    <option value="{{ route('login') }}" {{ request()->routeIs('login') ? 'selected' : '' }}>Iniciar Sesión</option>
                    <option value="{{ route('register') }}" {{ request()->routeIs('register') ? 'selected' : '' }}>Registrarse</option>
                </select>
            </div>
            <div class="hidden sm:block">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                        <a href="{{ route('login') }}"
                           class="{{ request()->routeIs('login') ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium" wire:navigate>
                            Iniciar Sesión
                        </a>
                        <a href="{{ route('register') }}"
                           class="{{ request()->routeIs('register') ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700' }} whitespace-nowrap border-b-2 py-4 px-1 text-sm font-medium" wire:navigate>
                            Registrarse
                        </a>
                    </nav>
                </div>
            </div>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Page Content -->
            {{ $slot }}
        </div>
    </div>

    @isset($scripts_layout_bottom)
        {{ $scripts_layout_bottom }}
    @endisset

</body>

</html>
