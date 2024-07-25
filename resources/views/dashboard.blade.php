<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid lg:grid-cols-2 gap-6 sm:grid-cols-1">


                    <a href="{{ route('stores.user') }}" class="bg-red-300 text-white block max-w-sm p-6 border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-700 dark:text-white">Mis Tiendas</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            Se muestran todas las tiendas que has creado en Anúncielo.com
                        </p>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
