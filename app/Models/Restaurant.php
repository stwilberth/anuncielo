<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    protected $fillable = [
        'user_id',
        'country_id',
        'currency_id',
        'active',
        'url',
        'name',
        'description',
        'phone',
        'whatsapp',
        'address',
        'email',
        'facebook_url',
        'instagram_url',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(RestaurantItem::class);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(RestaurantCategory::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(RestaurantImage::class);
    }
}
