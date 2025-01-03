<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl font-bold mb-8 text-amethyst-900 dark:text-white">Sobre Anúncielo.com</h1>

                    <div class="space-y-8">
                        <!-- Sección Principal -->
                        <section>
                            <h2 class="text-2xl font-semibold mb-4 text-amethyst-800 dark:text-amethyst-200">Tu Plataforma de Comercio Electrónico Sin Comisiones</h2>
                            <p class="mb-4">
                                En Anúncielo.com, creemos que cada emprendedor merece la oportunidad de hacer crecer su negocio en línea sin preocuparse por comisiones que reducen sus ganancias. Nuestra plataforma está diseñada para eliminar las barreras tradicionales del comercio electrónico.
                            </p>
                        </section>

                        <!-- Beneficios Clave -->
                        <section class="grid md:grid-cols-2 gap-6">
                            <div class="bg-amethyst-50 dark:bg-gray-700 p-6 rounded-lg">
                                <h3 class="text-xl font-semibold mb-3 text-amethyst-800 dark:text-white">0% de Comisiones</h3>
                                <p>A diferencia de otras plataformas, no cobramos comisión por venta. Tus ganancias son 100% tuyas, permitiéndote mantener precios más competitivos y mayores márgenes de beneficio.</p>
                            </div>
                            <div class="bg-amethyst-50 dark:bg-gray-700 p-6 rounded-lg">
                                <h3 class="text-xl font-semibold mb-3 text-amethyst-800 dark:text-white">Control Total</h3>
                                <p>Tú decides cómo manejar tus ventas. Acuerda directamente con tus clientes los métodos de pago y envío que mejor funcionen para ambos.</p>
                            </div>
                        </section>

                        <!-- Cómo Funciona -->
                        <section class="mt-8">
                            <h2 class="text-2xl font-semibold mb-4 text-amethyst-800 dark:text-amethyst-200">¿Cómo Funciona?</h2>
                            <div class="grid md:grid-cols-3 gap-6">
                                <div class="border border-amethyst-200 dark:border-gray-600 p-4 rounded-lg">
                                    <h3 class="text-lg font-semibold mb-2">1. Crea tu Tienda</h3>
                                    <p>Regístrate y configura tu tienda en minutos. Personaliza tu perfil y comienza a subir tus productos.</p>
                                </div>
                                <div class="border border-amethyst-200 dark:border-gray-600 p-4 rounded-lg">
                                    <h3 class="text-lg font-semibold mb-2">2. Gestiona tus Productos</h3>
                                    <p>Sube fotos, establece precios y describe tus productos. Mantén tu inventario actualizado fácilmente.</p>
                                </div>
                                <div class="border border-amethyst-200 dark:border-gray-600 p-4 rounded-lg">
                                    <h3 class="text-lg font-semibold mb-2">3. Conecta con Clientes</h3>
                                    <p>Los compradores interesados te contactarán directamente. Acuerda los detalles de la venta de manera personalizada.</p>
                                </div>
                            </div>
                        </section>

                        <!-- Ventajas Adicionales -->
                        <section class="mt-8">
                            <h2 class="text-2xl font-semibold mb-4 text-amethyst-800 dark:text-amethyst-200">Ventajas de Anúncielo.com</h2>
                            <ul class="list-disc list-inside space-y-2 ml-4">
                                <li>Plataforma intuitiva y fácil de usar</li>
                                <li>Sin costos ocultos ni comisiones sorpresa</li>
                                <li>Exposición a compradores potenciales</li>
                                <li>Herramientas de gestión de productos</li>
                                <li>Soporte técnico disponible</li>
                                <li>Flexibilidad en métodos de pago y envío</li>
                            </ul>
                        </section>

                        <!-- Llamado a la Acción -->
                        <section class="mt-8 text-center">
                            <h2 class="text-2xl font-semibold mb-4 text-amethyst-800 dark:text-amethyst-200">¿Listo para Comenzar?</h2>
                            <p class="mb-6">Únete a la comunidad de vendedores exitosos en Anúncielo.com</p>
                            <a href="{{ route('register') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-amethyst-500 hover:bg-amethyst-600 focus:ring-4 focus:ring-amethyst-300">
                                Crear mi Tienda Ahora
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
