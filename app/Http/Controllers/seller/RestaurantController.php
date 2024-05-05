<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\restaurant\DestroyRequest;
use App\Http\Requests\seller\Restaurant\RegisterRequest;
use App\Http\Requests\seller\restaurant\UpdateRequest;
use App\Models\Admin\RestaurantCategory;
use App\Models\seller\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::guard('seller')->id();
//        dd($userId);
        $restaurants = Restaurant::all();
//        dd($restaurants);
        return view('panel-pages.seller.restaurant.index' , compact('restaurants'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(int $sellerId)
    {
        $restaurantCategories = RestaurantCategory::all();
        return view('register.restaurant' , compact('restaurantCategories' , 'sellerId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();
        Restaurant::query()->create($validated);
        return redirect(route('seller.login.show'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restaurant $restaurant)
    {
        $restaurantCategories = RestaurantCategory::all();
        return view('panel-pages.seller.restaurant.edit' , compact('restaurant' , 'restaurantCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Restaurant $restaurant)
    {
        $validated = $request->validated();
        $validated['seller_id'] = Auth::guard('seller')->id();
        $restaurant->update($validated);
        return redirect(route('restaurant.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyRequest $request)
    {
//        dd($request->id);
        Restaurant::query()->where('id' , $request->id)->delete();
//        dd($restaurant);
//        $restaurant->delete();
        return back();
    }

}
