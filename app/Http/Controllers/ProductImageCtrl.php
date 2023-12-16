<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductImage;
use Image;

class ProductImageCtrl extends Controller
{
    //

    public function edit(Request $request)
    {
        $slug = Str::after(url()->full(), 'image-edit/');
        $producto = Product::where('slug', $slug)->firstOrFail();
        $title = $producto->nombre;

        return view('image.product_edit', compact('producto', 'title'));
    }

    public function save(Request $request)
    {
        $Producto = Product::where('id', $request->id)->firstOrFail();

        if ($request->hasFile('img')) {
            try {
                function numberToLetters($number) {
                    $cadena1 = strval($number);
                    $letters = 'abcdefghijklmnopqrstuvwxyz';
                    $cadena2 = '';
                    foreach (str_split($cadena1) as $numero) {
                        foreach (str_split($letters) as $i => $letter) {
                            if($numero == $i) {
                                $cadena2 .= $letter;
                            }
                        }
                    }

                    return $cadena2;
                }

                $uniqueName = numberToLetters(time()).uniqid();
                $crop = json_decode($request->medidas_crop);
                $img = $request->file('img');

                $w = (int)$crop->w;
                $h = (int)$crop->h;
                $x = (int)$crop->x;
                $y = (int)$crop->y;

                $ruta = $Producto->id.'_'.$uniqueName.'.'.$img->getClientOriginalExtension();

                $img_crop = Image::make($img->getRealPath())->crop($w, $h, $x, $y)->resize(720, 720);
                $img_thumb = Image::make($img->getRealPath())->crop($w, $h, $x, $y)->resize(255, 255);

                $Producto->addImagen($ruta, $img->getClientOriginalName());

                $img_thumb->save(public_path('/storage/productos/thumb_' . $ruta));
                $img_crop->save(public_path('/storage/productos/' . $ruta));

                $Producto->save();

                return redirect('/image-edit/'.$Producto->slug)->with('status', 'OK');

            } catch (\Throwable $th) {
                return redirect('/image-edit/'.$Producto->slug)->with('status', 'Error al guardar la imagen');
            }
        } else {
            return redirect('/image-edit/'.$Producto->slug)->with('status', 'Tienes que seleccionar una imagen');
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
        if (true) {
            $imagen = ProductImage::findOrFail($req->id);
            //$producto = $imagen->producto;
            $producto = Product::findOrFail($req->producto_id);

            try {
                $img_host = public_path('/storage/productos/' . $imagen->ruta);
                $img_host_thumb = public_path('/storage/productos/thumb_' . $imagen->ruta);
                unlink($img_host);
                unlink($img_host_thumb);
                $imagen->delete();
            } catch (\Throwable $th) {
                return redirect('/image-edit/'.$producto->slug)->with('status', 'Error al eliminar la imagen');
            }

            return redirect('/image-edit/'.$producto->slug)->with('status', 'OK');
        }
    }

}
