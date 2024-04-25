<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminFoodCategoryController;
use App\Http\Controllers\Admin\AdminRestaurantCategoryController;
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



Route::get('panel-login/admin' , [AdminAuthController::class , 'login'])
    ->name('panel-login.admin');


Route::post('panel-login/login' , [AdminAuthController::class , 'submitLogin'])
    ->name('panel-login.check');


Route::get('panel_admin' , function (){
    return view('adminMain');
})->name('panel-login.panel');


Route::get('panel_admin/category/food' , function (){
    return view('panel-pages.admin.category.add.food');
})
    ->name('panel-login.category.food');


Route::get('panel_admin/category/restaurant' , function (){
    return view('panel-pages.admin.category.add.restaurant');
})
    ->name('panel-login.category.restaurant');


//category/restaurant
Route::post('panel_admin/category/restaurant' , [AdminRestaurantCategoryController::class , 'store'])
    ->name('store.category.restaurant');

Route::get('panel_admin/category/restaurant/show' , [AdminRestaurantCategoryController::class , 'index'])
    ->name('show.category.restaurant');



Route::get('panel_admin/category/restaurant/edit/{id}' , [AdminRestaurantCategoryController::class , 'edit'])
    ->name('edit.category.restaurant');

Route::post('panel_admin/category/restaurant/update/{id}' , [AdminRestaurantCategoryController::class , 'update'])
    ->name('update.category.restaurant');

Route::get('panel_admin/category/restaurant/delete/{id}' , [AdminRestaurantCategoryController::class , 'destroy'])
    ->name('delete.category.restaurant');



//category/food
Route::post('panel_admin/category/food' , [AdminFoodCategoryController::class , 'store'])
    ->name('store.category.food');

Route::get('panel_admin/category/food/show' , [AdminFoodCategoryController::class , 'index'])
    ->name('show.category.food');



Route::get('panel_admin/category/food/edit/{id}' , [AdminFoodCategoryController::class , 'edit'])
    ->name('edit.category.food');

Route::post('panel_admin/category/food/update/{id}' , [AdminFoodCategoryController::class , 'update'])
    ->name('update.category.food');

Route::get('panel_admin/category/food/delete/{id}' , [AdminFoodCategoryController::class , 'destroy'])
    ->name('delete.category.food');





//Route::prefix('panel-login')
//    ->middleware('auth:panel-login')
//    ->controller(AdminAuthController::class)
//    ->name('panel-login.')
//    ->group(function (){
//    Route::post('/check' , 'submiteLogin')->name('check');
//});
