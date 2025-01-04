<div class="group w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 dark:bg-gray-800 dark:border-gray-700">
    <a href="{{ route('products.show', ['store_url' => $product->store->url, 'product_url' => $product->url]) }}" class="block overflow-hidden">
        @if ($product->images->count() > 0)
            <img class="rounded-t-lg w-full h-48 sm:h-56 md:h-64 object-contain transform group-hover:scale-105 transition-transform duration-300" src="{{ asset('storage/stores/' . $product->store->url . '/products').'/'.$product->images->first()->url }}" alt="{{ $product->name }}" />
        @else
            <img class="rounded-t-lg w-full h-48 sm:h-56 md:h-64 object-contain transform group-hover:scale-105 transition-transform duration-300" src="/apple-watch.png" alt="{{ $product->name }}" />
        @endif
    </a>
    <div class="px-5 pb-5">
        <a href="{{ route('products.show', ['store_url' => $product->store->url, 'product_url' => $product->url]) }}" class="block mb-4">
            <h5 class="text-base sm:text-lg md:text-xl font-semibold tracking-tight text-gray-900 line-clamp-2 hover:text-blue-600 transition-colors duration-200 dark:text-white dark:hover:text-blue-400">{{ $product->name }}</h5>
        </a>
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
            <span class="text-xl sm:text-2xl font-bold text-amethyst-500 dark:text-white">₡{{ number_format($product->price, 0, ',', '.') }}</span>
        </div>
    </div>
</div>
