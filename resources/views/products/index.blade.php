

<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->name }}
        </h2>
    </x-slot> --}}

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Productos de Todas las Tiendas</h1>
                </div>

                <div class="mt-6">
                    {{-- <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center">Productos de Todas las Tiendas</h2> --}}
                    <div class="mt-6">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                            @foreach ($products as $product)
                                <x-product :product="$product" />
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</x-app-layout>
