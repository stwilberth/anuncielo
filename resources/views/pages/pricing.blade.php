<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Precios | Anúncielo.com</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        @auth
            <livewire:layout.navigation />
        @else
            <livewire:layout.navigationguest />
        @endauth
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center flex-col">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-5">
                            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-amethyst-900 md:text-5xl lg:text-6xl dark:text-white">Precios</h1>
                            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                                Encuentra el plan perfecto para tu negocio.
                            </p>
                        </div>

                        <div class="grid gap-6 lg:gap-8 md:grid-cols-3 lg:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
                            <!-- Plan Gratuito -->
                            <div class="flex flex-col p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <h3 class="mb-4 text-2xl font-semibold text-amethyst-600">Básico</h3>
                                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Ideal para comenzar</p>
                                <div class="my-8">
                                    <span class="mr-2 text-5xl font-extrabold text-gray-900 dark:text-white">Gratis</span>
                                </div>
                                <!-- Lista de características -->
                                <ul class="space-y-4 mb-6 flex-grow">
                                    <li class="flex items-center space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">Hasta 25 productos</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">Soporte por email</span>
                                    </li>
                                </ul>
                                <a href="{{ route('register') }}" class="text-white bg-amethyst-600 hover:bg-amethyst-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Comenzar ahora</a>
                            </div>

                            <!-- Plan Profesional -->
                            <div class="flex flex-col p-6 bg-white rounded-lg border border-amethyst-600 shadow-sm dark:bg-gray-800 dark:border-amethyst-500">
                                <h3 class="mb-4 text-2xl font-semibold text-amethyst-600">Profesional</h3>
                                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Perfecto para negocios en crecimiento</p>
                                <div class="my-8">
                                    <span class="mr-2 text-5xl font-extrabold text-gray-900 dark:text-white">$9</span>
                                    <span class="text-gray-500 dark:text-gray-400">/mes</span>
                                </div>
                                <ul class="space-y-4 mb-6 flex-grow">
                                    <li class="flex items-center space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">Hasta 100 productos</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">Soporte por email y chat</span>
                                    </li>
                                </ul>
                                <a href="https://wa.me/50685008393" class="text-white bg-amethyst-600 hover:bg-amethyst-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Contactar ventas</a>
                            </div>

                            <!-- Plan Empresarial -->
                            <div class="flex flex-col p-6 bg-white rounded-lg border border-gray-200 shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <h3 class="mb-4 text-2xl font-semibold text-amethyst-600">Premium</h3>
                                <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Optimizado para negocios medianos</p>
                                <div class="my-8">
                                    <span class="mr-2 text-5xl font-extrabold text-gray-900 dark:text-white">$29</span>
                                    <span class="text-gray-500 dark:text-gray-400">/mes</span>
                                </div>
                                <ul class="space-y-4 mb-6 flex-grow">
                                    <li class="flex items-center space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">Hasta 1000 productos</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <svg class="flex-shrink-0 w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">Soporte Prioritario</span>
                                    </li>
                                </ul>
                                <a href="https://wa.me/50685008393" class="text-white bg-amethyst-600 hover:bg-amethyst-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Contactar ventas</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <x-footer-footer />


    </body>
</html>
