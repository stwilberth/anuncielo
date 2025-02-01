<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ProductCtrl;
use App\Http\Controllers\StoreCtrl;
use App\Http\Controllers\ImageCtrl;
use App\Http\Controllers\RestaurantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Volt::route('/dashboard/stores', 'stores.index')->name('dashboard.stores.index')->middleware(['auth']);
Volt::route('/dashboard/stores/create', 'stores.create')->name('dashboard.stores.create')->middleware(['auth']);
Volt::route('/dashboard/stores/{store_url}/edit', 'stores.edit')->name('dashboard.stores.edit')->middleware(['auth']);
Volt::route('/dashboard/stores/{store_url}/products/create', 'products.create')->name('dashboard.products.create')->middleware(['auth']);
Volt::route('/dashboard/stores/{store_url}/products/{product_url}/edit', 'products.edit')->name('dashboard.products.edit')->middleware(['auth']);
Route::delete('/dashboard/stores/{store_url}/products/{product_url}/delete', [ProductCtrl::class, 'delete'])->name('dashboard.products.delete')->middleware(['auth']);
//show user's products (no volt)
Route::get('/dashboard/products', [ProductCtrl::class, 'userProducts'])->name('dashboard.products.index')->middleware(['auth']);


Route::get('stores', [StoreCtrl::class, 'index'])->name('stores.index');
Route::get('stores/{url}', [StoreCtrl::class, 'show'])->name('stores.show');
Route::get('stores/{store_url}/products', [StoreCtrl::class, 'products'])->name('products.store.index');
Route::get('stores/{store_url}/products/{product_url}', [ProductCtrl::class, 'show'])->name('products.show');
Route::get('products', [ProductCtrl::class, 'index'])->name('products.index');


//edicion de imagenes de productos
Route::get('stores/{store_url}/products/{product_url}/add-image', [ImageCtrl::class, 'add'])->name('addImage')->middleware(['auth']);
Route::post('stores/{store_url}/products/{product_url}/save-image', [ImageCtrl::class, 'save'])->name('saveImage')->middleware(['auth']);
// Route::post('/image-update', [ImageCtrl::class, 'update'])->name('imageUpdate')->middleware(['auth']);
// Route::post('/image-delete', [ImageCtrl::class, 'delete'])->name('imageDelete')->middleware(['auth']);

//edicion de imagenes de portada
Route::get('stores/{store_url}/add-image', [ImageCtrl::class, 'addImageCover'])->name('dashboard.stores.addImageCover')->middleware(['auth']);
Route::post('stores/{store_url}/save-image', [ImageCtrl::class, 'saveImageCover'])->name('dashboard.stores.saveImageCover')->middleware(['auth']);

// Restaurant routes
Volt::route('/dashboard/restaurants', 'restaurants.index')->name('dashboard.restaurants.index')->middleware(['auth']);
Volt::route('/dashboard/restaurants/create', 'restaurants.create')->name('dashboard.restaurants.create')->middleware(['auth']);
Volt::route('/dashboard/restaurants/{restaurant}/edit', 'restaurants.edit')->name('dashboard.restaurants.edit')->middleware(['auth']);
Volt::route('/dashboard/restaurants/{restaurant}/menu', 'restaurants.menu')->name('dashboard.restaurants.menu')->middleware(['auth']);
Volt::route('/dashboard/restaurants/{restaurant}/menu/create', 'restaurants.menu-item.create')->name('dashboard.restaurants.menu-item.create')->middleware(['auth']);
Volt::route('/dashboard/restaurants/{restaurant}/menu/{item}/edit', 'restaurants.menu-item.edit')->name('dashboard.restaurants.menu-item.edit')->middleware(['auth']);
Volt::route('/dashboard/restaurants/{restaurant}/categories', 'restaurants.categories')->name('dashboard.restaurants.categories')->middleware(['auth']);
Volt::route('/dashboard/restaurants/{restaurant}/categories/create', 'restaurants.category.create')->name('dashboard.restaurants.category.create')->middleware(['auth']);
Volt::route('/dashboard/restaurants/{restaurant}/categories/{category}/edit', 'restaurants.category.edit')->name('dashboard.restaurants.category.edit')->middleware(['auth']);

// Public restaurant routes
Route::get('restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('restaurants/{url}', [RestaurantController::class, 'show'])->name('restaurants.show');
Route::get('restaurants/{url}/menu', [RestaurantController::class, 'menu'])->name('restaurants.menu');

//pages
Route::view('/', 'pages.welcome')->name('welcome');
Route::view('dashboard', 'pages.dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('pricing', 'pages.pricing')->name('pricing');
Route::view('about', 'pages.about')->name('about');
Route::view('profile', 'pages.profile')->middleware(['auth'])->name('profile');

require __DIR__.'/auth.php';
