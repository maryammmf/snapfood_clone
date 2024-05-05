<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
use App\Models\seller\Food;

class FoodSellerController extends Controller
{
    public function index()
    {
        $foods = Food::query()->paginate(5);
        $foodCategories = FoodCategory::all();
        $discounts = Discount::all();

        return view('panel-pages.admin.foods.index' , compact('foods' , 'foodCategories' , 'discounts'));
    }
}
