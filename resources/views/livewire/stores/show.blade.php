<?php

use function Livewire\Volt\{layout, state, mount};
use App\Models\Store;

//si existe la store, la guarda en el state
state([
    'store',
]);

//obtine la url del store luego de store/ en la url
mount(function ($store_url) {
    $store = Store::where('url', $store_url)->firstOrFail();
    $this->store = $store;
});


layout('layouts.app');

?>

<div class="py-12">

        <x-slot name="meta_tags_layout">
            <meta name="description" content="{{ $store->description }}">
            <title>{{ $store->name }} | Anúncielo.com</title>
        </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $store->name }}</h1>
                </div>

                <x-store-cover-image :store="$store" />

                <x-store-description :store="$store" />

                <x-store-products-section :store="$store" />

            </div>
        </div>
    </div>
</div>

