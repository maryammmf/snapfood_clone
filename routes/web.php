<?php

use App\Http\Controllers\seller\FindFoodController;
use App\Http\Controllers\seller\FoodController;
use App\Http\Controllers\seller\RestaurantController;
use App\Http\Controllers\seller\SellerAuthController;
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


require_once 'web/admin.php';
require_once 'web/seller.php';




//---------------------------------  restaurant  ----------------------------------------------------

//restaurant register
Route::prefix('auth')->controller(RestaurantController::class)->group(function (){
    Route::prefix('restaurant/register')->name('restaurant.register.')->group(function(){
        Route::get('/' , 'create')->name('show');
        Route::post('/' , 'store')->name('store');
    });
});


