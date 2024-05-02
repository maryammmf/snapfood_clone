<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\food\AddFoodRequest;
use App\Http\Requests\seller\food\DeleteFoodRequest;
use App\Http\Requests\seller\food\UpdateFoodRequest;
use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
use App\Models\seller\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::all();
        $foods = Food::query()->paginate(2);
        $foodCategories = FoodCategory::all();
        return view('panel-pages.seller.foods.index' , compact('foods' , 'foodCategories' , 'discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foodCategories = FoodCategory::all();
        $discounts = Discount::all();
        return view('panel-pages.seller.foods.add' , compact('foodCategories' , 'discounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddFoodRequest $request)
    {
        Food::query()->create($request->validated());
//        session()->flash('message' , 'ثبت شد');
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        $foodCategories = FoodCategory::all();
        return view('panel-pages.seller.foods.edit' , compact('food' , 'foodCategories' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
        $validated = $request->validated();
        $food->update($validated);
        return redirect(route('food.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteFoodRequest $request)
    {
        $food = Food::findOrFail($request->id); // Retrieve the food by ID
        $food->delete();
        return back();

    }
}
