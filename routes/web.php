<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\StoreCtrl;

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
// Volt::route('/dashboard/stores/{store}/edit', 'stores.edit')->name('dashboard.stores.edit')->middleware(['auth']);
Volt::route('/dashboard/stores/{store_url}/products/create', 'products.create')->name('dashboard.products.create')->middleware(['auth']);
// Volt::route('/dashboard/stores/{store}/products/{product}/edit', 'products.edit')->name('dashboard.products.edit')->middleware(['auth']);
// Volt::route('/dashboard/stores/{store}/products/{product}/images/create', 'products.images.create')->name('dashboard.products.images.create')->middleware(['auth']);
Route::get('stores', [StoreCtrl::class, 'index'])->name('stores.index');
Route::get('stores/{url}', [StoreCtrl::class, 'show'])->name('stores.show');
// Route::view('stores/{store}/products', 'products.index')->middleware(['auth'])->name('products.index');
// Route::view('stores/{store}/products/{product}', 'products.show')->middleware(['auth'])->name('products.show');

Route::view('/', 'welcome');

Route::view('profile', 'profile')->middleware(['auth'])->name('profile');

//edicion de imagenes
Route::get('/image-edit/{url}', 'ImageCtr@edit')->name('imageEdit');
Route::post('/image-save', 'ImageCtr@save')->name('imageSave');
Route::post('/image-update', 'ImageCtr@update')->name('imageUpdate');
Route::post('/image-delete', 'ImageCtr@delete')->name('imageDelete');

Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';
