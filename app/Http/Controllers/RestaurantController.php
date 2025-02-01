<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::where('active', true)
            ->with(['country'])
            ->orderBy('name')
            ->paginate(12);

        return view('restaurants.index', compact('restaurants'));
    }

    public function show($url)
    {
        $restaurant = Restaurant::where('url', $url)
            ->where('active', true)
            ->with(['country', 'currency'])
            ->firstOrFail();

        return view('restaurants.show', compact('restaurant'));
    }

    public function menu($url)
    {
        $restaurant = Restaurant::where('url', $url)
            ->where('active', true)
            ->with(['categories', 'items' => function($query) {
                $query->where('active', true)
                    ->with(['categories', 'images']);
            }])
            ->firstOrFail();

        return view('restaurants.menu', compact('restaurant'));
    }
}
