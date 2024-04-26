<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFoodCategoryController;
use App\Http\Controllers\Admin\AdminRestaurantCategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SellerAuthController;
use Illuminate\Support\Facades\Route;

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
    return view('main');
});


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

//--------------------------------------  seller  -----------------------------------------------

//seller register
Route::prefix('auth')->controller(SellerAuthController::class)->group(function (){
    Route::prefix('seller/register')->name('seller.register.')->group(function(){
        Route::get('/' , 'showRegister')->name('show');
        Route::post('/' , 'submitRegister')->name('check');
    });
});

//seller login
Route::prefix('auth')->controller(SellerAuthController::class)->group(function (){
    Route::prefix('seller/login')->name('seller.login.')->group(function(){
        Route::get('/' , 'showLogin')->name('show');
        Route::post('/' , 'submitLogin')->name('check');
    });
});

//---------------------------------  restaurant  ----------------------------------------------------

//restaurant register
Route::prefix('auth')->controller(RestaurantController::class)->group(function (){
    Route::prefix('restaurant/register')->name('restaurant.register.')->group(function(){
        Route::get('/' , 'create')->name('show');
        Route::post('/' , 'store')->name('store');
    });
});


