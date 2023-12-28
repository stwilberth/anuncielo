<x-app-layout>

    <x-slot name="styles_layout">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css" rel="stylesheet">
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subir Imagen
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4">
                        <h1 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $producto->name }}</h1>
                        <a href="{{ route('products.show', ['store_url' => $producto->store->url, 'product_url' => $producto->url]) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ver</a>

                        {{-- Subir imagen --}}
                        <div class="mt-2">
                            <form action="{{ route('imageSave') }}" enctype="multipart/form-data" method="POST">@csrf
                                <div>
                                    <div>
                                        <input type="file" id="inputImg" name="img" accept="image/*" onchange="onchace(this)">
                                    </div>



                                    <div class="mt-5">
                                        <div id="col"></div>
                                    </div>


                                    <div class="card-footer text-muted">
                                        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            style="display:none"
                                            id="upload_button" type="submit">
                                            Recortar y Subir
                                        </button>
                                    </div>
                                </div>

                                <input style="display: none" name="id" type="text" value="{{$producto->id}}">
                                <input style="display: none" id="medidas_crop" name="medidas_crop" type="text">
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts_layout">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.1/Sortable.min.js"></script>
        <script>
            var buttonsCrop, upload_button, inputMedidasCrop, image_show, imgs_sort, el, sortable, updateOrden;
            function update() {
                buttonsCrop = document.getElementsByClassName("cropx");
                upload_button = document.getElementById('upload_button');
                inputMedidasCrop = document.getElementById('medidas_crop');
                updateOrden = document.getElementById('updateOrden');
                image_show = "";
            }

            //recortar la imagen
            function croppear () {
                var imgData = {
                    resume: false,
                    order: "",
                    name: "",
                    x: "",
                    y: "",
                    width: "",
                    height: ""
                }
                var aspectRatio = 1 / 1;
                for (let i = 0; i < buttonsCrop.length; i++) {
                        buttonsCrop[i].style.display = "none";
                        upload_button.style.display = "inline-block";
                }
                var image_show = document.getElementById("image_show");
                var cropper = new Cropper(image_show, {aspectRatio: aspectRatio,
                    crop(e) {
                        var i = e.detail;
                        imgData.x = i.x;
                        imgData.y = i.y;
                        imgData.w = i.width;
                        imgData.h = i.height;
                        inputMedidasCrop.value = JSON.stringify(imgData);
                    },
                });
            }


            //seleccionar y mostrar imagen
            function onchace(e) {
                inputMedidasCrop.value = "";
                if (image_show) {
                    image_show.remove();
                }
                if (e.files.length > 0) {
                    let reader = new FileReader();
                    // Leemos el archivo subido y se lo pasamos a nuestro fileReader
                    reader.readAsDataURL(e.files[0]);
                    // Le decimos que cuando este listo ejecute el código interno
                    reader.onload = function(){
                        let preview = document.getElementById('col');
                        image = document.createElement('img');
                        image.src = reader.result;
                        image.id = "image_show";
                        image.classList.add("img-fluid");
                        preview.innerHTML = '';
                        preview.append(image);
                        for (let i = 0; i < buttonsCrop.length; i++) {
                            buttonsCrop[i].style.display = "inline-block";
                            upload_button.style.display = "none";
                        }

                        var imgData = {
                            resume: false,
                            order: "",
                            name: "",
                            x: "",
                            y: "",
                            width: "",
                            height: ""
                        }
                        var aspectRatio = 1 / 1;
                        for (let i = 0; i < buttonsCrop.length; i++) {
                                buttonsCrop[i].style.display = "none";
                                upload_button.style.display = "inline-block";
                        }
                        var image_show = document.getElementById("image_show");
                        var cropper = new Cropper(image_show, {aspectRatio: aspectRatio,
                            crop(e) {
                                var i = e.detail;
                                imgData.x = i.x;
                                imgData.y = i.y;
                                imgData.w = i.width;
                                imgData.h = i.height;
                                inputMedidasCrop.value = JSON.stringify(imgData);
                            },
                        });

                        upload_button.style.display = "block";

                    }
                }

            }

            //funcion principal
            window.onload = function() {
                update();
            };

        </script>
    </x-slot>
</x-app-layout>


