<?php

use App\Http\Controllers\seller\FindFoodController;
use App\Http\Controllers\seller\FoodController;
use App\Http\Controllers\seller\SellerAuthController;
use Illuminate\Support\Facades\Route;



//seller register and login and logout
Route::prefix('auth')
    ->controller(SellerAuthController::class)
    ->group(function (){
    Route::prefix('seller/register')
        ->name('seller.register.')
        ->group(function(){
        Route::get('/' , 'showRegister')->name('show');
        Route::post('/' , 'submitRegister')->name('check');
    });

    Route::prefix('seller/login')->name('seller.login.')->group(function(){
        Route::get('/' , 'showLogin')->name('show');
        Route::post('/' , 'submitLogin')->name('check');
    });

    Route::get('/seller' , 'logout')->name('seller.logout');
});




//seller panel ---------------------
Route::get('panel_seller' , function (){
    return view('sellerMain');
    })
    ->middleware('auth:seller')
    ->name('panel.seller');



//foods crud -------------------------

Route::resource('panel_seller/foods' , FoodController::class)
    ->middleware('auth:seller')
    ->except('show' , 'destroy');

Route::delete('panel_seller/foods' , [FoodController::class ,'destroy'])
    ->middleware('auth:seller')
    ->name('foods.destroy');



//seller find foods with name or category
Route::prefix('panel_seller/foods/find')
    ->controller(FindFoodController::class)
    ->middleware('auth:seller')
    ->name('find.foods.by.')->group(function (){
        Route::get('/' , 'searchByName')->name('name');
        Route::post('/' , 'searchByCategory')->name('category');
});
