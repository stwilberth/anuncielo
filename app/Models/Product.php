<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    //images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    //images
    public function imagenes()
    {
        return $this->hasMany(ProductImage::class);
    }

    //categories
    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    //add image
    public function addImage($name, $url)
    {
        return $this->images()->create([
            'name' => $name,
            'url' => $url,
            'type' => 1,
        ]);
    }
}
