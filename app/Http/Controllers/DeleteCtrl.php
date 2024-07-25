<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

// CREATE TABLE ads (
//     id BIGINT(20) unsigned AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     description VARCHAR(255),
//     price DECIMAL(10,2) NOT NULL,
//     currency VARCHAR(3) NOT NULL,
//     url VARCHAR(255) NOT NULL,
//     category_id BIGINT(20) unsigned NOT NULL,
//     user_id BIGINT(20) unsigned NOT NULL,
//     -- store_id BIGINT(20) unsigned NOT NULL,
//     -- business_id BIGINT(20) unsigned NOT NULL,
//     created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );


class DeleteCtrl extends Controller
{

    //delete ad
    public function ads($id)
    {
        $Ad = Ad::findOrfail($id);

        if (auth()->user()->id == $Ad->user_id) {
            $Ad->delete();
        } else {
            abort(403);
        }

        return redirect()->route('ads.index');
    }

    //delete
    public function products($store_url, $product_url)
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
                Storage::disk('public')->delete('stores/' . $store->url . '/products/' . $image->url);
                Storage::disk('public')->delete('stores/' . $store->url . '/products/thumb_' . $image->url);
                $image->delete();
            }
        }

        $product->delete();
        return redirect()->route('stores.show', $store_url);
    }
}
