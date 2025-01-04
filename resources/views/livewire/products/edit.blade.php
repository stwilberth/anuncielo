<?php

use function Livewire\Volt\{layout, state, mount, rules};
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;


state([
    'store' => null,
    'product' => null,
    'categories' => Category::all()->sortBy('name'),
]);

layout('layouts.app');

mount(function ($store_url, $product_url) {

    //busca la store por el url
    $this->store = Store::where('url', $store_url)->firstOrFail();
    //verifica que el usuario sea el dueño de la tienda
    if ($this->store->user_id != Auth::id()) {
        return redirect()->route('stores.index');
    }

    //busca el producto por el url
    $product = $this->store->products->where('url', $product_url)->firstOrFail();

    $this->product = $product->toArray();

});


//falta probar que admita misma url para otra store
//falta probar que admita misma url para el mismo producto
rules(fn () => [
    'product.name' => 'required|max:255',
    'product.description' => 'required|max:365',
    'product.stock' => 'required|numeric|min:1',
    'product.category_id' => 'required|numeric|exists:categories,id',
    'product.published' => 'required|boolean',
    'product.price' => 'required|numeric|min:0',
]);


$create = function () {

    $this->validate();

        $Product = Product::findOrFail($this->product['id']);
        $Product->update($this->product);

    return redirect()->route('products.show', [$this->store->url, $this->product['url']])->with('message', 'Producto actualizado correctamente.');
};


?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="text-2xl font-semibold mb-4">{{ $store->name }}</h1>
                    {{-- h2 nombre tienda --}}
                    <h2 class="text-xl font-semibold mb-4">Editar Producto</h2>
                </div>
                <div>
                    <form wire:submit.prevent="create" class="mx-auto">

                        <div>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input
                                    wire:model="product.name"
                                    type="text"
                                    id="name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea
                                wire:model="product.description"
                                id="description"
                                maxlength="365"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                        </div>

                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full md:w-1/2 px-3 mb-4">
                                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                                <input wire:model="product.price" type="number" id="price" min="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-4">
                                <div class="mb-4">
                                    <label for="stock" class="block text-sm font-medium text-gray-700">Existencias</label>
                                    <input wire:model="product.stock" type="number" id="stock" min="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @error('stock') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select wire:model="product.category_id" id="category_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>


                        <div class="mb-4">
                            <label for="public" class="block text-sm font-medium text-gray-700">Publicado</label>
                            <input
                                wire:model="product.published"
                                type="checkbox"
                                id="published"
                                @if ($product['published'])
                                    checked
                                @endif
                                class="mt-1 focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            @error('published') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>


                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

