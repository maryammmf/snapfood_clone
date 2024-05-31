<?php

use App\Http\Controllers\seller\FindFoodController;
use App\Http\Controllers\seller\FoodController;
use App\Http\Controllers\seller\OrderController;
use App\Http\Controllers\seller\ReportController;
use App\Http\Controllers\seller\SellerAuthController;
use App\Http\Controllers\seller\SellerCommentController;
use App\Http\Controllers\User\CommentController;
use Illuminate\Support\Facades\Route;



//seller register and login and logout ---------------------
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
Route::get('panel_seller' , [OrderController::class , 'progressOrders'])
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('panel.seller');



//foods crud -------------------------
Route::resource('panel_seller/foods' , FoodController::class)
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->except('show' , 'destroy');

Route::delete('panel_seller/foods' , [FoodController::class ,'destroy'])
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('foods.destroy');



//seller find foods with name or category -------------------------
Route::prefix('panel_seller/foods/find')
    ->controller(FindFoodController::class)
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('find.foods.by.')->group(function (){
        Route::get('/' , 'searchByName')->name('name');
        Route::post('/' , 'searchByCategory')->name('category');
});


// orders -------------------------
Route::get('panel_seller/orders' , [OrderController::class , 'index'])->middleware(['auth:seller' , 'register.restaurant'])
    ->name('order.index');
Route::post('panel_seller/{orderId}' , [OrderController::class , 'changeStatus'])->middleware(['auth:seller' , 'register.restaurant'])
    ->name('order.changeStatus');


// comment -------------------------
Route::get('panel_seller/comment/{orderId}' , [CommentController::class , 'show'])->middleware(['auth:seller' , 'register.restaurant'])->name('comment.show');

Route::post('panel_seller/comment/{commentId}' , [SellerCommentController::class , 'response'])->middleware(['auth:seller' , 'register.restaurant'])->name('comment.response');

Route::post('panel_seller/comment/approve/{commentId}' , [SellerCommentController::class , 'approve'])->middleware(['auth:seller' , 'register.restaurant'])->name('comment.approve');

Route::post('panel_seller/comment/delete/{commentId}' , [SellerCommentController::class , 'sendDeleteRequest'])->middleware(['auth:seller' , 'register.restaurant'])->name('comment.delete.request');

Route::get('panel_seller/comment' , [SellerCommentController::class , 'index'])->middleware(['auth:seller' , 'register.restaurant'])->name('comment.index');

Route::get('panel_seller/comment_search' , [SellerCommentController::class , 'search'])
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('comment.search');



// report -------------------------
Route::get('panel_seller/report' , [ReportController::class , 'index'])
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('report.index');


Route::get('panel_seller/report/week' , [ReportController::class , 'weekReport'])
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('report.weekReport');


Route::get('panel_seller/report/month' , [ReportController::class , 'monthReport'])
    ->middleware(['auth:seller' , 'register.restaurant'])
    ->name('report.monthReport');


