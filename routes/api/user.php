<?php

use App\Http\Controllers\User\UserAuthCotroller;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('user/index' , [UserController::class , 'index']);
Route::get('user/login' , [UserAuthCotroller::class , 'login']);
