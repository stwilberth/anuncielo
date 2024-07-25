<?php

use function Livewire\Volt\{layout, state, mount, rules};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;

// CREATE TABLE ads (
//     id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     description VARCHAR(255),
//     price DECIMAL(10,2) NOT NULL,
//     currency VARCHAR(3) NOT NULL,
//     category_id BIGINT(20) unsigned NOT NULL,
//     user_id BIGINT(20) unsigned NOT NULL,
//     -- store_id BIGINT(20) unsigned NOT NULL,
//     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );

state([
    'name' => '',
    'description' => '',
    'category_id' => '',
    'price' => 0,
    'currency' => ['CRC', 'USD'],
    'currency_selected' => '',
    'categories' => Category::all()->sortBy('name'),
    'ads' => null,
    'limit' => 10,
]);

layout('layouts.app');

mount(function () {
    //user
    $this->user = Auth::user();

    //count ads user
    $this->ads = Ad::where('user_id', $this->user->id)->count();

    //no permitir mas de 10 productos
    if ($this->ads >= 10) {
        return redirect()->route('dashboard')->with('message', 'Ha alcanzado el limite máximo de anuncios creados');
    }
});

rules(
    fn() => [
        'name' => 'required|max:255',
        'description' => 'required|max:365',
        'category_id' => 'required|numeric|exists:categories,id',
        'price' => 'required|numeric|min:0',
        'currency_selected' => 'required|in:' . implode(',', $this->currency),
    ],
);

$create = function () {
    //no permitir mas de 10 productos
    if ($this->ads >= 10) {
        return redirect()
            ->route('dashboard')
            ->with('message', 'Ha alcanzado el limite máximo de productos creados');
    }

    $this->validate();

    $Ad = new Ad();
    $Ad->name = $this->name;
    $Ad->description = $this->description;
    $Ad->category_id = $this->category_id;
    $Ad->price = $this->price;
    $Ad->currency = $this->currency_selected;
    $Ad->user_id = Auth::id();

    $Ad->save();

    return redirect()
        ->route('ads.show', [$Ad->id])
        ->with('message', 'Producto creado correctamente.');
};

?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="text-2xl font-semibold mb-4">Crear Anuncio</h1>Limites de Anuncios: {{ $ads }} de
                    {{ $limit }}
                </div>
            </div>
            <div class="p-5">
                <form wire:submit.prevent="create" class="mx-auto">

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input wire:model="name" type="text" id="name" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea wire:model="description" id="description" maxlength="365" rows="5" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        @error('description')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/2 px-3 mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                            <input wire:model="price" type="number" id="price" min="0"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @error('price')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-4">
                            <div class="mb-4">
                                <label for="currency"
                                    class="block text-sm font-medium text-gray-700">Moneda </label>
                                <select wire:model="currency_selected" id="currency_selected" required
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <option value="">Seleccione</option>
                                    @foreach ($currency as $c)
                                        <option value="{{ $c }}">{{ $c }}</option>
                                    @endforeach
                                </select>
                                @error('currency_selected')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-3 mb-4">
                            <div class="mb-4">
                                <label for="stock"
                                    class="block text-sm font-medium text-gray-700">Existencias</label>
                                <input wire:model="stock" type="number" id="stock" min="0"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('stock')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                        <select wire:model="category_id" id="category_id"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear y Publicar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
