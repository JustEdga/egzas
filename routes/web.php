<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController as C;
use App\Http\Controllers\HotelController as H;
use App\Http\Controllers\OrderController as O;
use App\Http\Controllers\FrontController as F;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [F::class, 'index'])->name('index');
Route::get('/cat/{country}', [F::class, 'showCatHotels'])->name('show-cats-hotels');
Route::get('show/{hotel}', [F::class, 'show'])->name('show');
Route::post('add', [F::class, 'addToCart'])->name('add-to-cart');
Route::get('/cart', [F::class, 'cart'])->name('cart');
Route::post('/cart', [F::class, 'updateCart'])->name('update-cart');
Route::post('/make-order', [F::class, 'makeOrder'])->name('make-order');

Route::prefix('admin/country')->name('country-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index')->middleware('roles:A');
    Route::get('/create', [C::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/create', [C::class, 'store'])->name('store')->middleware('roles:A');
    Route::delete('/delete/{country}', [C::class, 'destroy'])->name('delete')->middleware('roles:A');
    Route::get('/edit/{country}', [C::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/update/{country}', [C::class, 'update'])->name('update')->middleware('roles:A');
});


Route::prefix('admin/hotel')->name('hotel-')->group(function () {
    Route::get('/', [H::class, 'index'])->name('index')->middleware('roles:A');
    Route::get('/create', [H::class, 'create'])->name('create')->middleware('roles:A');
    Route::post('/store', [H::class, 'store'])->name('store')->middleware('roles:A');
    Route::delete('/delete/{hotel}', [H::class, 'destroy'])->name('delete')->middleware('roles:A');
    Route::get('/edit/{hotel}', [H::class, 'edit'])->name('edit')->middleware('roles:A');
    Route::put('/update/{hotel}', [H::class, 'update'])->name('update')->middleware('roles:A');
});

Route::prefix('orders')->name('orders-')->group(function () {
   Route::get('/index', [O::class, 'index'])->name('index')->middleware('roles:A|U');
   Route::put('/update/{order}', [O::class, 'update'])->name('update')->middleware('roles:A');
   Route::delete('/destroy/{order}', [O::class, 'destroy'])->name('destroy')->middleware('roles:A');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');