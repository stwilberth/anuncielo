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
    public function addImage($name, $url, $aspect_ratio = 0)
    {
        
        //si ya hay imagenes se usa el aspect ratio de la primera
        if ($this->images->count() > 0) {
            $aspect_ratio = $this->images->first()->aspect_ratio;
        }

        return $this->images()->create([
            'name' => $name,
            'url' => $url,
            'type' => 1,
            'aspect_ratio' => (int)$aspect_ratio
        ]);
    }

    //verificar si el usuario está logueado y es el dueño del producto
    public function userIsOwner()
    {
        return auth()->check() && (auth()->user()->id == $this->user_id);
    }
}
