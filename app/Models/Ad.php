<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'currency',
        'url',
        'category_id',
        'user_id',
    ];

    //check if auth user is owner of the ad
    public function isOwner()
    {
        return auth()->user()->id == $this->user_id;
    }

    //get user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //get images
    public function images()
    {
        return $this->hasMany(AdImage::class);
    }

    //get category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
