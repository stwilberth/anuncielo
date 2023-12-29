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
        $title = $producto->nombre;

        return view('products.add_image', compact('producto', 'title'));
    }

    public function save(Request $request, $store_url, $product_url)
    {
        //validate
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name' => 'required|string|max:255',
            'medidas_crop' => 'required|string|max:255',
        ]);

        $Store = Store::where('url', $store_url)->firstOrFail();

        //store pertenece a usuario
        if ($Store->user_id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: No tienes permisos para realizar esta acción.');
        }

        $Product = $Store->products->where('url', $product_url)->firstOrFail();

        //producto pertenece a usuario
        // if ($Product->user_id != auth()->user()->id) {
        //     return redirect()->back()->with('error', 'Error al guardar la imagen: No tienes permisos para realizar esta acción.');
        // }

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

                $img_crop = Image::make($img->getRealPath())->crop($w, $h, $x, $y)->resize(899, 567);
                $img_thumb = Image::make($img->getRealPath())->crop($w, $h, $x, $y)->resize(214, 135);

                $img_thumb_path = 'stores/'.$Product->store->url.'/products/thumb_'.$unique_name;
                $img_crop_path = 'stores/'.$Product->store->url.'/products/'.$unique_name;

                Storage::disk('public')->put($img_thumb_path, $img_thumb->encode());
                Storage::disk('public')->put($img_crop_path, $img_crop->encode());

                $Product->addImage($name, $unique_name);

                return redirect()->back()->with('status', 'OK');

            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Error al guardar la imagen: ' . $th->getMessage());
            }
        } else {
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
