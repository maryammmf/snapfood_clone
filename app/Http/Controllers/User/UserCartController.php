<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\UserCardStoreRequest;
use App\Http\Requests\user\UserUpdateCartRequest;
use App\Http\Resources\user\UserIndexCartResource;
use App\Models\Order;
use App\Models\seller\Food;
use App\Models\seller\Restaurant;
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
        $food = Food::checkFoodId($validated['food_id'])->firstOrFail();
        $validated['food_id'] = $food->id;
        $validated['restaurant_id'] = $food->restaurant_id;
        $validated['user_id'] = \request()->user()->id;
        $validated['seller_id'] = $food->seller_id;
        $cardPrice = (int)($food->price) * (int)($validated['count']);
        $validated['price'] = $cardPrice;

//        dd($validated);
        $cart = Cart::query()->create($validated);
        $cart->foods()->attach($request->food_id);
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
        $carts = Cart::checkCartId($cartId)->get();
        return UserIndexCartResource::collection($carts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateCartRequest $request, int $cartId)
    {
        $validated = $request->validated();
        Cart::checkCartId($cartId)->update($validated);
        return response()->json([
            'msg' => __('response.cart_update_successfully')
        ]);
    }

    public function cartPaid(int $cartId)
    {
        $cart = Cart::query()->find($cartId);
        if (!$cart) {
            // Handle the case when the cart is not found
            return response()->json([
                'message' => 'Cart not found'
            ]);
        }
        $validated['cart_id'] = $cartId;

        $validated['restaurant_id'] = $cart->restaurant_id;
        $validated['seller_id'] = $cart->seller_id;
        $validated['user_id'] = $cart->user_id;

        $validated['price'] = $cart->price;

        Order::query()->create($validated);
        return response()->json([
            'msg' => __('response.order_add_successfully')
        ]);
    }


}
