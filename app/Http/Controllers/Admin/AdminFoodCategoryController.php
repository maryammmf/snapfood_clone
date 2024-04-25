<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCategoryRequest;
use App\Models\Admin\FoodCategory;
use App\Models\Admin\RestaurantCategory;
use Illuminate\Http\Request;

class AdminFoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  FoodCategory::all();
        return view('panel-pages.admin.category.show.food' , compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategoryRequest $request)
    {
        FoodCategory::query()->create($request->validated());
        return back()->with('message added');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('panel-pages.admin.category.edit.food' , compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCategoryRequest $request, int $id)
    {
        $findFood = FoodCategory::query()->findOrFail($id);
        $findFood->update([
            'name'=>$request->name,
        ]);
        return redirect(route('show.category.food'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {

        $food = FoodCategory::query()->findOrFail($id);
        $food->delete();
        return redirect(route('show.category.food'));
    }
}
