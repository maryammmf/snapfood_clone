<?php

use App\Http\Controllers\seller\RestaurantController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\UserAddressController;
use App\Http\Controllers\User\UserAuthCotroller;
use App\Http\Controllers\user\UserCartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\user\UserFoodsRestaurantCotroller;
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

//show food restaurant's info ------------------------
Route::get('restaurants/{restaurantId}/foods' , [UserFoodsRestaurantCotroller::class , 'index']);


// cart OR basket  --------------------------------------------------
//Route::resource('carts' , UserCartController::class)
//    ->only('index' , 'store' ,'update' , 'show');
Route::middleware('auth:customer')->post('carts/add' , [UserCartController::class , 'store']);
Route::middleware('auth:customer')->get('carts' , [UserCartController::class , 'index']);
Route::middleware('auth:customer')->patch('carts/{cartId}' , [UserCartController::class , 'update']);
Route::middleware('auth:customer')->get('carts/{cartId}' , [UserCartController::class , 'show']);
Route::middleware('auth:customer')->get('carts/{cartId}/pay' , [UserCartController::class , 'cartPaid']);


// Comment ------------------------
Route::middleware('auth:customer')->get('comments' , [CommentController::class , 'store']);
