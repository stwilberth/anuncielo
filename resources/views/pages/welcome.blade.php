<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-amethyst-900 md:text-5xl lg:text-6xl dark:text-white">
                Anúncielo.com</h1>
            <h2
                class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-amethyst-900 md:text-5xl lg:text-4xl dark:text-white">
                ¡Tu tienda virtual!</h2>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">
                "Crea tu tienda virtual gratis en minutos y vende sin comisiones. Gestiona tus ventas con total
                libertad, elige tus métodos de pago y conecta directamente con tus clientes. ¡Empieza a vender hoy mismo
                en Anúncielo.com!"
            </p>

            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-amethyst-500 hover:bg-amethyst-600 focus:ring-4 focus:ring-amethyst-300 dark:focus:ring-amethyst-900">
                        Panel de control
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('dashboard.stores.create') }}"
                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-amethyst-500 hover:bg-amethyst-600 focus:ring-4 focus:ring-amethyst-300 dark:focus:ring-amethyst-900">
                        <svg width="32px" height="32px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Edit / Add_Plus_Square"> <path id="Vector" d="M8 12H12M12 12H16M12 12V16M12 12V8M4 16.8002V7.2002C4 6.08009 4 5.51962 4.21799 5.0918C4.40973 4.71547 4.71547 4.40973 5.0918 4.21799C5.51962 4 6.08009 4 7.2002 4H16.8002C17.9203 4 18.4801 4 18.9079 4.21799C19.2842 4.40973 19.5905 4.71547 19.7822 5.0918C20.0002 5.51962 20.0002 6.07967 20.0002 7.19978V16.7998C20.0002 17.9199 20.0002 18.48 19.7822 18.9078C19.5905 19.2841 19.2842 19.5905 18.9079 19.7822C18.4805 20 17.9215 20 16.8036 20H7.19691C6.07899 20 5.5192 20 5.0918 19.7822C4.71547 19.5905 4.40973 19.2842 4.21799 18.9079C4 18.4801 4 17.9203 4 16.8002Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
                        <span class="ml-3">Crear Tienda<span>
                    </a>
                @endauth
                <a href="{{ route('stores.index') }}"
                    class="inline-flex justify-center items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-amethyst-900 rounded-lg border border-amethyst-500 hover:bg-amethyst-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <svg width="32px" height="32px" viewBox="0 -9 64 64" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>Store</title>
                            <desc>Created with Sketch.</desc>
                            <defs> </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                sketch:type="MSPage">
                                <g id="Store" sketch:type="MSLayerGroup" transform="translate(1.000000, 1.000000)"
                                    stroke="#b741b9" stroke-width="2">
                                    <path
                                        d="M52.9,0 L8.1,0 C6.9,0 6,2 6,2 C6,2 -0.6,15.9 0.4,16.1 C1.6,19 4.7,21.1 8.2,21.1 C11.7,21.1 14.5,19 15.8,16.1 L15.8,16.1 C17.1,19 19.9,21.1 23.4,21.1 C26.9,21.1 29.8,19 31.1,16.1 L31.1,16.1 C32.3,19 35.2,21.1 38.8,21.1 C42.3,21.1 45.1,19 46.4,16.1 L46.4,16.1 C47.6,19 50.5,21.1 54,21.1 C57.6,21.1 60.6,19 61.8,16.1 C62.7,15.9 55.1,2 55.1,2 C55.1,2 54.1,0 52.9,0 L52.9,0 Z"
                                        id="Shape" sketch:type="MSShapeGroup"> </path>
                                    <path
                                        d="M55.9,21.1 L55.9,42 C55.9,43.1 55,44 53.9,44 L8,44 C6.9,44 6,43.1 6,42 L6,21.1"
                                        id="Shape" sketch:type="MSShapeGroup"> </path>
                                    <rect id="Rectangle-path" sketch:type="MSShapeGroup" x="10" y="25" width="24.9"
                                        height="12.9"> </rect>
                                    <rect id="Rectangle-path" sketch:type="MSShapeGroup" x="39" y="24" width="12.9"
                                        height="19.9"> </rect>
                                    <path d="M15.7,16.1 L19.1,0" id="Shape" sketch:type="MSShapeGroup"> </path>
                                    <path d="M30.9,16.1 L30.9,0" id="Shape" sketch:type="MSShapeGroup"> </path>
                                    <path d="M46.3,16 L41.7,0.3" id="Shape" sketch:type="MSShapeGroup"> </path>
                                    <path d="M18.1,25.1 L18.1,38" id="Shape" sketch:type="MSShapeGroup"> </path>
                                    <path d="M27,25.1 L27,38" id="Shape" sketch:type="MSShapeGroup"> </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-3"> Ver tiendas<span>
                </a>
                <a href="{{ route('products.index') }}"
                    class="inline-flex justify-center items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-amethyst-900 rounded-lg border border-amethyst-500 hover:bg-amethyst-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <svg height="32px" width="32px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"
                        fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <style type="text/css">
                                .st0 {
                                    fill: rgb(183 65 185);
                                }
                            </style>
                            <g>
                                <path class="st0"
                                    d="M504.322,159.013c-4.707-4.715-11.331-7.679-18.532-7.672H314.7l82.55-84.035 c8.038-8.186,7.928-21.347-0.258-29.385c-8.195-8.046-21.348-7.929-29.386,0.258L256.43,151.341H26.21 c-7.21-0.007-13.824,2.956-18.532,7.672c-4.732,4.714-7.687,11.338-7.679,18.54v34.421c-0.008,7.202,2.947,13.825,7.679,18.532 c4.707,4.723,11.322,7.679,18.532,7.679h9.97L52.945,411.22v-0.039c1.814,19.486,10.931,36.752,24.46,49.066 c13.512,12.316,31.543,19.799,51.116,19.791h254.967c19.565,0.008,37.596-7.475,51.116-19.791 c13.52-12.315,22.638-29.58,24.451-49.066l-0.007,0.086l16.772-173.083h9.97c7.202,0,13.825-2.956,18.532-7.679 c4.73-4.707,7.678-11.331,7.678-18.532v-34.421C512,170.351,509.052,163.727,504.322,159.013z M437.465,409.133l-0.007,0.038 c-1.298,13.966-7.78,26.211-17.461,35.047c-9.704,8.812-22.489,14.129-36.509,14.137H128.52 c-14.028-0.008-26.822-5.325-36.517-14.137c-9.688-8.836-16.162-21.081-17.468-35.047L56.918,227.339h398.165L437.465,409.133z M490.317,211.973c-0.007,1.283-0.492,2.346-1.329,3.198c-0.852,0.837-1.915,1.322-3.198,1.322h-18.814H456.13H55.862h-9.93H26.21 c-1.282,0-2.353-0.485-3.198-1.322c-0.837-0.852-1.321-1.915-1.329-3.198v-34.421c0.008-1.283,0.492-2.354,1.329-3.206 c0.845-0.837,1.916-1.314,3.198-1.321h209.389c-5.599,8.155-4.739,19.384,2.564,26.562c8.188,8.038,21.347,7.929,29.394-0.258 l25.836-26.304H485.79c1.283,0.007,2.346,0.484,3.198,1.321c0.837,0.852,1.322,1.923,1.329,3.206V211.973z">
                                </path>
                                <path class="st0"
                                    d="M95.678,305.892c-1.439,0-2.815,0.602-3.777,1.666c-0.978,1.071-1.446,2.494-1.321,3.925l1.587,17.328 c0.243,2.635,2.456,4.66,5.098,4.66h24.616c1.423,0,2.768-0.594,3.745-1.626c0.962-1.032,1.455-2.424,1.368-3.848l-1.157-17.327 c-0.18-2.69-2.417-4.778-5.114-4.778H95.678z">
                                </path>
                                <path class="st0"
                                    d="M239.126,355.319h-23.779c-1.392,0-2.721,0.563-3.683,1.564c-0.969,1.001-1.477,2.346-1.438,3.738l0.594,17.32 c0.094,2.76,2.353,4.949,5.114,4.949h23.192c2.838,0,5.13-2.291,5.13-5.121v-17.32 C244.256,357.618,241.964,355.319,239.126,355.319z">
                                </path>
                                <path class="st0"
                                    d="M239.126,305.892h-25.468c-1.384,0-2.714,0.563-3.683,1.556c-0.962,1.001-1.485,2.354-1.431,3.738 l0.594,17.328c0.094,2.768,2.354,4.957,5.114,4.957h24.874c2.838,0,5.13-2.299,5.13-5.129v-17.327 C244.256,308.183,241.964,305.892,239.126,305.892z">
                                </path>
                                <path class="st0"
                                    d="M272.866,382.89h22.606c2.722,0,4.973-2.135,5.114-4.848l0.923-17.327c0.078-1.408-0.431-2.776-1.4-3.792 c-0.962-1.025-2.306-1.603-3.714-1.603h-23.529c-2.83,0-5.121,2.299-5.121,5.129v17.32 C267.745,380.599,270.036,382.89,272.866,382.89z">
                                </path>
                                <path class="st0"
                                    d="M272.866,333.471h25.241c2.714,0,4.966-2.142,5.114-4.855l0.923-17.336c0.07-1.4-0.431-2.776-1.401-3.793 c-0.969-1.024-2.306-1.595-3.722-1.595h-26.156c-2.83,0-5.121,2.291-5.121,5.122v17.327 C267.745,331.172,270.036,333.471,272.866,333.471z">
                                </path>
                                <path class="st0"
                                    d="M272.866,284.037h27.869c2.729,0,4.973-2.135,5.113-4.856l0.986-18.501c0.086-1.408-0.43-2.776-1.392-3.792 c-0.97-1.024-2.315-1.603-3.722-1.603h-28.854c-2.83,0-5.121,2.291-5.121,5.122v18.501 C267.745,281.738,270.036,284.037,272.866,284.037z">
                                </path>
                                <path class="st0"
                                    d="M212.571,284.037h26.555c2.838,0,5.13-2.299,5.13-5.129v-18.501c0-2.831-2.292-5.122-5.13-5.122h-27.188 c-1.392,0-2.713,0.571-3.682,1.564c-0.97,0.993-1.486,2.346-1.431,3.73l0.625,18.508 C207.543,281.848,209.803,284.037,212.571,284.037z">
                                </path>
                                <path class="st0"
                                    d="M152.392,284.037h26.422c1.392,0,2.714-0.571,3.69-1.572c0.962-0.993,1.478-2.345,1.432-3.73l-0.633-18.5 c-0.094-2.761-2.354-4.95-5.114-4.95h-27.04c-1.408,0-2.768,0.586-3.73,1.626c-0.978,1.032-1.478,2.424-1.376,3.839l1.236,18.501 C147.451,281.941,149.687,284.037,152.392,284.037z">
                                </path>
                                <path class="st0"
                                    d="M179.909,305.892h-25.374c-1.424,0-2.776,0.579-3.754,1.619c-0.962,1.032-1.454,2.432-1.36,3.838l1.15,17.328 c0.18,2.698,2.416,4.793,5.114,4.793h24.812c1.384,0,2.721-0.57,3.682-1.564c0.962-1.008,1.486-2.353,1.439-3.738l-0.594-17.328 C184.938,308.081,182.67,305.892,179.909,305.892z">
                                </path>
                                <path class="st0"
                                    d="M100.206,355.319c-1.439,0-2.807,0.602-3.784,1.673c-0.962,1.064-1.447,2.487-1.314,3.918l1.58,17.32 c0.25,2.643,2.463,4.66,5.113,4.66h23.373c1.423,0,2.776-0.586,3.746-1.626c0.97-1.032,1.462-2.424,1.368-3.839l-1.158-17.32 c-0.172-2.69-2.408-4.785-5.113-4.785H100.206z">
                                </path>
                                <path class="st0"
                                    d="M181.59,355.319h-23.764c-1.423,0-2.776,0.594-3.746,1.626c-0.97,1.032-1.462,2.424-1.368,3.848l1.158,17.312 c0.172,2.698,2.416,4.785,5.106,4.785h23.208c1.392,0,2.714-0.563,3.684-1.564c0.962-0.993,1.485-2.346,1.431-3.73l-0.587-17.328 C186.61,357.509,184.35,355.319,181.59,355.319z">
                                </path>
                                <path class="st0"
                                    d="M183.279,404.745h-22.16c-1.415,0-2.768,0.587-3.745,1.626c-0.962,1.032-1.455,2.424-1.368,3.839l1.072,15.983 c0.179,2.69,2.416,4.786,5.113,4.786h21.629c1.384,0,2.714-0.563,3.683-1.564c0.962-1.001,1.486-2.346,1.439-3.738l-0.548-15.983 C188.3,406.935,186.032,404.745,183.279,404.745z">
                                </path>
                                <path class="st0"
                                    d="M239.126,404.745h-22.097c-1.384,0-2.714,0.563-3.684,1.564c-0.962,1.001-1.485,2.346-1.439,3.73l0.548,15.991 c0.094,2.76,2.362,4.95,5.114,4.95h21.558c2.838,0,5.13-2.292,5.13-5.129v-15.983C244.256,407.036,241.964,404.745,239.126,404.745 z">
                                </path>
                                <path class="st0"
                                    d="M272.866,430.98h20.049c2.722,0,4.965-2.134,5.114-4.856l0.844-15.983c0.078-1.4-0.422-2.775-1.392-3.792 c-0.962-1.024-2.314-1.603-3.722-1.603h-20.894c-2.83,0-5.121,2.291-5.121,5.122v15.983 C267.745,428.688,270.036,430.98,272.866,430.98z">
                                </path>
                                <path class="st0"
                                    d="M326.688,430.98h23.122c2.698,0,4.942-2.095,5.113-4.786l1.064-15.983c0.102-1.415-0.399-2.807-1.377-3.839 c-0.954-1.039-2.315-1.626-3.73-1.626H327.54c-2.721,0-4.965,2.135-5.113,4.856l-0.853,15.982c-0.078,1.401,0.438,2.776,1.4,3.793 C323.943,430.401,325.288,430.98,326.688,430.98z">
                                </path>
                                <path class="st0"
                                    d="M329.26,382.89h23.763c2.69,0,4.927-2.088,5.106-4.785l1.158-17.312c0.094-1.424-0.407-2.815-1.368-3.848 c-0.97-1.032-2.323-1.626-3.746-1.626h-23.998c-2.721,0-4.965,2.127-5.113,4.856l-0.923,17.32c-0.07,1.4,0.43,2.776,1.4,3.8 C326.5,382.312,327.845,382.89,329.26,382.89z">
                                </path>
                                <path class="st0"
                                    d="M386.819,382.89h23.388c2.643,0,4.848-2.017,5.091-4.66l1.595-17.32c0.133-1.431-0.351-2.854-1.321-3.918 c-0.97-1.071-2.346-1.673-3.785-1.673h-23.81c-2.69,0-4.927,2.095-5.114,4.785l-1.149,17.32c-0.102,1.416,0.399,2.807,1.368,3.839 C384.051,382.304,385.412,382.89,386.819,382.89z">
                                </path>
                                <path class="st0"
                                    d="M390.111,333.471h24.616c2.651,0,4.863-2.025,5.106-4.66l1.587-17.328c0.133-1.431-0.351-2.854-1.313-3.925 c-0.978-1.063-2.346-1.666-3.793-1.666h-25.045c-2.69,0-4.926,2.088-5.106,4.778l-1.157,17.327 c-0.094,1.424,0.407,2.816,1.376,3.848C387.343,332.877,388.696,333.471,390.111,333.471z">
                                </path>
                                <path class="st0"
                                    d="M331.888,333.471h24.428c2.698,0,4.926-2.095,5.106-4.793l1.157-17.328c0.102-1.407-0.399-2.806-1.376-3.838 c-0.954-1.04-2.322-1.619-3.73-1.619H332.81c-2.729,0-4.973,2.127-5.113,4.848l-0.923,17.335c-0.086,1.392,0.43,2.768,1.392,3.792 C329.135,332.893,330.48,333.471,331.888,333.471z">
                                </path>
                                <path class="st0"
                                    d="M334.515,284.037h25.1c2.69,0,4.926-2.096,5.106-4.785l1.236-18.501c0.086-1.415-0.407-2.807-1.369-3.839 c-0.978-1.04-2.323-1.626-3.746-1.626H335.5c-2.722,0-4.965,2.127-5.114,4.856l-0.986,18.493c-0.07,1.408,0.43,2.784,1.4,3.792 C331.763,283.451,333.115,284.037,334.515,284.037z">
                                </path>
                                <path class="st0"
                                    d="M92.738,284.037h25.843c1.424,0,2.776-0.594,3.746-1.626c0.97-1.04,1.462-2.424,1.368-3.839l-1.236-18.508 c-0.179-2.69-2.416-4.778-5.106-4.778H91.05c-1.447,0-2.816,0.61-3.793,1.666c-0.962,1.063-1.446,2.494-1.313,3.925l1.697,18.501 C87.875,282.02,90.088,284.037,92.738,284.037z">
                                </path>
                                <path class="st0"
                                    d="M104.741,404.745c-1.446,0-2.814,0.61-3.784,1.674c-0.97,1.055-1.447,2.486-1.322,3.918l1.47,15.982 c0.234,2.643,2.448,4.661,5.098,4.661h22.184c1.415,0,2.768-0.594,3.738-1.626c0.969-1.04,1.462-2.425,1.368-3.84l-1.064-15.983 c-0.179-2.698-2.416-4.786-5.113-4.786H104.741z">
                                </path>
                                <path class="st0"
                                    d="M383.621,430.98h22.168c2.65,0,4.864-2.018,5.106-4.661l1.462-15.982c0.133-1.432-0.344-2.863-1.314-3.918 c-0.97-1.063-2.345-1.674-3.784-1.674h-22.582c-2.69,0-4.927,2.088-5.106,4.786l-1.064,15.983c-0.094,1.415,0.399,2.8,1.368,3.84 C380.845,430.386,382.198,430.98,383.621,430.98z">
                                </path>
                                <path class="st0"
                                    d="M393.411,284.037h25.851c2.643,0,4.856-2.017,5.098-4.66l1.69-18.501c0.133-1.431-0.336-2.862-1.314-3.925 c-0.97-1.055-2.346-1.666-3.777-1.666h-26.312c-2.698,0-4.934,2.088-5.106,4.778l-1.236,18.508 c-0.102,1.416,0.399,2.799,1.368,3.839C390.635,283.443,391.995,284.037,393.411,284.037z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-3">Ver productos<span>
                </a>
            </div>
        </div>
    </section>

    <x-pricing-section>
        <x-slot:title>
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-amethyst-900 md:text-4xl lg:text-5xl dark:text-white">Planes</h2>
        </x-slot:title>
    </x-pricing-section>
</x-app-layout>


