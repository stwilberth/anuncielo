<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreCtrl extends Controller
{
    //index
    public function index()
    {
        $stores = Store::orderBy('created_at', 'desc')->get();
        $title = 'Tiendas';
        return view('stores.index', compact('stores', 'title'));
    }

    //show
    public function show($url)
    {
        $store = Store::where('url', $url)->firstOrFail();
        $products = $store->products()->get();
        return view('stores.show', compact('store', 'products'));
    }

    //store's products
    public function products($store_url)
    {
        $store = Store::where('url', $store_url)->firstOrFail();
        $products = $store->products()->paginate(25);
        return view('stores.products', compact('store', 'products'));
    }

}
