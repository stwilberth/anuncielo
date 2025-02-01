<?php

namespace App\Livewire\Restaurants;

use App\Models\Restaurant;
use App\Models\RestaurantItem;
use App\Models\RestaurantCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class MenuItemManager extends Component
{
    use WithFileUploads;

    public $restaurant;
    public $item;
    #[Rule('required|string|max:100')]
    public $name = '';
    #[Rule('nullable|string|max:255')]
    public $description = '';
    #[Rule('required|numeric|min:0')]
    public $price = 0;
    public $active = true;
    #[Rule('array')]
    public $selectedCategories = [];
    #[Rule('nullable|image|max:2048')]
    public $image;

    public function mount(Restaurant $restaurant, RestaurantItem $item = null)
    {
        $this->restaurant = $restaurant;
        if ($item->exists) {
            $this->item = $item;
            $this->fill($item->toArray());
            $this->selectedCategories = $item->categories->pluck('id')->toArray();
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'restaurant_id' => $this->restaurant->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'active' => $this->active,
        ];

        if ($this->item) {
            $this->item->update($data);
            $item = $this->item;
        } else {
            $item = RestaurantItem::create($data);
        }

        $item->categories()->sync($this->selectedCategories);

        if ($this->image) {
            $path = $this->image->store('restaurant-items', 'public');
            $item->images()->create([
                'url' => $path,
                'name' => $this->image->getClientOriginalName()
            ]);
        }

        session()->flash('message', 'Menu item saved successfully.');
        return redirect()->route('restaurants.menu', $this->restaurant);
    }

    public function render()
    {
        return view('livewire.restaurants.menu-item-manager', [
            'categories' => $this->restaurant->categories
        ]);
    }
}
