<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('active', function (Builder $builder) {
            $builder->where('active', true);
        });
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'url';
    }

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
