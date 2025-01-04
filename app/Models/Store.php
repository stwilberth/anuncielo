<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'payment_methods',
        'shipping_methods',
        'url',
        'phone',
        'whatsapp',
        'country_id',
        'currency_id',
        'address',
        'physical',
        'email',
        'facebook_url',
        'instagram_url',
    ];

    //products
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //images
    public function images()
    {
        return $this->hasMany(StoreImage::class);
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

    //check if user is owner of the store
    public function userIsOwner()
    {
        return auth()->check() && (auth()->user()->id == $this->user_id);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

}
