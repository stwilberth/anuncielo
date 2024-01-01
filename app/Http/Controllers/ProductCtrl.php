<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductCtrl extends Controller
{
    //index
    public function index()
    {
        //get all products from all stores with pagination
        $products = Product::paginate(25);
        return view('products.index', compact('products'));
    }

    //show
    public function show($store_url, $product_url)
    {
        $store = Store::where('url', $store_url)->firstOrFail();
        $product = $store->products->where('url', $product_url)->firstOrFail();
        return view('products.show', compact('store', 'product'));
    }

    //delete
    public function delete($store_url, $product_url)
    {
        $store = Store::where('url', $store_url)->firstOrFail();

        //verificar que la tienda pertenezca al usuario
        if ($store->user_id != auth()->user()->id) {
            return redirect()->route('stores.index');
        }

        //verificar que el producto pertenezca a la tienda
        $product = $store->products->where('url', $product_url)->firstOrFail();


        $images = $product->images;
        if ($product->images->count() > 0) {
            foreach ($images as $image) {
                Storage::disk('public')->delete('stores/'.$store->url.'/products/'.$image->url);
                Storage::disk('public')->delete('stores/'.$store->url.'/products/thumb_'.$image->url);
                $image->delete();
            }
        }

        $product->delete();
        return redirect()->route('stores.show', $store_url);
    }

}
