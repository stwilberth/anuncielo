<?php

use function Livewire\Volt\{layout, state, mount};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Currency;
use App\Models\Country;
use App\Models\Store;

state([
    'name' => '',
    'whatsapp' => '',
    'country_id' => '',
    'currency_id' => '',
    'currencies' => Currency::all(),
    'countries' => Country::all(),
]);

layout('layouts.app');

mount(function () {
    //si el usuario tiene una tienda, no puede crear otra
    if (Store::where('user_id', Auth::id())->exists()) {
        session()->flash('message-type', 'error');
        session()->flash('message', 'No puedes crear Más de una tienda.');
        return redirect()->route('dashboard.stores.index');
    }
});

$validateForm = function () {
    $this->validate([
        'name' => 'required|max:255',
        'whatsapp' => 'required|max:20',
        'country_id' => 'required|exists:countries,id',
        'currency_id' => 'required|exists:currencies,id',
    ]);
};


$create = function () {
    $this->validateForm();

    $baseUrl = Str::slug($this->name);
    $url = $baseUrl;
    $counter = 1;

    while (Store::where('url', $url)->exists()) {
        $url = $baseUrl . '-' . $counter;
        $counter++;
    }

    $store = new Store();
    $store->name = $this->name;
    $store->description = 'Aún no se ha configurado';
    $store->payment_methods = 'Aún no se ha configurado';
    $store->shipping_methods = 'Aún no se ha configurado';
    $store->url = $url;
    $store->whatsapp = $this->whatsapp;
    $store->country_id = $this->country_id;
    $store->currency_id = $this->currency_id;
    $store->address = 'Aún no se ha configurado';
    $store->physical = 0;
    $store->email = Auth::user()->email;
    $store->user_id = Auth::id();
    $store->save();

    //redirect to new store
    return redirect()->route('stores.index')->with('message', 'Store created successfully.');
};



?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-semibold mb-4">Crear Tienda</h1>
                    <form wire:submit.prevent="create">
                            <!-- Campo Nombre -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la tienda:</label>
                                <input wire:model.live="name" id="name" placeholder="Nombre" type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo Descripción -->
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción de la tienda:</label>
                                <input wire:model="description" id="description" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" maxlength="1000">
                                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo WhatsApp -->
                            <div class="mb-4">
                                <label for="whatsapp" class="block text-gray-700 text-sm font-bold mb-2">WhatsApp:</label>
                                <input wire:model.live="whatsapp" type="number" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="whatsapp" placeholder="WhatsApp">
                                @error('whatsapp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo País -->
                            <div class="mb-4">
                                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">País:</label>
                                <select wire:model="country_id" id="country_id" class="shadow border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="">Seleccionar país...</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                                @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo Moneda -->
                            <div class="mb-4">
                                <label for="currency_id" class="block text-gray-700 text-sm font-bold mb-2">Moneda:</label>
                                <select wire:model="currency_id" id="currency_id" class="shadow border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="">Seleccionar moneda...</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->id }}">{{ $currency->name }} ({{ $currency->symbol }})</option>
                                    @endforeach
                                </select>
                                @error('currency_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                {{-- show all errors --}}
                                @error('*')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Crear
                                </button>
                            </div>

                    </form>
            </div>
        </div>
    </div>
</div>

