<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
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


Route::get('admin/login' , [AdminAuthController::class , 'login'])
    ->name('admin.login');

Route::post('admin/login' , [AdminAuthController::class , 'submitLogin'])
    ->name('admin.check');

Route::get('panel_admin' , function (){
    return view('main');
})->name('admin.panel');





//Route::prefix('admin')
//    ->middleware('auth:admin')
//    ->controller(AdminAuthController::class)
//    ->name('admin.')
//    ->group(function (){
//    Route::post('/check' , 'submiteLogin')->name('check');
//});
