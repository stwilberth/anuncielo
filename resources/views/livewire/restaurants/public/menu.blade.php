<?php

use function Livewire\Volt\{state, mount, layout};
use App\Models\Restaurant;

layout('layouts.app');

state(['restaurant' => null]);

mount(function (Restaurant $restaurant) {
    $this->restaurant = $restaurant->load(['currency', 'categories' => function($query) {
        $query->where('active', true)
            ->with(['items' => function($query) {
                $query->where('active', true)
                    ->with('images');
            }]);
    }]);
});

?>

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-3xl font-semibold text-gray-900">{{ $restaurant->name }}</h1>
                <p class="mt-2 text-gray-600">{{ $restaurant->description }}</p>
            </div>
            <a href="{{ route('restaurants.show', ['restaurant' => $restaurant]) }}"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Ver Información
            </a>
        </div>

        @if($restaurant->categories->isNotEmpty())
            <div class="space-y-8">
                @foreach($restaurant->categories as $category)
                    @if($category->items->isNotEmpty())
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-900 mb-4">{{ $category->name }}</h2>
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach($category->items as $item)
                                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                                        @if($item->images->isNotEmpty())
                                            <img src="{{ Storage::url($item->images->first()->url) }}"
                                                alt="{{ $item->name }}" class="w-full h-48 object-cover">
                                        @endif
                                        <div class="p-4">
                                            <h3 class="text-lg font-medium text-gray-900">{{ $item->name }}</h3>
                                            @if($item->description)
                                                <p class="mt-1 text-sm text-gray-500">{{ $item->description }}</p>
                                            @endif
                                            <div class="mt-2">
                                                <span class="text-lg font-medium text-gray-900">
                                                    {{ $restaurant->currency->symbol }}{{ number_format($item->price, 2) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <h3 class="mt-2 text-sm font-medium text-gray-900">No hay elementos en el menú</h3>
                <p class="mt-1 text-sm text-gray-500">Este restaurante aún no ha agregado elementos a su menú.</p>
            </div>
        @endif
    </div>
</div>
