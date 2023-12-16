<?php

use function Livewire\Volt\{layout, state, mount};
use App\Models\Store;


state([
    'stores' => Store::where('user_id', auth()->user()->id)->get(),
]);


mount(function () {

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
                <div class="p-4">
                    <h1 class="text-2xl font-semibold mb-4">Mis Tiendas</h1>
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

                <div class="flex justify-center mt-6">
                    <div class="w-full sm:w-auto">

                        @if (auth()->user()->stores->count() > 0)
                            {{-- modal que indique que no se puede crear una tienda --}}
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Crear Tienda
                            </button>
                            <x-modal-default modal-id="default-modal" modal-title="Error!">
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Lo siento por las molestias ocasionadas.
                                </p>
                                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                    Actualmente estamos en fase beta y no es posible crear más de una tienda. Agradecemos tu comprensión y paciencia.
                                </p>
                                <x-slot name="footer">
                                    <button data-modal-hide="default-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Aceptar</button>
                                </x-slot>
                            </x-modal-default>
                        @else
                            <a href="{{ route('dashboard.stores.create') }}" class="inline-flex items-center justify-center w-full px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Crear Tienda
                            </a>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

