<x-app-layout>

    <x-slot name="meta_tags_layout">
        <meta name="description" content="Todas las tiendas en Anúncielo.com">
        <meta property="og:title" content="Tiendas | Anúncielo.com">
        <meta property="og:description" content="Todas las tiendas en Anúncielo.com">
        <meta property="og:image" content="{{ asset('images/logo.png') }}">
        <title>Tiendas | Anúncielo.com</title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4">
                        <h1 class="text-2xl font-semibold mb-4">Tiendas</h1>
                    </div>

                    <x-toast :type="session('message-type')" :message="session('message')" dismiss-target="toast_1" />

                    @if ($stores->count() > 0)
                        <div class="grid lg:grid-cols-3 gap-6 sm:grid-cols-1">
                            @foreach($stores as $store)
                                <x-store-card :store="$store" />
                            @endforeach
                        </div>
                    @else
                        {{-- informar al usuario que no hay tiendas creadas --}}
                        <div class="col-span-1">
                            <div class="flex flex-col items-center justify-center w-full px-4 py-2 text-base font-medium text-gray-500 border border-gray-300 border-dashed rounded-md">
                                {{-- <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg> --}}
                                <span class="m-2">No hay tiendas creadas</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

