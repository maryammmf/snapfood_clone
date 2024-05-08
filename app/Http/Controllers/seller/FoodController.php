<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\food\AddFoodRequest;
use App\Http\Requests\seller\food\DeleteFoodRequest;
use App\Http\Requests\seller\food\UpdateFoodRequest;
use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
use App\Models\seller\Food;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        dd(Auth::id());
        $foods = Food::query()->where( 'seller_id' , Auth::id())->paginate(5);
        $foodCategories = FoodCategory::all();
        $discounts = Discount::all();

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
        $validated = $request->validated();

        $file = $request->file('photo');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images') , $fileName);
        $validated['photo'] = $fileName;
        $validated['seller_id'] = Auth::id();

        $food = Food::query()->create($validated);
        $food->foodcategories()->attach($request->food_category_id);
        return redirect(route('foods.index'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        $foodCategories = FoodCategory::all();
        $discounts = Discount::all();

        return view('panel-pages.seller.foods.edit' , compact('food' , 'foodCategories','discounts' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoodRequest $request, Food $food)
    {
//        dd('first');
        $validated = $request->validated();
        if ($request->hasFile('photo')){
//            dd('44');
            $file = $request->file('photo');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images') , $fileName);
            $validated['photo'] = $fileName;
        }

        $food->update($validated);
        $food->foodcategories()->sync($request->input('food_category_id'));
        return redirect(route('foods.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteFoodRequest $request)
    {
        $food = Food::findOrFail($request->id);
        $food->delete();
        return back();

    }
}
