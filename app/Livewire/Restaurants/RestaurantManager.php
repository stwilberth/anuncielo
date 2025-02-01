<?php

namespace App\Livewire\Restaurants;

use App\Models\Restaurant;
use App\Models\Country;
use App\Models\Currency;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;

class RestaurantManager extends Component
{
    use WithFileUploads;

    public $restaurant;
    #[Rule('required|string|max:100')]
    public $name = '';
    #[Rule('required|string|max:255')]
    public $description = '';
    #[Rule('required|string|max:255')]
    public $address = '';
    #[Rule('required|string|max:20')]
    public $phone = '';
    #[Rule('nullable|string|max:20')]
    public $whatsapp = '';
    #[Rule('required|email|max:255')]
    public $email = '';
    #[Rule('nullable|url|max:255')]
    public $facebook_url = '';
    #[Rule('nullable|url|max:255')]
    public $instagram_url = '';
    #[Rule('required')]
    public $country_id;
    #[Rule('required')]
    public $currency_id;
    public $active = true;

    public function mount(Restaurant $restaurant = null)
    {
        if ($restaurant->exists) {
            $this->restaurant = $restaurant;
            $this->fill($restaurant->toArray());
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
            'facebook_url' => $this->facebook_url,
            'instagram_url' => $this->instagram_url,
            'country_id' => $this->country_id,
            'currency_id' => $this->currency_id,
            'active' => $this->active,
            'url' => Str::slug($this->name),
            'user_id' => auth()->id(),
        ];

        if ($this->restaurant) {
            $this->restaurant->update($data);
        } else {
            $this->restaurant = Restaurant::create($data);
        }

        session()->flash('message', 'Restaurant saved successfully.');
        return redirect()->route('restaurants.show', $this->restaurant);
    }

    public function render()
    {
        return view('livewire.restaurants.restaurant-manager', [
            'countries' => Country::all(),
            'currencies' => Currency::all(),
        ]);
    }
}
