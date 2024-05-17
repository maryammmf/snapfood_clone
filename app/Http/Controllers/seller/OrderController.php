<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use App\Models\User\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function progressOrders()
    {
        $restaurantId = Cart::all()->pluck('restaurant_id');
        $sellerIds = Restaurant::query()->whereIn('id' , $restaurantId)->firstOrFail();

        $sellerId = $sellerIds->seller_id;
//        dd($sellerIds->seller_id );
        $orders = Order::query()->whereIn('status' , ['در حال بررسی', 'در حال آماده سازی' , 'ارسال به مقصد'])->paginate(3);
        return view('sellerMain' , compact('orders'));
    }


    public function changeStatus(Request $request , int $orderId){
        Order::query()->where('id' ,$orderId )->update(['status' => $request['status']]);
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
