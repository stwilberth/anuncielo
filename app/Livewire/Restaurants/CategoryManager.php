<?php

namespace App\Livewire\Restaurants;

use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CategoryManager extends Component
{
    public $restaurant;
    public $category;
    #[Rule('required|string|max:100')]
    public $name = '';
    #[Rule('nullable|string')]
    public $description = '';
    public $active = true;

    public function mount(Restaurant $restaurant, RestaurantCategory $category = null)
    {
        $this->restaurant = $restaurant;
        if ($category->exists) {
            $this->category = $category;
            $this->fill($category->toArray());
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'restaurant_id' => $this->restaurant->id,
            'name' => $this->name,
            'description' => $this->description,
            'active' => $this->active,
        ];

        if ($this->category) {
            $this->category->update($data);
        } else {
            RestaurantCategory::create($data);
        }

        session()->flash('message', 'Category saved successfully.');
        return redirect()->route('restaurants.categories', $this->restaurant);
    }

    public function render()
    {
        return view('livewire.restaurants.category-manager');
    }
}
