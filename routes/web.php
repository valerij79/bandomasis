<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Administratoriaus maršrutai
Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/admin/management', 'Admin\AdminController@index')->name('admin.management.index');

    // Šalių valdymas
    Route::get('/countries', [AdminController::class, 'viewCountries'])->name('admin.countries');
    Route::post('/countries', [AdminController::class, 'addCountry'])->name('admin.countries.add');
    Route::delete('/countries/{id}', [AdminController::class, 'deleteCountry'])->name('admin.countries.delete');
    Route::put('/countries/{id}', [AdminController::class, 'updateCountry'])->name('admin.countries.update');

    // Viešbučių valdymas
    Route::get('/hotels', [AdminController::class, 'viewHotels'])->name('admin.hotels');
    Route::post('/hotels', [AdminController::class, 'addHotel'])->name('admin.hotels.add');
    Route::delete('/hotels/{id}', [AdminController::class, 'deleteHotel'])->name('admin.hotels.delete');
    Route::put('/hotels/{id}', [AdminController::class, 'updateHotel'])->name('admin.hotels.update');
});

// Bendri maršrutai
// Route::get('/', [HomeController::class, 'index'])->name('home');

// Šalių maršrutai
Route::get('/countries', [CountryController::class, 'index'])->name('countries');
Route::get('/countries/{id}', [CountryController::class, 'show'])->name('countries.show');

// Viešbučių maršrutai
Route::get('/hotels', [HotelController::class, 'index'])->name('hotels');
Route::get('/hotels/{id}', [HotelController::class, 'show'])->name('hotels.show');

// Užsakymų maršrutai
Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/orders/{id}/confirm', [OrderController::class, 'confirm'])->name('orders.confirm');
});

// Kelionių maršrutai
Route::get('/trips', [TripController::class, 'index'])->name('trips');
Route::post('/trips/{id}/select-hotel', [TripController::class, 'selectHotel'])->name('trips.select-hotel');

// Vartotojo maršrutai
Route::middleware('auth')->group(function () {
    Route::get('/user/trips', [UserController::class, 'trips'])->name('user.trips');
    Route::get('/hotels/trips', 'HotelController@trips')->name('hotels.trips');
    Route::get('/hotels', 'HotelController@index')->name('hotels.index');


    // Kitų vartotojo maršrutų aprašymas...
});

// Autentifikacijos maršrutai
Auth::routes();


