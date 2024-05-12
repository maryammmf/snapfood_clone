<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Resources\user\UserIndexFoodsRestaurantResource;
use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use Illuminate\Http\Request;

class UserFoodsRestaurantCotroller extends Controller
{
    public function index(int $restaurantId){

        $restaurantFoods = Food::query()->where('restaurant_id' , $restaurantId)->get();
        return UserIndexFoodsRestaurantResource::collection($restaurantFoods);
    }
}
