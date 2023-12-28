<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Str;

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

}
