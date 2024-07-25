<?php

use function Livewire\Volt\{layout, state, mount};
use Illuminate\Support\Facades\DB;
use App\Models\Store;


state([
    'name' => '',
    'description' => '',
    'payment_methods' => '',
    'shipping_methods' => '',
    'url' => '',
    'phone' => '',
    'whatsapp' => '',
    'country' => 'Costa Rica',
    'address' => '',
    'physical' => '',
    'email' => '',
    'facebook_url' => '',
    'instagram_url' => '',
    'url_valid' => false,
]);

layout('layouts.app');

mount(function () {
    //si el usuario tiene una tienda, no puede crear otra
    if (Store::where('user_id', Auth::id())->exists()) {
        session()->flash('message-type', 'error');
        session()->flash('message', 'No puedes crear Más de una tienda.');
        return redirect()->route('stores.index');
    }
});

$validateForm = function () {
    $this->validate([
        'name' => 'required|max:255',
        'description' => 'required|max:1000',
        'payment_methods' => 'required|max:255',
        'shipping_methods' => 'required|max:255',
        'url' => [
            'required',
            'max:255',
            'unique:stores',
            'regex:/^[a-z0-9_-]+$/'
        ],
        'phone' => 'nullable|max:20',
        'whatsapp' => 'required|max:20',
        'country' => 'required|max:10',
        'address' => 'required|max:255',
        'physical' => 'required|boolean',
        'email' => 'required|email|max:255',
        'facebook_url' => 'nullable|url|max:255',
        'instagram_url' => 'nullable|url|max:255',
    ]);
};


$create = function () {

    $this->validateForm();

        $store = new Store();
        $store->name = $this->name;
        $store->description = $this->description;
        $store->payment_methods = $this->payment_methods;
        $store->shipping_methods = $this->shipping_methods;
        $store->url = $this->url;
        $store->phone = $this->phone;
        $store->whatsapp = $this->whatsapp;
        $store->country = 'Costa Rica';
        $store->address = $this->address;
        $store->physical = $this->physical;
        $store->email = $this->email;
        $store->facebook_url = $this->facebook_url;
        $store->instagram_url = $this->instagram_url;
        $store->user_id = Auth::id();
        $store->save();

    //redirect to new store
    return redirect()->route('stores.index')->with('message', 'Store created successfully.');
};

$checkUrl = function () {
    $this->url_valid = false;

    $customMessages = [
        'url.regex' => 'El campo URL solo puede contener letras minúsculas sin acentos, números, guiones bajos (_) y guiones (-).',
        'url.unique' => 'La URL ya está en uso.',
        'url.max' => 'La URL no puede tener más de 255 caracteres.',
        'url.required' => 'La URL es obligatoria.',
    ];

    $this->validate([
        'url' => [
            'required',
            'max:255',
            'unique:stores',
            'regex:/^[a-z0-9_-]+$/'
        ],
    ], $customMessages);

    $this->url_valid = true;
};


?>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="p-4">
                    <h1 class="text-2xl font-semibold mb-4">Crear Tienda</h1>
                    Tienda de prueba

                </div>
                <div>
                    <form wire:submit.prevent="create">
                        <div x-data="{
                                name: '',
                                url: '' ,
                                updateUrl() {
                                    function removeAccents(text) {
                                        return text.normalize('NFD').replace(/[\u0300-\u036f]/g, '');
                                    }

                                    let nameWithoutAccents = removeAccents(this.name.toLowerCase());
                                    this.url = nameWithoutAccents.replace(/[^a-z0-9_-]/g, '-');
                                    $wire.url = this.url;
                                }
                            }">
                            <!-- Campo Nombre -->
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                                <input
                                    wire:model="name"
                                    x-model="name"
                                    @input="updateUrl()"
                                    {{-- @input="url = name.toLowerCase().replace(/[^a-z0-9_-]/g, '-'); $wire.url = url;" --}}
                                    id="name"
                                    placeholder="Nombre"
                                    type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            <!-- Campo URL -->
                            <label for="url" class="block text-gray-700 text-sm font-bold mb-2">URL:</label>
                            <div class="mb-4 flex">
                                <div class="flex items-center w-full text-gray-700 leading-tight">
                                    <input
                                        wire:model="url"
                                        x-model="url"
                                        type="text"
                                        class="flex-grow shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 @if($this->url_valid) text-green-500 @else text-gray-700 @error('url') text-red-500 @enderror @endif leading-tight focus:outline-none focus:shadow-outline"
                                        id="url"
                                        placeholder="nombre-de-tienda-con-guiones"
                                        required>
                                    {{-- checkurl button --}}
                                </div>
                            </div>
                                <span class="block text-gray-700 text-sm font-bold mb-2">https://anuncielo.com/stores/<strong x-text="url"></strong> </span>
                                @if ($this->url_valid)
                                    <p class="mt-2 text-sm text-green-600 dark:text-green-500">¡Perfecto, la URL está disponible! </p>
                                @endif
                                @error('url')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                                @enderror

                            <div class="mb-4 flex justify-center mt-3">
                            <button
                                wire:click.prevent="checkUrl"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold mt-5 py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                >Verificar
                            </button>
                            </div>
                        </div>

                        @if ($url_valid)
                            <!-- Campo Descripción -->
                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                                <textarea wire:model="description" id="description" rows="3" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo Métodos de Pago -->
                            <div class="mb-4">
                                <label for="payment_methods" class="block text-gray-700 text-sm font-bold mb-2">Métodos de Pago:</label>
                                <textarea wire:model="payment_methods" id="payment_methods" rows="3" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                @error('payment_methods') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo Métodos de Envío -->
                            <div class="mb-4">
                                <label for="shipping_methods" class="block text-gray-700 text-sm font-bold mb-2">Métodos de Envío:</label>
                                <textarea wire:model="shipping_methods" id="shipping_methods" rows="3" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                                @error('shipping_methods') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo Teléfono -->
                            <div class="mb-4">
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                                <input wire:model="phone" type="number" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" placeholder="Teléfono">
                                @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo WhatsApp -->
                            <div class="mb-4">
                                <label for="whatsapp" class="block text-gray-700 text-sm font-bold mb-2">WhatsApp:</label>
                                <input wire:model="whatsapp" type="number" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="whatsapp" placeholder="WhatsApp">
                                @error('whatsapp') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo País -->
                            <div class="mb-4">
                                <label for="country" class="block text-gray-700 text-sm font-bold mb-2">País:</label>
                                <input wire:model="country" type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country" placeholder="País" disabled>
                                @error('country') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo Dirección -->
                            <div class="mb-4">
                                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Dirección:</label>
                                <input wire:model="address" type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" placeholder="Dirección">
                                @error('address') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo Físico (Sí/No) -->
                            <div class="mb-4">
                                <label for="physical" class="block text-gray-700 text-sm font-bold mb-2">¿Es física la tienda?:</label>
                                <select wire:model="physical" id="physical" class="shadow border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    <option value="">Seleccionar...</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                </select>
                                @error('physical') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campo Email -->
                            <div class="mb-4">
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                <input wire:model="email" type="email" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" placeholder="Email">
                                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Campos de Redes Sociales (Facebook e Instagram) -->
                            <div class="mb-4">
                                <label for="facebook_url" class="block text-gray-700 text-sm font-bold mb-2">URL de Facebook:</label>
                                <input wire:model="facebook_url" type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="facebook_url" placeholder="URL de Facebook">
                                @error('facebook_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="instagram_url" class="block text-gray-700 text-sm font-bold mb-2">URL de Instagram:</label>
                                <input wire:model="instagram_url" type="text" class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="instagram_url" placeholder="URL de Instagram">
                                @error('instagram_url') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Crear
                                </button>
                            </div>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

