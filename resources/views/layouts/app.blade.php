<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @isset($meta_tags_layout)
            {{ $meta_tags_layout }}
        @else
            <meta name="description" content="Anúncielo.com es un sitio web de anuncios clasificados en el que puedes publicar anuncios gratis y sin comisión.">
            <title>Anúncielo.com</title>
        @endisset

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @isset($styles_layout)
            {{ $styles_layout }}
        @endisset

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

        @auth
            <livewire:layout.navigation />
        @else
            <livewire:layout.navigationguest />
        @endauth

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @isset($scripts_layout)
            {{ $scripts_layout }}
        @endisset
    </body>
</html>
