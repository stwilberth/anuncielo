

<x-app-layout>
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
                    <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $product->name }}</h1>
                </div>

                <div class="p-4">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full md:w-1/2">

                            @if($product->images && $product->images->count() > 0)
                                <x-carousel :url_base="asset('storage/stores/' . $product->store->url . '/products')" :images="$product->images" />
                            @else
                                {{-- div con texto producto sin imagen --}}
                            <div class="flex justify-center items-center h-full bg-gray-100 shadow-md rounded-lg">
                                <p class="text-xl font-semibold text-gray-900 dark:text-white">Producto sin foto</p>
                            </div>

                            @endif
                        </div>
                        <div class="w-full md:w-1/2 p-4">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">{{ $product->name }}</p>
                            <p class="text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Price: {{ $product->price }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Stock: {{ $product->stock }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Category: {{ $product->categories->name }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Status: {{ $product->status }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Created: {{ $product->created_at }}</p>
                            <p class="text-gray-700 dark:text-gray-400">Updated: {{ $product->updated_at }}</p>
                            <div class="flex mt-4">

                                {{-- back --}}
                                <a href="{{ route('products.index') }}" class="px-4 py-2 text-white font-semibold bg-gray-900 dark:bg-gray-700 rounded">Back</a>

                            @if($store->userIsOwner())
                                {{-- edit --}}
                                <a href="{{ route('dashboard.products.edit', ['store_url' => $store->url, 'product_url' => $product->url]) }}" class="mx-4 px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">Edit</a>

                                {{-- edit image --}}
                                <a href="{{ route('addImage', ['store_url' => $store->url, 'product_url' => $product->url]) }}" class="mx-4 px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">Agregar Imagen</a>

                                {{-- delete --}}
                                <button
                                    data-modal-target="delete_product_modal"
                                    data-modal-toggle="delete_product_modal"
                                    class="px-4 py-2 text-white font-semibold bg-red-500 dark:bg-red-700 rounded">Eliminar</button>
                                <x-modal-warning modal-id="delete_product_modal" modal-title="¿Realmente desea eliminar este producto?">
                                    <form action="{{ route('dashboard.products.delete', ['store_url' => $product->store->url, 'product_url' => $product->url]) }}" method="POST">
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
</div>

</x-app-layout>


