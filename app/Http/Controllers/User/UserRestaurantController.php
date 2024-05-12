<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserIndexRestaurantReesource;
use App\Http\Resources\User\UserIndexRestaurantResource;
use App\Http\Resources\User\UserShowRestaurantResource;
use App\Models\seller\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRestaurantController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return UserIndexRestaurantResource::collection($restaurants);
    }

    public function show(int $restaurantId){
        $restaurant = Restaurant::query()->where('id' , $restaurantId)->firstOrFail();
        return UserShowRestaurantResource::make($restaurant);
    }


    public function indexOpen( $isOpen){
        $restaurants = Restaurant::query()->where('is_open' , $isOpen)->get();
        return UserIndexRestaurantResource::collection($restaurants);
    }

}
