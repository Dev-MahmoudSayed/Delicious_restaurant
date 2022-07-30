<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;

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


Route::get('/', [RestaurantController::class, 'index'])->name('Restaurant');
Route::get('meal/{id}', [RestaurantController::class, 'show'])->name('meal.show');
Route::post('/order/store', [App\Http\Controllers\RestaurantController::class, 'store'])->name('order.store');
Route::get('/order/cart', [App\Http\Controllers\RestaurantController::class, 'cart'])->name('cart');

Route::post('/booking/store', [App\Http\Controllers\RestaurantController::class, 'booking'])->name('booking.store');
Auth::routes();




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(
    ['prefix' =>'admin', 'middleware'=>['auth','admin']],
    function()
    {
            //MEALS           
            Route::get('/meals', [App\Http\Controllers\MealController::class, 'index'])->name('meals');
            
            Route::get('/meals/create', [App\Http\Controllers\MealController::class, 'create'])->name('meals.create');
            Route::post('/meals/store', [App\Http\Controllers\MealController::class, 'store'])->name('meals.store');
            
            Route::get('/meals/edit/{id}', [App\Http\Controllers\MealController::class, 'edit'])->name('meals.edit');
            Route::put('/meals/update/{id}', [App\Http\Controllers\MealController::class, 'update'])->name('meals.update');
            
            Route::get('/meals/delete/{id}', [App\Http\Controllers\MealController::class, 'destroy'])->name('meals.delete');
            //orders
            Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
            Route::post('/order/status/{id}', [App\Http\Controllers\OrderController::class, 'changeStatus'])->name('order.status');
            // Booking
            Route::get('/booking', [App\Http\Controllers\BookingController::class, 'index'])->name('booking');
            Route::post('/booking/status/{id}', [App\Http\Controllers\BookingController::class, 'changeStatus'])->name('booking.status');
            //customers
            Route::get('/customers', [App\Http\Controllers\OrderController::class, 'customers'])->name('customers');
    }
); //admin group



