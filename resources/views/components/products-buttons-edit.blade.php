<div class="w-full flex justify-center mt-4">
    @if ($store->userIsOwner())
        <div class="inline-flex rounded-md shadow-sm">
            <a href="{{ route('stores.products.edit', ['store_url' => $store->url, 'product_url' => $product->url]) }}"
                aria-current="page"
                class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                Editar
            </a>
            <a href="{{ route('addImage', ['store_url' => $store->url, 'product_url' => $product->url]) }}"
                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                Imágenes
            </a>
            <button type="button" data-modal-target="delete_product_modal" data-modal-toggle="delete_product_modal"
                class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                Eliminar
            </button>
        </div>
        <x-modal-warning modal-id="delete_product_modal" modal-title="¿Realmente desea eliminar este producto?">
            <form
                action="{{ route('stores.products.delete', ['store_url' => $product->store->url, 'product_url' => $product->url]) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 text-white font-semibold bg-red-500 dark:bg-red-700 rounded">Sí,
                    Eliminar</button>
            </form>
        </x-modal-warning>
    @endif
</div>
