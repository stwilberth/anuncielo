<?php

use function Livewire\Volt\{state, mount, layout};
use App\Models\Restaurant;

layout('layouts.app');

state(['restaurant' => null]);

mount(function (Restaurant $restaurant) {
    $this->restaurant = $restaurant->load(['country', 'currency']);
});

?>

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h1 class="text-3xl font-bold leading-tight text-gray-900">{{ $restaurant->name }}</h1>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $restaurant->description }}</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Dirección</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $restaurant->address }}</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Teléfono</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $restaurant->phone }}</dd>
                    </div>
                    @if($restaurant->whatsapp)
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">WhatsApp</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $restaurant->whatsapp }}</dd>
                        </div>
                    @endif
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $restaurant->email }}</dd>
                    </div>
                    @if($restaurant->facebook_url || $restaurant->instagram_url)
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Redes Sociales</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">
                                <div class="flex space-x-4">
                                    @if($restaurant->facebook_url)
                                        <a href="{{ $restaurant->facebook_url }}" target="_blank" rel="noopener noreferrer"
                                            class="text-blue-600 hover:text-blue-800">
                                            Facebook
                                        </a>
                                    @endif
                                    @if($restaurant->instagram_url)
                                        <a href="{{ $restaurant->instagram_url }}" target="_blank" rel="noopener noreferrer"
                                            class="text-pink-600 hover:text-pink-800">
                                            Instagram
                                        </a>
                                    @endif
                                </div>
                            </dd>
                        </div>
                    @endif
                </dl>
            </div>
        </div>

        <div class="mt-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-gray-900">Menú</h2>
                <a href="{{ route('restaurants.menu', ['restaurant' => $restaurant]) }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Ver Menú Completo
                </a>
            </div>
        </div>
    </div>
</div>
