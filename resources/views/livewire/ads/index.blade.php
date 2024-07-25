<?php

use function Livewire\Volt\{layout, state, mount, rules};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

state([
    'ads' => [],
    'title' => '',
]);

layout('layouts.app');

mount(function () {
    $this->ads = Ad::orderBy('id', 'desc')->get();
    $this->title = 'Anuncios';
});

?>

<div>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot> --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 flex justify-between items-center">
                        <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
                        {{-- crear anuncio boton --}}
                        <a href="{{ route('ads.create') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            Crear Anuncio</a>
                    </div>

                    <div class="mt-6">
                        {{-- <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center">Productos de Todas las Tiendas</h2> --}}
                        <div class="mt-6">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                @foreach ($ads as $ad)
                                    <x-ad :ad="$ad" />
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
