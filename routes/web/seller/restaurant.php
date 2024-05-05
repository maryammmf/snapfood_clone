<?php


use App\Http\Controllers\seller\RestaurantController;
use Illuminate\Support\Facades\Route;


//---------------------------------  restaurant crud ----------------------------------------------------

Route::resource('panel_seller/restaurant' , RestaurantController::class)
    ->middleware('auth:seller')
    ->except('show' , 'create');

Route::get('panel_seller/restaurant/{sellerId}' , [RestaurantController::class , 'create'])
    ->name('restaurant.create');

