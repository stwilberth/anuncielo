<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\ImageCtrl;
use App\Http\Controllers\CronCtrl;
use App\Http\Controllers\DeleteCtrl;

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

Route::view('/', 'welcome')->name('welcome');
Route::view('profile', 'profile')->middleware(['auth'])->name('profile');
Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');
Route::get('dashboard/clear-cache', [CronCtrl::class, 'clearCache'])->name('dashboard.clearCache')->middleware(['auth']);

Volt::route('stores', 'stores.index')->name('stores.index');
Volt::route('stores/{store_url}', 'stores.show')->name('stores.show');
Volt::route('stores-edit/{store_url}', 'stores.edit')->name('stores.edit')->middleware(['auth']);
Volt::route('stores-create', 'stores.create')->name('stores.create')->middleware(['auth']);
Volt::route('stores-user', 'stores.user')->name('stores.user')->middleware(['auth']);


Volt::route('stores/{store_url}/products-create', 'stores.products.create')->name('stores.products.create')->middleware(['auth']);
Volt::route('stores/{store_url}/{product_url}', 'stores.products.show')->name('stores.products.show');
Volt::route('stores/{store_url}/{product_url}/edit', 'stores.products.edit')->name('stores.products.edit')->middleware(['auth']);
Route::delete('stores/{store_url}/{product_url}/delete', [DeleteCtrl::class, 'products'])->name('stores.products.delete')->middleware(['auth']);
Route::get('stores/{store_url}/{product_url}/add-image', [ImageCtrl::class, 'add'])->name('addImage')->middleware(['auth']);
Route::post('stores/{store_url}/{product_url}/save-image', [ImageCtrl::class, 'save'])->name('stores.products.image_save')->middleware(['auth']);
Route::get('stores/{store_url}/add-image', [ImageCtrl::class, 'addImageCover'])->name('stores.addImageCover')->middleware(['auth']);
Route::post('stores/{store_url}/save-image', [ImageCtrl::class, 'saveImageCover'])->name('stores.saveImageCover')->middleware(['auth']);

//ads routes volt
Volt::route('/ads', 'ads.index')->name('ads.index');
Volt::route('/ads/{id}', 'ads.show')->name('ads.show');
Volt::route('ads-create', 'ads.create')->name('ads.create')->middleware(['auth']);
Volt::route('ads/{id}/edit', 'ads.edit')->name('ads.edit')->middleware(['auth']);
Route::delete('ads/{id}/delete', [DeleteCtrl::class, 'ads'])->name('ads.delete')->middleware(['auth']);

require __DIR__.'/auth.php';
