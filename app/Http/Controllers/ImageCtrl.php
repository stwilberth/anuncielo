<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Store;
use App\Models\ProductImage;
use Image;
use DB;

class ImageCtrl extends Controller
{

    public function add($store_url, $product_url)
    {
        $producto = Product::where('url', $product_url)->firstOrFail();
        //verificar que el producto pertenezca al usuario
        if ($producto->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: No tienes permisos para realizar esta acción.');
        }
        $title = $producto->name;

        return view('products.add_image', compact('producto', 'title'));
    }

    public function save(Request $request, $store_url, $product_url)
    {
        //dd($request->all());

        $Store = Store::where('url', $store_url)->firstOrFail();

        //store pertenece a usuario
        if ($Store->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: No tienes permisos para realizar esta acción.');
        }

        $Product = $Store->products->where('url', $product_url)->firstOrFail();

        $imageCount = $Product->images->count();

        //verificar que el producto no tenga mas de 5 imagenes
        if ($imageCount >= 5) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: El producto ya tiene 5 imágenes.');
        }
        // Validar la solicitud con condición
        $request->validate(
            [
            'img2' => 'required|image|mimes:jpeg,png,jpg,webp|max:8192',
            'input_rotation' => 'numeric|min:-180|max:270',
            // 'aspect_ratio' => 'required_if:imageCount,0|numeric',
            ],
            [
            'img2.max' => 'La imagen no puede ser mayor de 8 MB.',
            'img2.required' => 'La imagen es requerida.',
            'img2.image' => 'El archivo debe ser una imagen.',
            'img2.mimes' => 'El archivo debe ser una imagen en formato jpeg, png, jpg o webp.',
            'medidas_crop.required' => 'Las medidas de recorte son requeridas.',
            'medidas_crop.max' => 'Las medidas de recorte no pueden ser mayores de 255 caracteres.',
            'input_rotation.max' => 'El ángulo de rotación no puede ser mayor de 270 grados.',
            'input_rotation.min' => 'El ángulo de rotación no puede ser menor de -180 grados.',
            'input_rotation.numeric' => 'El ángulo de rotación debe ser un número.',
            ]
        );


        if ($request->hasFile('img2')) {
            try {
                $img = $request->file('img2');
                $name = $Product->name . ' - ' . $Product->images->count() + 1 ;
                $unique_name = Str::uuid()->toString() . '_' . time() . '.' . $img->getClientOriginalExtension();
                $img_crop = Image::make($img->getRealPath());
                $img_thumb = Image::make($img->getRealPath());

                $measure_w = 960;
                $measure_h = 720;
                $measure_thumb_w = 240;
                $measure_thumb_h = 180;


                if($request->button_rotation){
                    $img_crop->rotate($request->button_rotation);
                }

                if($img_crop->width() > $measure_w){
                    $img_crop->resize($measure_w, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img_thumb->resize($measure_thumb_w, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }


                $img_thumb_path = 'stores/'.$Product->store->url.'/products/thumb_'.$unique_name;
                $img_crop_path = 'stores/'.$Product->store->url.'/products/'.$unique_name;

                Storage::disk('public')->put($img_thumb_path, $img_thumb->encode());
                Storage::disk('public')->put($img_crop_path, $img_crop->encode());

                $Product->addImage($name, $unique_name, 3);

                return redirect()->back()->with('status', 'OK');

            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Error al guardar la imagen: ' . $th->getMessage());
            }
        } else {
            dd('no hay imagen');
            return redirect()->back()->with('error', 'Error al guardar la imagen: No se ha seleccionado ninguna imagen.');
        }
    }

    public function addImageCover($store_url)
    {
        $store = Store::where('url', $store_url)->firstOrFail();
        //verificar que la tienda pertenezca al usuario
        if ($store->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: No tienes permisos para realizar esta acción.');
        }
        $title = $store->name;

        return view('stores.add_image_cover', compact('store', 'title'));
    }

    public function saveImageCover(Request $request, $store_url)
    {
        //dd($request->all());

        $Store = Store::where('url', $store_url)->firstOrFail();
        //store pertenece a usuario
        if ($Store->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: No tienes permisos para realizar esta acción.');
        }

        //solo permitir una imagen de portada
        if ($Store->images->count() > 0) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: Ya existe una imagen de portada.');
        }


        //$imageCount = $Store->images->count();

        // Validar la solicitud con condición
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name' => 'required|string|max:255',
            'medidas_crop' => 'required|string|max:255',
            // 'aspect_ratio' => 'required_if:imageCount,0|numeric',
        ]);



        if ($request->hasFile('img')) {
            try {
                $crop = json_decode($request->medidas_crop);
                $img = $request->file('img');
                $name = $request->name;

                $w = (int)$crop->w;
                $h = (int)$crop->h;
                $x = (int)$crop->x;
                $y = (int)$crop->y;

                $unique_name = Str::uuid()->toString() . '_' . time() . '.' . $img->getClientOriginalExtension();

                // if($imageCount > 0){
                //     $aspectRatio = (int)$Product->images->first()->aspect_ratio;
                // }else{
                //     $aspectRatio = (int)$request->aspect_ratio;
                // }

                $aspectRatio = 5; //16:9

                if ($aspectRatio == 1) {
                    //aspectRatio = 1;
                    $measure_w = 960;
                    $measure_h = 960;
                    $measure_thumb_w = 240;
                    $measure_thumb_h = 240;
                } else if ($aspectRatio == 2) {
                    //aspectRatio = 3 / 2;
                    $measure_w = 960;
                    $measure_h = 640;
                    $measure_thumb_w = 240;
                    $measure_thumb_h = 160;
                } else if ($aspectRatio == 3) {
                    //aspectRatio = 4 / 3;
                    $measure_w = 960;
                    $measure_h = 720;
                    $measure_thumb_w = 240;
                    $measure_thumb_h = 180;
                } else if ($aspectRatio == 4) {
                    //aspectRatio = 16 / 9;
                    $measure_w = 960;
                    $measure_h = 540;
                    $measure_thumb_w = 240;
                    $measure_thumb_h = 135;
                } else if ($aspectRatio == 5) {
                    //aspectRatio = 16 / 6;
                    $measure_w = 1280;
                    $measure_h = 480;
                    $measure_thumb_w = 240;
                    $measure_thumb_h = 90;
                } else {
                    //error
                    return redirect()->back()->with('error', 'Error al guardar la imagen: No se ha seleccionado una Medida válida.');
                }

                $img_crop = Image::make($img->getRealPath())->crop($w, $h, $x, $y)->resize($measure_w, $measure_h);
                $img_thumb = Image::make($img->getRealPath())->crop($w, $h, $x, $y)->resize($measure_thumb_w, $measure_thumb_h);

                $img_thumb_path = 'stores/'.$Store->url.'/images/thumb_'.$unique_name;
                $img_crop_path = 'stores/'.$Store->url.'/images/'.$unique_name;

                Storage::disk('public')->put($img_thumb_path, $img_thumb->encode());
                Storage::disk('public')->put($img_crop_path, $img_crop->encode());

                $Store->addImage($name, $unique_name, $aspectRatio);

                return redirect()->back()->with('status', 'OK');

            } catch (\Throwable $th) {
                dd($th->getMessage());
                return redirect()->back()->with('error', 'Error al guardar la imagen: ' . $th->getMessage());
            }
        } else {
            dd('no hay imagen');
            return redirect()->back()->with('error', 'Error al guardar la imagen: No se ha seleccionado ninguna imagen.');
        }
    }

    public function update(Request $request)
    {
        $tour = Product::where('id', $request->id)->firstOrFail();
        if (false) {
            return redirect('/image-edit/'.$tour->slug)->with('status', 'OK');
        } else {
            return redirect('/image-edit/'.$tour->slug)->with('status', 'Aun no disponible');
        }
    }

    public function delete(Request $req)
    {
        $image = ProductImage::where('id', $req->id)->firstOrFail();
        $product = Product::where('id', $image->product_id)->firstOrFail();
        $store = Store::where('id', $product->store_id)->firstOrFail();

        //store pertenece a usuario
        if ($store->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Error al eliminar la imagen: No tienes permisos para realizar esta acción.');
        }

        //producto pertenece a usuario
        // if ($product->user_id != auth()->user()->id) {
        //     return redirect()->back()->with('error', 'Error al eliminar la imagen: No tienes permisos para realizar esta acción.');
        // }

        try {

            $image->delete();
            Storage::disk('public')->delete('stores/'.$store->url.'/products/'.$image->url);
            Storage::disk('public')->delete('stores/'.$store->url.'/products/thumb_'.$image->url);

            return redirect()->back()->with('status', 'OK');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al eliminar la imagen: ' . $th->getMessage());
        }
    }

}
