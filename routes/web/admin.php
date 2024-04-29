<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminFoodCategoryController;
use App\Http\Controllers\Admin\AdminRestaurantCategoryController;
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
})->name('panel-login.admin');

//----------------------------------  categry  -----------------------------------------------------

//category.food
Route::resource('panel_admin/category/food' , AdminFoodCategoryController::class)
    ->names([
        'create' => 'create.category.food',
        'store' => 'store.category.food',
        'index' => 'index.category.food',
        'edit' => 'edit.category.food',
        'update' => 'update.category.food',
        'destroy' => 'delete.category.food',
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
