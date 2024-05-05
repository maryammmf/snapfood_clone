<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminFoodCategoryController;
use App\Http\Controllers\Admin\AdminRestaurantCategoryController;
use App\Http\Controllers\Admin\FoodSellerController;
use App\Http\Controllers\admin\RestaurantSellerController;
use Illuminate\Support\Facades\Route;


//-------------------------------  admin login  -------------------------------------------------

//admin login and check
Route::prefix('auth')
    ->controller(AdminAuthController::class)
    ->group(function (){
        Route::prefix('login')
            ->name('login.')
            ->group(function (){
                Route::get('/' , 'login')->name('show');
                Route::post('/' , 'submitLogin')->name('check');
                Route::get('/logout' , 'logout')->name('logout');
            });
    });


//admin panel
Route::get('panel_admin' , function (){
    return view('adminMain');
    })->middleware('auth:admin')
    ->name('panel-login.admin');




//----------------------------------  categry  -----------------------------------------------------

//category.foods
Route::resource('panel_admin/category/foods' , AdminFoodCategoryController::class)
    ->middleware('auth:admin')
    ->names([
        'create' => 'create.category.foods',
        'store' => 'store.category.foods',
        'index' => 'index.category.foods',
        'edit' => 'edit.category.foods',
        'update' => 'update.category.foods',
        'destroy' => 'delete.category.foods',
    ])->except('show');


//category.restaurant
Route::resource('panel_admin/category/restaurant' , AdminRestaurantCategoryController::class)
    ->middleware('auth:admin')
    ->names([
        'create' => 'create.category.restaurant',
        'store' => 'store.category.restaurant',
        'index' => 'index.category.restaurant',
        'edit' => 'edit.category.restaurant',
        'update' => 'update.category.restaurant',
        'destroy' => 'delete.category.restaurant',
    ])->except('show');




//---------------------------------- show all food  -----------------------------------------------------
Route::get('panel_admin/foods' , [FoodSellerController::class , 'index'])
//    ->middleware('auth:admin')
    ->name('admin.foods.index');


//---------------------------------- show all restaurant  -----------------------------------------------------
Route::get('panel_admin/restaurants' , [RestaurantSellerController::class , 'index'])
//    ->middleware('auth:admin')
    ->name('admin.restaurants.index');

