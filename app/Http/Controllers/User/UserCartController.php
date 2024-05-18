<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserCardStoreRequest;
use App\Http\Requests\user\UserUpdateCartRequest;
use App\Http\Resources\user\UserIndexCartResource;
use App\Models\Order;
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
        $carts = Cart::all();
        return UserIndexCartResource::collection($carts);
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

        $validated['seller_id'] = $food->seller_id;

        $cardPrice = (int)($food->price) * (int)($validated['count']);
        $validated['price'] = $cardPrice;

        $cart = Cart::query()->create($validated);
        return response()->json([
            'msg:' => __('response.cart_store_successfully'),
            'cart_id' => $cart->id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $cartId)
    {
        $carts = Cart::query()->where('id' , $cartId)->get();
        return UserIndexCartResource::collection($carts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateCartRequest $request, int $cartId)
    {
        $validated = $request->validated();
        Cart::query()->where('id' , $cartId)->update($validated);
        return response()->json([
            'msg' => __('response.cart_update_successfully')
        ]);
    }

    public function cartPaid(int $cartId)
    {
        $cart = Cart::query()->where('id' , $cartId)->firstOrFail();
        $validated['cart_id'] = $cartId;
        $validated['price'] = $cart->price;
        Order::query()->create($validated);
        return response()->json([
            'msg' => __('response.order_add_successfully')
        ]);
    }


}
