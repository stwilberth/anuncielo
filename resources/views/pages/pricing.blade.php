<x-app-layout>
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center flex-col">
                <x-pricing-section>
                    <x-slot:title>
                        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-amethyst-900 md:text-5xl lg:text-6xl dark:text-white">Precios</h1>
                    </x-slot:title>
                </x-pricing-section>
            </div>
        </div>
    </div>
</x-app-layout>
