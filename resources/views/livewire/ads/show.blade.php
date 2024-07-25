<?php
use function Livewire\Volt\{layout, state, mount, rules};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;

state([
    'ad' => null,
]);

layout('layouts.app');

mount(function ($id) {
    $ad = Ad::find($id);
    if(!$ad){
        abort(404);
    }
    $this->ad = $ad;
});

?>

<div>
    <x-slot name="meta_tags_layout">
        <meta name="description" content="{{ $ad->description }}">
        <title>{{ $ad->name }} | Anúncielo.com</title>

        <meta property='article:published_time' content='{{$ad->created_at}}' />
        <meta property='article:section' content='event' />
        <meta property="og:description" content="{{$ad->description}}" />
        <meta property="og:title" content="{{$ad->name}}" />
        <meta property="og:url" content="{{url()->current()}}" />
        <meta property="og:type" content="article" />
        <meta property="og:locale" content="es-cr" />
        <meta property="og:locale:alternate" content="es-us" />
        <meta property="og:site_name" content="Anúncielo.com" />
        @if ($ad->images && $ad->images->count() > 0)
        <meta property="og:image" content="{{ asset('storage/ads/' . $ad->id . '/images/' . $ad->images->first()->url) }}" />
        {{-- <meta property="og:image:secure_url" content="https://variedadescr.com/storage/productos/{{$ad->imagenes->first()->ruta}}" /> --}}
        @endif
        <meta property="og:image:size" content="300" />

        {{-- <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="{{$ad->nombre}}" />
        <meta name="twitter:site" content="@BrnBhaskar" /> --}}


    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $ad->name }}
        </h2>
    </x-slot>

<div class="py-12">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $ad->name }}</h1>
                </div>

                <div class="p-4">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">

                            {{-- @if($ad->images && $ad->images->count() > 1)
                                <x-carousel :url_base="asset('storage/ads/' . $ad->id . '/images')" :images="$ad->images" />
                            @else

                                @if ($ad->images->count() > 0)
                                    <div class="flex justify-center items-center h-full bg-gray-100 shadow-md rounded-lg">
                                        <img src="{{ asset('storage/ads/' . $ad->id . '/images/' . $ad->images->first()->url) }}" alt="{{ $ad->name }}" class="w-full rounded-lg">
                                    </div>
                                @else
                                    <img class="p-8 rounded-t-lg" src="/producto_sin_imagen.png" alt="product image" />
                                @endif
                            @endif --}}
                        </div>
                        <div class="w-full md:w-1/2 px-4 pb-4">
                            <p class="mb-4 text-gray-700 dark:text-gray-400 overflow-hidden whitespace-normal">{{ $ad->description }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Precio: ₡{{ number_format($ad->price, 0, '', '') }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Categoría: {{ $ad->category->name }}</p>
                            {{-- <p class="mb-4 text-gray-700 dark:text-gray-400">Status: {{ $ad->status }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Fecha Publicación: {{ $ad->created_at }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Fecha Actualización: {{ $ad->updated_at }}</p> --}}
                        </div>
                    </div>
                    <div class="w-full m-4">

                        {{-- back --}}
                        {{-- <a href="{{ route('products.index') }}" class="px-4 py-2 text-white font-semibold bg-gray-900 dark:bg-gray-700 rounded">Back</a> --}}
                        {{-- <a href="{{ route('stores.show', $store->url) }}" class="mx-4 px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">
                            Ver Usuario
                        </a> --}}

                        <a href="https://wa.me/+506{{ $ad->user->whatsapp }}?text={{ route('ads.show', ['id' => $ad->id,]) }} Me interesa este articulo." class="mx-4 px-4 py-2 text-white font-semibold bg-green-500 dark:bg-green-700 rounded">
                            Pedir
                        </a>

                        <a href="whatsapp://send?text={{url()->current()}}" target="_blank" class="mx-4 px-4 py-2 text-white font-semibold bg-purple-500 hover:bg-purple-600 dark:bg-green-700 rounded">
                            Compartir
                        </a>

                        @if($ad->isOwner())
                            {{-- edit --}}
                            <a href="{{ route('ads.edit', ['id' => $ad->id]) }}" class="mx-4 px-4 py-2 text-white font-semibold bg-amber-400 hover:bg-amber-500  dark:bg-amber-700 rounded">
                                Editar
                            </a>

                            {{-- edit image --}}
                            {{-- <a href="{{ route('addImage', ['id' => $ad->id]) }}" class="mx-4 px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">Agregar Imagen</a> --}}

                            {{-- delete --}}
                            <a
                                data-modal-target="delete_product_modal"
                                data-modal-toggle="delete_product_modal"
                                class="mx-4 px-4 py-2 text-white font-semibold bg-red-500 hover:bg-red-700 dark:bg-red-700 rounded">Eliminar</a>
                            <x-modal-warning modal-id="delete_product_modal" modal-title="¿Realmente desea eliminar este producto?">
                                <form action="{{ route('ads.delete', ['id' => $ad->id]) }}" method="post" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-white font-semibold bg-red-500 dark:bg-red-700 rounded">Sí, Eliminar</button>
                                </form>
                            </x-modal-warning>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


