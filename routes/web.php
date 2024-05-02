<?php

use App\Http\Controllers\admin\DiscountController;
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


Route::resource('panel_seller/restaurant' , RestaurantController::class)->except('show' , 'create');
Route::get('panel_seller/restaurant/{sellerId}' , [RestaurantController::class , 'create'])->name('restaurant.create');


//---------------------------------  discount  ----------------------------------------------------

Route::resource('panel_admin/discount' , DiscountController::class)->only('index' , 'create' , 'store');
Route::delete('panel_admin/discount' , [DiscountController::class , 'destroy'])->name('discount.destroy');
