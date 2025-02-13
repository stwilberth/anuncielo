<?php

use function Livewire\Volt\{state, mount, layout};
use App\Models\Restaurant;

layout('layouts.app');

state([
    'restaurant' => null,
    'items' => [],
]);

mount(function (Restaurant $restaurant) {
    $this->restaurant = $restaurant;
    $this->items = $restaurant->items()
        ->with(['categories', 'images'])
        ->orderBy('name')
        ->get();
});

?>

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Menu Items - {{ $restaurant->name }}</h1>
            <a href="{{ route('dashboard.restaurants.menu-item.create', $restaurant) }}"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Add Menu Item
            </a>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($items as $item)
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    @if($item->images->isNotEmpty())
                        <img src="{{ Storage::url($item->images->first()->url) }}" alt="{{ $item->name }}"
                            class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                            <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h3 class="text-lg font-medium text-gray-900">{{ $item->name }}</h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $item->description }}</p>
                            </div>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $item->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $item->active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="mt-4">
                            <span class="text-lg font-medium text-gray-900">{{ $restaurant->currency->symbol }}{{ number_format($item->price, 2) }}</span>
                        </div>
                        @if($item->categories->isNotEmpty())
                            <div class="mt-4">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($item->categories as $category)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $category->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="mt-4">
                            <a href="{{ route('dashboard.restaurants.menu-item.edit', [$restaurant, $item]) }}"
                                class="text-indigo-600 hover:text-indigo-900">Edit Item</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="text-center">
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No menu items</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new menu item.</p>
                        <div class="mt-6">
                            <a href="{{ route('dashboard.restaurants.menu-item.create', $restaurant) }}"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Add Menu Item
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>
