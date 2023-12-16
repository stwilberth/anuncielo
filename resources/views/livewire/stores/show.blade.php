<?php

use function Livewire\Volt\{layout, state, mount};
use App\Models\Store;

//si existe la store, la guarda en el state
state([
    'store',
]);

//obtine la url del store luego de store/ en la url
mount(function ($url) {
    //busca la store por el url
    $store = Store::where('url', $url)->firstOrFail();
    //guarda la store en el state
    $this->store = $store;
});


layout('layouts.app');

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                @php
                    //dd($store);
                @endphp
                    <h1 class="text-2xl font-semibold mb-4">{{ $store->name }}</h1>
                </div>

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif


                <div class="max-w-2xl mx-auto rounded-lg border shadow-md">
                    <div class="p-5">
                        <h2 class="text-2xl font-bold leading-tight text-gray-900">Detalles de la Tienda</h2>

                        <div class="space-y-3 mt-4">
                            {{-- <div class="flex items-center space-x-2">
                                <span class="font-semibold">ID:</span>
                                <span>{{ $store->id }}</span>
                            </div> --}}
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">Nombre:</span>
                                <span>{{ $store->name }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">URL:</span>
                                <span>{{ $store->url }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">Teléfono:</span>
                                <span>{{ $store->phone }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">WhatsApp:</span>
                                <span>{{ $store->whatsapp }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">País:</span>
                                <span>{{ $store->country }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">Dirección:</span>
                                <span>{{ $store->address }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">Es Física:</span>
                                <span>{{ $store->physical ? 'Sí' : 'No' }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">Email:</span>
                                <span>{{ $store->email }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">Facebook:</span>
                                <a href="{{ $store->facebook_url }}" class="text-blue-500 hover:underline">{{ $store->facebook_url }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

