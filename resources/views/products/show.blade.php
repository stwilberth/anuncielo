<x-app-layout>
    <x-slot name="meta_tags_layout">
        <meta name="description" content="{{ $product->description }}">
        <title>{{ $product->name }} | {{ $store->name }} | Anúncielo.com</title>

        <meta property='article:published_time' content='{{ $product->created_at }}' />
        <meta property='article:section' content='event' />
        <meta property="og:description" content="{{ $product->description }}" />
        <meta property="og:title" content="{{ $product->name }}" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="article" />
        <meta property="og:locale" content="es-cr" />
        <meta property="og:locale:alternate" content="es-us" />
        <meta property="og:site_name" content="Anúncielo.com" />
        @if ($product->images && $product->images->count() > 0)
            <meta property="og:image"
                content="{{ asset('storage/stores/' . $product->store->url . '/products/' . $product->images->first()->url) }}" />
            <meta property="og:image:width" content="300" />
            <meta property="og:image:height" content="300" />
        @endif


    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->name }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-4 text-gray-900 dark:text-gray-100">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mt-4">{{ $product->name }}</h1>
                    {{-- category --}}
                    <h3 class="text-gray-700 dark:text-gray-400 text-xl mb-2">{{ $product->categories->name }}</h3>

                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">

                            @if ($product->images && $product->images->count() > 1)
                                <x-carousel :url_base="asset('storage/stores/' . $product->store->url . '/products')" :images="$product->images" />
                            @else
                                {{-- div con texto producto sin imagen --}}
                                @if ($product->images->count() > 0)
                                    <div
                                        class="flex justify-center items-center h-full bg-gray-100 shadow-md rounded-lg">
                                        <img src="{{ asset('storage/stores/' . $product->store->url . '/products/' . $product->images->first()->url) }}"
                                            alt="{{ $product->name }}" class="w-full rounded-lg">
                                    </div>
                                @else
                                    <div
                                        class="flex justify-center items-center h-full bg-gray-100 shadow-md rounded-lg">
                                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Producto sin
                                            foto</p>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="w-full md:w-1/2 p-4">
                            <p class="mb-4 text-gray-700 dark:text-gray-400 overflow-hidden whitespace-normal">
                                {{ $product->description }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Precio:
                                ₡{{ number_format($product->price, 0, '', '') }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Existencias: {{ $product->stock }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Categoría:
                                {{ $product->categories->name }}</p>
                            {{-- <p class="mb-4 text-gray-700 dark:text-gray-400">Status: {{ $product->status }}</p> --}}
                            <p class="text-gray-700 dark:text-gray-400">Fecha Publicación:
                                {{ $product->created_at }}</p>
                            <p class="mb-4 text-gray-700 dark:text-gray-400">Fecha Actualización:
                                {{ $product->updated_at }}</p>
                        </div>
                    </div>

                    <div class="w-full my-4">
                        <div class="flex justify-center items-center gap-2 md:gap-4">
                            {{-- go back url --}}
                            <a href="{{ url()->previous() }}"
                                class="px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">
                                <i class="fas fa-arrow-left"></i>
                                <span class="hidden md:inline">Volver</span>
                            </a>


                            <a href="{{ route('stores.show', $store->url) }}"
                                class="px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">
                                <i class="fas fa-store"></i>
                                <span class="hidden md:inline">Tienda</span>
                            </a>

                            <a href="https://wa.me/{{ $product->store->whatsapp }}?text={{ route('products.show', ['store_url' => $product->store->url, 'product_url' => $product->url]) }} Me interesa este articulo."
                                class="px-4 py-2 text-white font-semibold bg-green-500 dark:bg-green-700 rounded">
                                <i class="fab fa-whatsapp"></i>
                                <span class="">Chat</span>
                            </a>

                            <a href="whatsapp://send?text={{ url()->current() }}" target="_blank"
                                class="px-4 py-2 text-white font-semibold bg-green-500 dark:bg-green-700 rounded">
                                <i class="fas fa-share-alt"></i>
                                <span class="hidden md:inline">Compartir</span>
                            </a>
                        </div>
                    </div>
                    <div class="my-4">
                        <div class="flex justify-center items-center gap-1 md:gap-4">
                            @if ($store->userIsOwner())
                                {{-- edit --}}
                                <a href="{{ route('dashboard.products.edit', ['store_url' => $store->url, 'product_url' => $product->url]) }}"
                                    class="px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">
                                    Editar
                                </a>

                                {{-- edit image --}}
                                <a href="{{ route('addImage', ['store_url' => $store->url, 'product_url' => $product->url]) }}"
                                    class="px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">
                                    Imágenes
                                </a>

                                {{-- delete --}}
                                <button data-modal-target="delete_product_modal"
                                    data-modal-toggle="delete_product_modal"
                                    class="px-4 py-2 text-white font-semibold bg-red-500 dark:bg-red-700 rounded">Eliminar</button>
                                <x-modal-warning modal-id="delete_product_modal"
                                    modal-title="¿Realmente desea eliminar este producto?">
                                    <form
                                        action="{{ route('dashboard.products.delete', ['store_url' => $product->store->url, 'product_url' => $product->url]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 text-white font-semibold bg-red-500 dark:bg-red-700 rounded">Sí,
                                            Eliminar</button>
                                    </form>
                                </x-modal-warning>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
