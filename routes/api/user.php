<?php

use App\Http\Controllers\seller\RestaurantController;
use App\Http\Controllers\User\UserAddressController;
use App\Http\Controllers\User\UserAuthCotroller;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserRestaurantController;
use Illuminate\Support\Facades\Route;

//user login ------------------------
Route::get('user/index' , [UserController::class , 'index']);
Route::get('user/login' , [UserAuthCotroller::class , 'login']);


//user info crud ------------------------
Route::patch('user/{userId}' , [UserController::class , 'update']);


//user address crud ------------------------
Route::resource('addresses' , UserAddressController::class )->only('store' , 'index' , 'update' );


//show restaurant info ------------------------
Route::get('restaurants' , [UserRestaurantController::class , 'index']);
Route::get('restaurants/{restaurantId}' , [UserRestaurantController::class , 'show']);
Route::post('restaurants/{isOpen}' , [UserRestaurantController::class , 'indexOpen']);

