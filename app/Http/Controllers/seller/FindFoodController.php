<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\food\FindFoodByCategoryRquest;
use App\Http\Requests\seller\food\FindFoodByNameRequest;
use App\Models\seller\Food;

class FindFoodController extends Controller
{
    public function searchByName(FindFoodByNameRequest $request){
        $validated = $request->validated();
        $food = Food::query()->where('name' , $validated['name'])->first();
        return view('panel-pages.seller.foods.showFind' , compact('food'));
    }


    public function searchByCategory(FindFoodByCategoryRquest $request){
        $validated = $request->validated();
        $food = Food::query()->where('food_category_id' , $validated['food_category_id'])->first();
//        dd($food);
        return view('panel-pages.seller.foods.showFind' , compact('food'));
    }

}
