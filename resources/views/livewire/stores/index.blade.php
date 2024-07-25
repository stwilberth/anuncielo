<?php

use function Livewire\Volt\{layout, state, mount};
use App\Models\Store;


state([
    'stores' => [],
    'title' => '',
]);

mount(function () {

    $this->stores = Store::orderBy('created_at', 'desc')->get();
    $this->title = 'Tiendas';
    //session()->flash('message', '¡Acción completada con éxito!');
    //session()->flash('message-type', 'success');
    //session()->flash('message', '¡Algo salió mal!');
    //session()->flash('message-type', 'danger');
    //session()->flash('message', '¡Cuidado con esto!');
    //session()->flash('message-type', 'warning');
});



layout('layouts.app');

?>


<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 flex justify-between items-center">
                        <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
                        {{-- crear anuncio boton --}}
                        <a href="{{ route('stores.create') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            Crear Tienda</a>
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

