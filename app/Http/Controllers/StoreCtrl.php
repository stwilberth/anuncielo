<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;

class StoreCtrl extends Controller
{
    //index
    public function index()
    {
        // $stores = Store::paginate(10);
        $stores = Store::all();
        return view('stores.index', compact('stores'));
    }

    //show
    public function show($url)
    {
        $store = Store::where('url', $url)->firstOrFail();
        return view('stores.show', compact('store'));
    }

}
