<?php

use function Livewire\Volt\{layout, state, mount};
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Currency;
use App\Models\Country;


state([
    'store' => null,
    'currencies' => [],
    'countries' => [],
]);

layout('layouts.app');

mount(function ($store_url) {
    //busca la store por el url
    $store = Store::where('url', $store_url)->firstOrFail();
    //verifica que el usuario sea el dueño de la tienda
    if ($store->user_id != Auth::id()) {
        return redirect()->route('stores.index');
    }
    //guarda la store en el estado
    $this->store = $store->toArray();
    //carga las monedas y paises
    $this->currencies = Currency::all();
    $this->countries = Country::all();
});


$validateForm = function () {
    $this->validate([
        'store.name' => 'required|max:255',
        'store.description' => 'required|max:1000',
        'store.payment_methods' => 'required|max:255',
        'store.shipping_methods' => 'required|max:255',
        'store.phone' => 'nullable|max:20',
        'store.whatsapp' => 'required|max:20',
        'store.country_id' => 'required|exists:countries,id',
        'store.currency_id' => 'required|exists:currencies,id',
        'store.address' => 'required|max:255',
        'store.physical' => 'required|boolean',
        'store.email' => 'required|email|max:255',
        'store.facebook_url' => 'nullable|url|max:255',
        'store.instagram_url' => 'nullable|url|max:255',
    ]);
};


$update = function () {
    $this->validateForm();
    $store = Store::findOrFail($this->store['id']);
    $store->update($this->store);
    return redirect()->route('stores.show', $store->url)->with('message', 'Store updated successfully.');
};


?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="text-2xl font-semibold mb-4">Actualizar datos de la Tienda</h1>
                </div>
                <div>
                    <form wire:submit.prevent="update">
                        <div >
                            <!-- Campo Nombre -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                                <input
                                    wire:model="store.name"
                                    id="name"
                                    placeholder="Nombre"
                                    type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <!-- Campo Descripción -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                            <textarea wire:model="store.description" id="description" rows="3" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Métodos de Pago -->
                        <div class="mb-4">
                            <label for="payment_methods" class="block text-gray-700 text-sm font-bold mb-2">Métodos de Pago:</label>
                            <textarea wire:model="store.payment_methods" id="payment_methods" rows="3" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            @error('payment_methods') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Métodos de Envío -->
                        <div class="mb-4">
                            <label for="shipping_methods" class="block text-gray-700 text-sm font-bold mb-2">Métodos de Envío:</label>
                            <textarea wire:model="store.shipping_methods" id="shipping_methods" rows="3" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            @error('shipping_methods') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Teléfono -->
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                            <input wire:model="store.phone" type="number" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" placeholder="Teléfono">
                            @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo WhatsApp -->
                        <div class="mb-4">
                            <label for="whatsapp" class="block text-gray-700 text-sm font-bold mb-2">WhatsApp:</label>
                            <input wire:model="store.whatsapp" type="number" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="whatsapp" placeholder="WhatsApp">
                            @error('whatsapp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo País -->
                        <div class="mb-4">
                            <label for="country" class="block text-gray-700 text-sm font-bold mb-2">País:</label>
                            <select wire:model="store.country_id" id="country_id" class="shadow border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Seleccionar...</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                            @error('country_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Moneda -->
                        <div class="mb-4">
                            <label for="currency_id" class="block text-gray-700 text-sm font-bold mb-2">Moneda:</label>
                            <select wire:model="store.currency_id" id="currency_id" class="shadow border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Seleccionar...</option>
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} - {{ $currency->symbol }}</option>
                                @endforeach
                            </select>
                            @error('currency_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Dirección -->
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                            <input wire:model="store.address" type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" placeholder="Dirección">
                            @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Físico (Sí/No) -->
                        <div class="mb-4">
                            <label for="physical" class="block text-gray-700 text-sm font-bold mb-2">¿Es física la tienda?:</label>
                            <select wire:model="store.physical" id="physical" class="shadow border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="">Seleccionar...</option>
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                            </select>
                            @error('physical') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campo Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input wire:model="store.email" type="email" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="Email">
                            @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <!-- Campos de Redes Sociales (Facebook e Instagram) -->
                        <div class="mb-4">
                            <label for="facebook_url" class="block text-gray-700 text-sm font-bold mb-2">URL de Facebook:</label>
                            <input wire:model="store.facebook_url" type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="facebook_url" placeholder="URL de Facebook">
                            @error('facebook_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="instagram_url" class="block text-gray-700 text-sm font-bold mb-2">URL de Instagram:</label>
                            <input wire:model="store.instagram_url" type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="instagram_url" placeholder="URL de Instagram">
                            @error('instagram_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Guardar
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

