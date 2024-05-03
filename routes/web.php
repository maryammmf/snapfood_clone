<?php


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
    return view('welcome');
});


require_once 'web/admin/admin.php';
require_once 'web/seller/seller.php';
require_once 'web/admin/discount.php';
require_once 'web/seller/restaurant.php';

