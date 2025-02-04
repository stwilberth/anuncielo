<x-app-layout>
    <x-slot name="meta_tags_layout">
        <meta name="description" content="{{ $store->description }}">
        <meta property="og:title" content="{{ $store->name }} | Anúncielo.com">
        <meta property="og:description" content="{{ $store->description }}">
        <meta property="og:url" content="{{ route('stores.show', $store->url) }}">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="es_CR">
        @if ($store->images->count() > 0)
            <meta property="og:image"
                content="{{ asset('storage/stores/' . $store->url . '/images') }}/thumb_{{ $store->images->first()->url }}">
        @endif
        <title>{{ $store->name }} | Anúncielo.com</title>
    </x-slot>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->name }}
        </h2>
    </x-slot> --}}

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4">
                        <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $store->name }}</h1>
                    </div>

                    <div
                        class="w-full mb-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 overflow-hidden">
                        @if ($store->images->count() > 0)
                            <img src="{{ asset('storage/stores/' . $store->url . '/images') }}/{{ $store->images->first()->url }}"
                                alt="{{ $store->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="grid grid-cols-1 w-full h-48 bg-gray-100 rounded-t-lg">
                                <div class="flex items-center justify-center w-full bg-gray-100 rounded-t-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                </div>
                                <div class="text-gray-500 dark:text-gray-400 flex justify-center">
                                    {{-- add images link --}}
                                    <a href="{{ route('dashboard.stores.addImageCover', $store->url) }}"
                                        class="text-blue-600 hover:text-blue-700">Agregar Imagen de Portada</a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div
                        class="w-full mb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
                            id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                            <li class="me-2">
                                <button id="about-tab" data-tabs-target="#about" type="button" role="tab"
                                    aria-controls="about" aria-selected="true"
                                    class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Nosotros</button>
                            </li>
                            <li class="me-2">
                                <button id="services-tab" data-tabs-target="#services" type="button" role="tab"
                                    aria-controls="services" aria-selected="false"
                                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Ubicación</button>
                            </li>
                            <li class="me-2">
                                <button id="contact-tab" data-tabs-target="#contact" type="button" role="tab"
                                    aria-controls="contact" aria-selected="false"
                                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Contacto</button>
                            </li>
                            <li class="me-2">
                                <button id="envio-tab" data-tabs-target="#envio" type="button" role="tab"
                                    aria-controls="envio" aria-selected="false"
                                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Envio</button>
                            </li>
                            <li class="me-2">
                                <button id="pago-tab" data-tabs-target="#pago" type="button" role="tab"
                                    aria-controls="pago" aria-selected="false"
                                    class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Pago</button>
                            </li>
                        </ul>
                        <div id="defaultTabContent">
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about"
                                role="tabpanel" aria-labelledby="about-tab">
                                <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                                    Sobre nosotros</h2>
                                <p class="mb-3 text-gray-500 dark:text-gray-400">
                                    {{ $store->description }}
                                </p>
                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services"
                                role="tabpanel" aria-labelledby="services-tab">
                                <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                                    {{ $store->physical ? 'Es Tienda Física' : 'Es Tienda Virtual' }}</h2>
                                <!-- List -->
                                <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                                    <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                        </svg>
                                        <span class="leading-tight">País: {{ $store->country->name }}</span>
                                    </li>
                                    <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                        </svg>
                                        <span class="leading-tight">Dirección: {{ $store->address }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="contact"
                                role="tabpanel" aria-labelledby="contact-tab">
                                {{-- <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">We invest in the world’s potential</h2> --}}
                                <!-- List -->
                                <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                                    <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                        </svg>
                                        <span class="leading-tight">Teléfono: {{ $store->phone }}</span>
                                    </li>
                                    <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                        </svg>
                                        <span class="leading-tight">WhatsApp:
                                            <a href="https://wa.me/{{ $store->whatsapp }}?text=Hola!"
                                                class="text-green-500">
                                                {{ $store->whatsapp }}
                                            </a>
                                        </span>
                                    </li>
                                    <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                        </svg>
                                        <span class="leading-tight">Email: {{ $store->email }}</span>
                                    </li>
                                    @if ($store->facebook_url)
                                        <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                            <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                            </svg>
                                            <span class="leading-tight">Facebook: {{ $store->facebook_url }}</span>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="envio"
                                role="tabpanel" aria-labelledby="envio-tab">
                                <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                                    Envio</h2>
                                <p class="mb-3 text-gray-500 dark:text-gray-400">
                                    {{ $store->shipping_methods }}
                                </p>
                            </div>
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="pago"
                                role="tabpanel" aria-labelledby="pago-tab">
                                <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                                    Metodos de Pago</h2>
                                <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                                    <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                        </svg>
                                        <span class="leading-tight">Moneda: {{ $store->currency->name }}</span>
                                    </li>
                                    <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                        <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                        </svg>
                                        <span class="leading-tight">Símbolo: {{ $store->currency->symbol }}</span>
                                    </li>
                                </ul>
                                <p class="mb-3 text-gray-500 dark:text-gray-400">
                                    {{ $store->payment_methods }}
                                </p>
                            </div>
                        </div>
                    </div>

                    @if ($store->userIsOwner())
                        <div class="flex justify-center items-center gap-2 md:gap-4 mb-4">
                            @if ($store->products->count() == 25)
                                <span class="text-red-500">Has llegado al límite de 25 productos, para crear más
                                    productos
                                    debes actualizar tu plan.</span>
                                <a href="{{ route('pricing') }}" class="text-blue-600 hover:text-blue-700">Actualizar
                                    Plan aquí <i class="fas fa-arrow-right"></i></a>
                            @else
                                <span class="text-green-500">Puedes crear más productos.</span>
                            @endif
                        </div>

                        <div class="flex justify-center items-center gap-2 md:gap-4 mb-4">
                            {{-- create product --}}
                            @if ($store->products->count() < 25)
                                <a href="{{ route('dashboard.products.create', $store->url) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                    Crear Producto
                                </a>
                            @endif
                            {{-- edit store --}}
                            <a href="{{ route('dashboard.stores.edit', $store->url) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                Editar Tienda
                            </a>
                            {{-- add image cover --}}
                            <a href="{{ route('dashboard.stores.addImageCover', $store->url) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                Imagen Portada
                            </a>
                        </div>
                    @endif

                    <x-products-grid :products="$store->products" :title="'Productos de ' . $store->name" />

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
