<?php

use App\Http\Controllers\admin\DiscountController;
use Illuminate\Support\Facades\Route;


//---------------------------------  discount crud ----------------------------------------------------

Route::resource('panel_admin/discount' , DiscountController::class)
    ->middleware('auth:admin')
    ->only('index' , 'create' , 'store');

Route::delete('panel_admin/discount' , [DiscountController::class , 'destroy'])
    ->middleware('auth:admin')
    ->name('discount.destroy');

