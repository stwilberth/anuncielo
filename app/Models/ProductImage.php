<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    //fillable
    protected $fillable = [
        'product_id',
        'url',
        'name',
        'type'
    ];

    //product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
