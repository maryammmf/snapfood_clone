<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
use App\Models\User\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function progressOrders()
    {
        $cart = Cart::query()->exists();
        if ($cart){
            $restaurantId = Cart::all()->pluck('restaurant_id');
            $sellerIds = Restaurant::checkRestaurantId($restaurantId)->firstOrFail();
            $sellerId = $sellerIds->seller_id;
            $orders = Order::checkStatus()->paginate(3);
            return view('sellerMain' , compact('orders'));
        }
        $orders = collect();
        return view('sellerMain' , compact('orders'));
    }


    public function changeStatus(Request $request , $orderId){
        Order::updateStatus($orderId , $request->input('status'));
        return back();
    }


    public function index()
    {
        $orders = Order::query()->paginate(3);
        return view('panel-pages.seller.orders.index' , compact('orders'));
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
    public function edit(string $id)
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
