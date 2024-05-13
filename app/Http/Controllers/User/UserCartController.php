<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserCardStoreRequest;
use App\Models\seller\Food;
use App\Models\User\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCardStoreRequest $request)
    {
        $validated = $request->validated();

        $food = Food::query()->where('id' , $validated['food_id'])->firstOrFail();
        $validated['food_id'] = $food->id;
        $validated['restaurant_id'] = $food->restaurant_id;
        $validated['user_id'] = \request()->user()->id;

//        $user = \request()->user();
//        dd($user);

        Cart::query()->create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


}
