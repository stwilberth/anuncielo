

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
                                <img src="{{ asset('img/no-image.png') }}" alt="No image" class="object-cover w-full h-64 rounded-md">
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

                                {{-- edit --}}
                                <a href="{{ route('dashboard.products.edit', ['store_url' => $store->url, 'product_url' => $product->url]) }}" class="mx-4 px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">Edit</a>

                                {{-- edit image --}}
                                <a href="{{ route('addImage', ['store_url' => $store->url, 'product_url' => $product->url]) }}" class="mx-4 px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">Agregar Imagen</a>

                                {{-- delete --}}
                                {{-- <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 text-white font-semibold bg-red-500 dark:bg-red-700 rounded">Delete</button>
                                </form> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>


