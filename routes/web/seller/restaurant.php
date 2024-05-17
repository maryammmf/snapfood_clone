<?php


use App\Http\Controllers\seller\RestaurantController;
use Illuminate\Support\Facades\Route;


//---------------------------------  restaurant crud ----------------------------------------------------

Route::resource('panel_seller/restaurant' , RestaurantController::class)
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->except('show' , 'create' , 'store');

Route::get('panel_seller/restaurant/{sellerId}' , [RestaurantController::class , 'create'])
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('restaurant.create');

Route::post('panel_seller/restaurant' , [RestaurantController::class , 'store'])
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('restaurant.store');

