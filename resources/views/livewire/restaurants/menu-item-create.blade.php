<?php

use function Livewire\Volt\{state, mount, rules};
use App\Models\Restaurant;
use App\Models\RestaurantItem;
use App\Models\RestaurantCategory;
use Livewire\WithFileUploads;

state([
    'restaurant' => null,
    'item' => null,
    'name' => '',
    'description' => '',
    'price' => 0,
    'active' => true,
    'selectedCategories' => [],
    'image' => null,
    'categories' => []
]);

rules([
    'name' => 'required|string|max:100',
    'description' => 'nullable|string|max:255',
    'price' => 'required|numeric|min:0',
    'selectedCategories' => 'array',
    'image' => 'nullable|image|max:2048'
]);

mount(function (Restaurant $restaurant, RestaurantItem $item = null) {
    $this->restaurant = $restaurant;
    $this->categories = $restaurant->categories;

    if ($item->exists) {
        $this->item = $item;
        $this->fill($item->toArray());
        $this->selectedCategories = $item->categories->pluck('id')->toArray();
    }
});

$save = function() {
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
};

?>

<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <form wire:submit="save" class="space-y-6">
        <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Menu Item Details</h3>
                    <p class="mt-1 text-sm text-gray-500">Add or edit a menu item for your restaurant.</p>
                </div>
                <div class="mt-5 space-y-6 md:col-span-2 md:mt-0">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" wire:model="name" id="name"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea wire:model="description" id="description" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                            @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" wire:model="price" id="price" step="0.01" min="0"
                                    class="pl-7 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            </div>
                            @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Categories</label>
                            <div class="mt-2 space-y-2">
                                @foreach($categories as $category)
                                    <div class="flex items-center">
                                        <input type="checkbox" wire:model="selectedCategories" value="{{ $category->id }}"
                                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        <label class="ml-2 text-sm text-gray-700">{{ $category->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('selectedCategories') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-6">
                            <label class="block text-sm font-medium text-gray-700">Item Image</label>
                            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="image" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input wire:model="image" id="image" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                </div>
                            </div>
                            @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-span-6">
                            <div class="flex items-start">
                                <div class="flex h-5 items-center">
                                    <input type="checkbox" wire:model="active" id="active"
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="active" class="font-medium text-gray-700">Active</label>
                                    <p class="text-gray-500">Enable or disable this menu item.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('restaurants.menu', $restaurant) }}"
                class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Cancel
            </a>
            <button type="submit"
                class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Save Item
            </button>
        </div>
    </form>
</div>
