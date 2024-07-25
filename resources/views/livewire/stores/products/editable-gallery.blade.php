<?php

use function Livewire\Volt\{state};
use App\Models\ProductImage;
use App\Models\Product;

state([
    'product_id',
    'images',
    'url_base',
]);


$deleteImage = function($id) {
    $image = ProductImage::findOrFail($id);
    $product = Product::findOrFail($image->product_id);
    if ($product->store->user_id != auth()->user()->id) {
        return redirect()->route('stores.index');
    }

    try {
        //eliminar imagen archivos
        Storage::disk('public')->delete('stores/'.$product->store->url.'/products/'.$image->url);
        Storage::disk('public')->delete('stores/'.$product->store->url.'/products/thumb_'.$image->url);

        $image->delete();
    } catch (\Throwable $th) {
        dd($th);
    }

    //$this->images = ProductImage::where('product_id', $product->id)->get();
    //refresh page
    return redirect()->route('addImage', ['store_url' => $product->store->url, 'product_url' => $product->url]);
};

?>





<div class="grid grid-cols-2 md:grid-cols-6 gap-4">
    @foreach ($images as $index => $image)
        <div class="relative">
            <img src="{{ $url_base }}/{{ $image->url }}" alt="{{ $image->name }}" class="h-auto max-w-full rounded-lg">

            <!-- Botón encima de la imagen, mostrar modal -->
            <button
                data-modal-target="editable_gallery_{{ $image->id }}"
                data-modal-toggle="editable_gallery_{{ $image->id }}"
                class="absolute top-2 right-2 p-2 bg-black bg-opacity-50 text-white rounded-full hover:bg-opacity-75 focus:outline-none">
                <!-- Icono de eliminación, por ejemplo, una 'x' -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M15.293 4.293a1 1 0 0 1 1.414 1.414L11.414 12l5.293 5.293a1 1 0 1 1-1.414 1.414L10 13.414l-5.293 5.293a1 1 0 1 1-1.414-1.414L8.586 12 3.293 6.707a1 1 0 0 1 1.414-1.414L10 10.586l5.293-5.293z" clip-rule="evenodd" />
                </svg>
            </button>


            <x-modal-warning
                :modal-id="'editable_gallery_' . $image->id"
                modal-title="¿Desea eliminar la imagen?"
                >

                <button
                    data-modal-hide="editable_gallery_{{ $image->id }}"
                    type="button"
                    wire:click="deleteImage({{ $image->id }})"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Sí, eliminar
                </button>
                <button data-modal-hide="editable_gallery_{{ $image->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    No, cancelar
                </button>

            </x-modal-warning>
        </div>
    @endforeach
</div>
