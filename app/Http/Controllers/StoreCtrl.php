<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreCtrl extends Controller
{
    //index
    public function index()
    {
        $stores = Store::paginate(25);
        return view('stores.index', compact('stores'));
    }

    //show
    public function show($url)
    {
        $store = Store::where('url', $url)->firstOrFail();
        $products = $store->products()->paginate(25);
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
