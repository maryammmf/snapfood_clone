<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddCategoryRequest;
use App\Models\Admin\Category\Restaurant;
use App\Models\Admin\RestaurantCategory;

class AdminRestaurantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  RestaurantCategory::all();
        return view('panel-pages.admin.category.show.restaurant' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategoryRequest $request)
    {
        RestaurantCategory::query()->create($request->validated());
        return back()->with('message added');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('panel-pages.admin.category.edit.restaurant' , compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddCategoryRequest $request, int $id)
    {
        $findRestaurant = RestaurantCategory::query()->findOrFail($id);
        $findRestaurant->update([
            'name'=>$request->name,
        ]);
        return redirect(route('show.category.restaurant'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $restaurant = RestaurantCategory::query()->findOrFail($id);
        $restaurant->delete();
        return redirect(route('show.category.restaurant'));
    }
}
