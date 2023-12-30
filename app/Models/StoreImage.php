<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'store_id',
        'url',
        'type',
        'aspect_ratio'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
