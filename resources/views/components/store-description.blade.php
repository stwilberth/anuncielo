                <div class="w-full mb-5 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                        <li class="me-2">
                            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Nosotros</button>
                        </li>
                        <li class="me-2">
                            <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Ubicación</button>
                        </li>
                        <li class="me-2">
                            <button id="contact-tab" data-tabs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Contacto</button>
                        </li>
                        <li class="me-2">
                            <button id="envio-tab" data-tabs-target="#envio" type="button" role="tab" aria-controls="envio" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Envio</button>
                        </li>
                        <li class="me-2">
                            <button id="pago-tab" data-tabs-target="#pago" type="button" role="tab" aria-controls="pago" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Pago</button>
                        </li>
                        @if($store->userIsOwner())
                        <li class="me-2">
                            <button id="admin-tab" data-tabs-target="#admin" type="button" role="tab" aria-controls="admin" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Administrar</button>
                        </li>
                        @endif
                    </ul>
                    <div id="defaultTabContent">
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Sobre nosotros</h2>
                            <p class="mb-3 text-gray-500 dark:text-gray-400">
                                {{ $store->description }}
                            </p>
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">
                            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">{{ $store->physical ? 'Es Tienda Física' : 'Es Tienda Virtual' }}</h2>
                            <!-- List -->
                            <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="leading-tight">País: {{ $store->country }}</span>
                                </li>
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="leading-tight">Dirección: {{ $store->address }}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            {{-- <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">We invest in the world’s potential</h2> --}}
                            <!-- List -->
                            <ul role="list" class="space-y-4 text-gray-500 dark:text-gray-400">
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="leading-tight">Teléfono: {{ $store->phone }}</span>
                                </li>
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="leading-tight">WhatsApp:
                                        <a href="https://wa.me/+506{{ $store->whatsapp }}?text=Buenas!" class="text-green-500">
                                            {{ $store->whatsapp }}
                                        </a>
                                    </span>
                                </li>
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                    <span class="leading-tight">Email: {{ $store->email }}</span>
                                </li>
                                @if($store->facebook_url)
                                <li class="flex space-x-2 rtl:space-x-reverse items-center">
                                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                                    </svg>
                                        <span class="leading-tight">Facebook: {{ $store->facebook_url }}</span>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="envio" role="tabpanel" aria-labelledby="envio-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Envio</h2>
                            <p class="mb-3 text-gray-500 dark:text-gray-400">
                                {{ $store->shipping_methods }}
                            </p>
                        </div>
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="pago" role="tabpanel" aria-labelledby="pago-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Metodos de Pago</h2>
                            <p class="mb-3 text-gray-500 dark:text-gray-400">
                                {{ $store->payment_methods }}
                            </p>
                        </div>
                        @if($store->userIsOwner())
                        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="admin" role="tabpanel" aria-labelledby="admin-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Administrar</h2>
                            <p class="mb-3 text-gray-500 dark:text-gray-400">
                                {{-- create product link --}}

                                @if($store->products->count() == 100)
                                    <span class="text-red-500">No puedes crear más productos, has llegado al límite de 100 productos.</span>
                                    <br>
                                    <span class="text-green-500">Para crear más productos debes actualizar tu plan.</span>
                                @else
                                    <a href="{{ route('stores.products.create', $store->url) }}" class="text-blue-600 hover:text-blue-700">
                                        Crear Producto
                                    </a>
                                @endif

                            </p>
                            <p class="mb-3 text-gray-500 dark:text-gray-400">
                                {{-- add images link --}}
                                <a href="{{ route('stores.addImageCover', $store->url) }}" class="text-blue-600 hover:text-blue-700">
                                @if($store->images->count() > 0)
                                    Actualizar Imagen de Portada
                                @else
                                    Agregar Imagen de Portada
                                @endif
                                </a>
                            </p>

                            {{-- edit store --}}
                            <a href="{{ route('stores.edit', $store->url) }}" class="text-blue-600 hover:text-blue-700">
                                Editar Tienda
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
