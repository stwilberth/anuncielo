<?php

use function Livewire\Volt\{state, mount, layout};
use App\Models\Restaurant;
use App\Models\Country;
use App\Models\Currency;

layout('layouts.app');

state([
    'restaurant' => null,
    'countries' => [],
    'currencies' => [],
]);

mount(function (Restaurant $restaurant) {
    $this->restaurant = $restaurant;
    $this->countries = Country::orderBy('name')->get();
    $this->currencies = Currency::orderBy('name')->get();
});

?>

<div>
    <livewire:restaurants.restaurant-manager :restaurant="$restaurant" />
</div>
