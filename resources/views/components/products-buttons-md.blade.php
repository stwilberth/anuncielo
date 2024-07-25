<div class="hidden md:flex justify-center space-x-4">

    <a href="{{ route('stores.show', $store->url) }}"
        class="mx-4 px-4 py-2 text-white font-semibold bg-blue-500 dark:bg-blue-700 rounded">
        Ver Tienda
    </a>

    <a href="https://wa.me/+506{{ $product->store->whatsapp }}?text={{ route('stores.products.show', ['store_url' => $product->store->url, 'product_url' => $product->url]) }} Me interesa este articulo."
        class="mx-4 px-4 py-2 text-white font-semibold bg-green-500 dark:bg-green-700 rounded">
        Pedir
    </a>

    <a href="whatsapp://send?text={{ url()->current() }}" target="_blank"
        class="mx-4 px-4 py-2 text-white font-semibold bg-green-500 dark:bg-green-700 rounded">
        Compartir
    </a>

</div>
