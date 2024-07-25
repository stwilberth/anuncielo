<x-app-layout>

    <x-slot name="styles_layout">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css" rel="stylesheet">
    </x-slot>

    <div class="py-6">
            <x-toast type="{{ session('type') }}"  :message="session('message')" />

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="dark:bg-gray-800 overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form id="save" action="{{ route('saveImage', ['store_url' => $producto->store->url, 'product_url' => $producto->url]) }}" enctype="multipart/form-data" method="POST">@csrf
                        {{-- crop measures --}}
                        <input style="display: none" id="input_rotation" name="input_rotation" type="text">

                        {{-- boton centrado agregar imagen --}}
                        <div class="mt-2 flex justify-center">
                            <label for="img" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Agregar Imagen
                            </label>
                            <input type="file" id="img" name="img" accept="image/*" onchange="image_selected(this)" style="display: none;">
                        </div>

                        <input type="file" id="img2" name="img2" accept="image/*" style="display: none;">


                        {{-- crop --}}
                        <div class="mt-2 flex justify-center">
                            <div id="col" class="max-w-sm">
                                <img id="image_view" src="" alt="imagen" class="h-auto max-w-full rounded-lg" style="display: none;">
                            </div>
                        </div>

                        {{-- miniatura de imagen recortada --}}
                        {{-- <div class="mt-2 flex justify-center">
                            <div class="max-w-sm">
                                <img id="image_view_2" src="" alt="imagen" class="h-auto max-w-full rounded-lg" style="display: none;">
                            </div>
                        </div> --}}

                        {{-- edit buttons --}}
                        <div class="mt-2 flex justify-center gap-3" style="display:none" id="buttons">
                            <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                type="button"
                                onclick="location.reload()">
                                Cancelar
                            </button>
                            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button"
                                onclick="rotate()">
                                Rotar
                            </button>

                            {{-- <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                type="button"
                                onclick="crop_show()">
                                Recortar
                            </button> --}}


                            {{-- guardar --}}
                            <button class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                id="submitButton"
                                type="submit">
                                Guardar
                            </button>
                        </div>

                        {{-- mostrar errores --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-700" >{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>

            @if ($producto->images->count() > 0)
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-5">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4">
                        <livewire:products.editable-gallery :url_base="asset('storage/stores/' . $producto->store->url . '/products')" :images="$producto->images" />
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

    <x-slot name="scripts_layout">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.1/Sortable.min.js"></script>
        <script>
            var image_view, buttons, input_rotation, img_label, img;

            function start() {
                buttons = document.getElementById('buttons');
                input_rotation = document.getElementById('input_rotation');
                image_view = document.getElementById("image_view");
                img = document.getElementById("img");
                img_label = document.querySelector('label[for="img"]');
                input_rotation.value = 0;
            }

            //ocultar botones editar
            function hide_buttons_edit() {
                buttons.style.display = "none";
                image_view.style.display = "none";
                img_label.style.display = "block";
            }

            //mostrar botones editar
            function show_buttons_edit() {
                buttons.style.display = "flex";
                image_view.style.display = "flex";
                img_label.style.display = "none";
            }

            //mostrar imagen
            function show_image() {
                image_view.style.display = "flex";
            }

            //recortar la imagen
            let cropper;
            let aspectRatio = 1;
            function create_cropper (image_view) {
                var imgData = {
                    x: "",
                    y: "",
                    w: "",
                    h: ""
                }
                aspectRatio = 4 / 3;

                buttons.style.display = "flex";

                if(cropper) {
                    cropper.destroy();
                }

                cropper = new Cropper(image_view, {
                    aspectRatio: aspectRatio,
                    viewMode: 2,
                    movable: false, // Desactivar el desplazamiento
                    zoomable: false, // Desactivar el zoom
                    crop(e) {
                        var i = e.detail;
                        imgData.x = i.x;
                        imgData.y = i.y;
                        imgData.w = i.width;
                        imgData.h = i.height;
                        console.log(imgData);
                    },
                });
            }

            //rotar imagen
            function rotate() {
                cropper.rotate(90);
                let rotation = cropper.getData().rotate;
                // Actualizar un campo oculto en el formulario con el ángulo de rotación
                input_rotation.value = rotation;
            }

            //seleccionar y mostrar imagen
            function image_selected(e) {
                if (e.files.length > 0) {
                    let reader = new FileReader();
                    reader.readAsDataURL(e.files[0]);
                    reader.onloadend = function(){
                        image_view.src = reader.result;
                        show_buttons_edit();
                        show_image();
                        create_cropper(image_view);
                    }
                }
            }

            function dataURLtoFile(dataurl, filename) {
                var arr = dataurl.split(','),
                    mime = arr[0].match(/:(.*?);/)[1],
                    bstr = atob(arr[arr.length - 1]),
                    n = bstr.length,
                    u8arr = new Uint8Array(n);
                while(n--){
                    u8arr[n] = bstr.charCodeAt(n);
                }
                return new File([u8arr], filename, { type: mime });
            }


            //mostrar crop
            function crop_show() {
                let canvas = cropper.getCroppedCanvas();
                let dataURL = canvas.toDataURL();
                let img2 = document.getElementById("img2");
                let originalFilename = img.files[0].name;

                let file = dataURLtoFile(dataURL, originalFilename);
                // Crear un nuevo DataTransfer
                let dataTransfer = new DataTransfer();

                // Agregar el archivo al DataTransfer
                dataTransfer.items.add(file);

                // Asignar el DataTransfer al campo de archivo
                img2.files = dataTransfer.files;
            }

            document.getElementById('save').addEventListener('submit', function(event) {
                // Prevenir el envío predeterminado del formulario
                event.preventDefault();
                document.getElementById('submitButton').disabled = true;
                crop_show();
                // Envía el formulario manualmente
                this.submit();
            });




            //funcion principal
            window.onload = function() {
                start();
            };

        </script>
    </x-slot>
</x-app-layout>


