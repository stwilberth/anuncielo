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
    'name' => '',
    'description' => '',
    'stock' => 0,
    'category_id' => '',
    'published' => true,
    'price' => 0,
    'store' => null,
    'categories' => Category::all()->sortBy('name'),
    'products' => null,
]);

layout('layouts.app');

mount(function ($store_url) {

    //busca la store por el url
    $store = Store::where('url', $store_url)->firstOrFail();
    $this->store = $store;
    $this->products = $store->products;
    //no permitir mas de 10 productos
    if($this->products->count() >= 25){
        return redirect()->route('stores.show', $this->store->url)->with('message', 'Ha alcanzado el limite máximo de productos creados');
    }
});


//falta probar que admita misma url para otra store
rules(fn () => [
    'name' => 'required|max:255',
    'description' => 'required|max:365',
    'stock' => 'required|numeric|min:1',
    'category_id' => 'required|numeric|exists:categories,id',
    'published' => 'required|boolean',
    'price' => 'required|numeric|min:0',
]);


$create = function () {

    //no permitir mas de 100 productos
    if($this->products->count() >= 25){
        return redirect()->route('stores.show', $this->store->url)->with('message', 'Ha alcanzado el limite máximo de productos creados');
    }

    $this->validate();

        $Product = new Product();
        $Product->name = $this->name;
        $Product->description = $this->description;
        $Product->url = uniqid() . '-' . Str::slug($this->name);
        $Product->stock = $this->stock;
        $Product->store_id = $this->store->id;
        $Product->category_id = $this->category_id;
        $Product->published = $this->published;
        $Product->price = $this->price;
        $Product->user_id = Auth::id();

        $Product->save();


    //redirect to store/product/url
    return redirect()->route('products.show', [$this->store->url, $this->url])->with('message', 'Producto creado correctamente.');
};

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="text-2xl font-semibold mb-4">{{ $store->name }}</h1>
                    {{-- h2 nombre tienda --}}
                    <h2 class="text-xl font-semibold mb-4">Crear Producto</h2>
                </div>
                <div>
                    <form wire:submit.prevent="create" class="mx-auto">

                        <div>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input
                                    wire:model="name"
                                    type="text"
                                    id="name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                        </div>


                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea
                                wire:model="description"
                                id="description"
                                maxlength="365"
                                rows="5"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                        </div>

                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full md:w-1/2 px-3 mb-4">
                                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                                <input wire:model="price" type="number" id="price" min="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-4">
                                <div class="mb-4">
                                    <label for="stock" class="block text-sm font-medium text-gray-700">Existencias</label>
                                    <input wire:model="stock" type="number" id="stock" min="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @error('stock') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select wire:model="category_id" id="category_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                <option value="">Selecciona una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>


                        <div class="mb-4">
                            <label for="public" class="block text-sm font-medium text-gray-700">Publicado</label>
                            <input wire:model="published" type="checkbox" id="published" class="mt-1 focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                            @error('published') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>


                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear Producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

