<?php

use App\Http\Controllers\User\UserAddressController;
use App\Http\Controllers\User\UserAuthCotroller;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('user/index' , [UserController::class , 'index']);
Route::get('user/login' , [UserAuthCotroller::class , 'login']);


//user address crud ------------------------

//Route::get('address' , [UserAddressController::class , 'store']);
Route::resource('addresses' , UserAddressController::class )->only('store' , 'index' , 'update' );
