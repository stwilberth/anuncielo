                <div class="mt-6">
                    <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white text-center">Productos</h2>
                    <div class="mt-6">
                        <div class="grid md:grid-cols-4 grid-cols-3 gap-4">
                            @foreach ($store->products as $product)
                                <x-product :product="$product" />
                            @endforeach
                        </div>
                    </div>
                </div>
