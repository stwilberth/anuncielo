<?php

use function Livewire\Volt\{layout, state, mount, rules};
use Illuminate\Support\Facades\DB;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;


state([
    'id' => '',
    'name' => '',
    'description' => '',
    'category_id' => '',
    'price' => '',
    'currency' => ['CRC', 'USD'],
    'currency_selected' => '',
    'categories' => Category::all()->sortBy('name'),
]);

layout('layouts.app');

mount(function ($id) {

    $Ad = Ad::where('id', $id)->firstOrFail();

    $this->id = $Ad->id;
    $this->name = $Ad->name;
    $this->description = $Ad->description;
    $this->currency_selected = $Ad->currency;
    $this->category_id = $Ad->category_id;
    $this->price = $Ad->price;

});


//falta probar que admita misma url para otra store
//falta probar que admita misma url para el mismo producto
rules(fn () => [
    'name' => 'required|max:255',
    'description' => 'required|max:365',
    'category_id' => 'required|numeric|exists:categories,id',
    'currency_selected' => 'required|in:'.implode(',', $this->currency),
    'price' => 'required|numeric|min:0',
]);


$update = function () {

    $this->validate();

        $Ad = Ad::findOrfail($this->id);
        $Ad->name = $this->name;
        $Ad->description = $this->description;
        $Ad->category_id = $this->category_id;
        $Ad->price = $this->price;
        $Ad->currency = $this->currency_selected;
        $Ad->user_id = Auth::id();
        $Ad->save();

    return redirect()->route('ads.show', [$this->id])->with('message', 'Producto creado correctamente.');
};


?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-4">Editar Anuncio</h2>
                </div>
                <div>
                    <form wire:submit.prevent="update" class="mx-auto">

                        <div>
                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input
                                    wire:model="name"
                                    type="text"
                                    id="name"
                                    required
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
                                required
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>



                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full md:w-1/2 px-3 mb-4">
                                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                                <input wire:model="price" type="number" id="price" min="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-4">
                                <label for="currency" class="block text-sm font-medium text-gray-700">Moneda</label>
                                <select wire:model="currency_selected" id="currency" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <option value="">Selecciona una moneda</option>
                                    @foreach($currency as $currency)
                                        <option value="{{ $currency }}" @if($currency === $this->currency_selected) selected @endif >{{ $currency }}</option>
                                    @endforeach
                                </select>
                                @error('currency_selected') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
{{--
                            <div class="w-full md:w-1/2 px-3 mb-4">
                                <div class="mb-4">
                                    <label for="stock" class="block text-sm font-medium text-gray-700">Existencias</label>
                                    <input wire:model="stock" type="number" id="stock" min="0" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @error('stock') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div> --}}
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

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar Producto</button>
                            <a href="{{ route('ads.show', [$this->id]) }}" class="bg-amber-400 hover:bg-amber-500 text-_ font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

