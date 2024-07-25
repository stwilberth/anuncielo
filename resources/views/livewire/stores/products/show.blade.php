<?php

use function Livewire\Volt\{layout, state, mount};
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;


state([
    'store',
    'product',
]);

layout('layouts.app');

mount(function ($store_url, $product_url) {

    $this->store = Store::where('url', $store_url)->firstOrFail();
    $this->product = $this->store->products()->where('url', $product_url)->firstOrFail();

});

?>

<div>
    <x-slot name="meta_tags_layout">
        <meta name="description" content="{{ $product->description }}">
        <title>{{ $product->name }} | {{ $store->name }} | Anúncielo.com</title>

        <meta property='article:published_time' content='{{$product->created_at}}' />
        <meta property='article:section' content='event' />
        <meta property="og:description" content="{{$product->description}}" />
        <meta property="og:title" content="{{$product->name}}" />
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:type" content="article" />
        <meta property="og:locale" content="es-cr" />
        <meta property="og:locale:alternate" content="es-us" />
        <meta property="og:site_name" content="Anúncielo.com" />
        @if ($product->images && $product->images->count() > 0)
        <meta property="og:image" content="{{ asset('storage/stores/' . $product->store->url . '/products/' . $product->images->first()->url) }}" />
        {{-- <meta property="og:image:secure_url" content="https://variedadescr.com/storage/productos/{{$product->imagenes->first()->ruta}}" /> --}}
        @endif
        <meta property="og:image:size" content="300" />

        {{-- <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="{{$product->nombre}}" />
        <meta name="twitter:site" content="@BrnBhaskar" /> --}}


    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->name }}
        </h2>
    </x-slot>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $product->name }}</h1>
                </div>

                <div class="p-4">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">

                            @if($product->images && $product->images->count() > 1)
                                <x-carousel :url_base="asset('storage/stores/' . $product->store->url . '/products')" :images="$product->images" />
                            @else
                                {{-- div con texto producto sin imagen --}}
                                @if ($product->images->count() > 0)
                                    <div class="flex justify-center items-center h-full bg-gray-100 shadow-md rounded-lg">
                                        <img src="{{ asset('storage/stores/' . $product->store->url . '/products/' . $product->images->first()->url) }}" alt="{{ $product->name }}" class="w-full rounded-lg">
                                    </div>
                                @else
                                    <img class="p-8 rounded-t-lg" src="/producto_sin_imagen.png" alt="product image" />
                                @endif
                            @endif
                        </div>
                        <div class="w-full md:w-1/2 px-4 pb-4 mt-3">
                            <p class="mb-4 text-gray-700 dark:text-gray-400 overflow-hidden whitespace-normal">{{ $product->description }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Precio: ₡{{ number_format($product->price, 0, '', '') }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Existencias: {{ $product->stock }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Categoría: {{ $product->categories->name }}</p>
                            {{-- <p class="mb-4 text-gray-700 dark:text-gray-400">Status: {{ $product->status }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Fecha Publicación: {{ $product->created_at }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Fecha Actualización: {{ $product->updated_at }}</p> --}}
                        </div>
                    </div>
                    <div class="w-full">
                        <x-products-buttons :store="$store" :product="$product" />
                        <x-products-buttons-md :store="$store" :product="$product" />
                    </div>

                    <x-products-buttons-edit :store="$store" :product="$product" />

                </div>
            </div>
        </div>
    </div>
</div>

</div>
