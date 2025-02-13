<?php

use function Livewire\Volt\{state, mount, layout};
use App\Models\Restaurant;

layout('layouts.app');

state('restaurants');

mount(function () {
    $this->restaurants = Restaurant::where('active', true)
        ->with(['country'])
        ->orderBy('name')
        ->get();
});

?>

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-900">Restaurantes</h1>
        </div>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($restaurants as $restaurant)
                <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900">
                                    <a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}" class="hover:text-indigo-600">
                                        {{ $restaurant->name }}
                                    </a>
                                </h2>
                                <p class="mt-2 text-gray-600">{{ $restaurant->description }}</p>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $restaurant->address }}
                            </div>
                            @if($restaurant->phone)
                                <div class="flex items-center mt-2 text-sm text-gray-500">
                                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    {{ $restaurant->phone }}
                                </div>
                            @endif
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('restaurants.menu', ['restaurant' => $restaurant]) }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Ver Menú
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="text-center py-12">
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No hay restaurantes disponibles</h3>
                        <p class="mt-1 text-sm text-gray-500">Vuelve más tarde para ver nuevos restaurantes.</p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</div>
