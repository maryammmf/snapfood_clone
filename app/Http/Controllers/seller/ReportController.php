<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\seller\Seller;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {

        $orders = Order::getOrderWithStatus('ارسال به مقصد')
            ->paginate(5);
        $orderCount = $orders->count();
        $orderPrice = $orders->sum('price');
        return view('panel-pages/seller/report/index' , compact(['orders' , 'orderPrice' , 'orderCount']));
    }

    public function weekReport()
    {
        $orders = Order::getOrderWithStatus('ارسال به مقصد')
            ->whereBetween('created_at' , [Carbon::now()->subWeek()->format('Y-m-d') , Carbon::now()])
            ->paginate(5);
        $orderCount = $orders->count();
        $orderPrice = $orders->sum('price');
        return view('panel-pages/seller/report/index' , compact(['orders' , 'orderPrice' , 'orderCount']));
    }

    public function monthReport()
    {
        $orders = Order::getOrderWithStatus('ارسال به مقصد')
            ->whereBetween('created_at' , [Carbon::now()->subMonth()->format('Y-m-d') , Carbon::now()])
            ->paginate(5);
        $orderCount = $orders->count();
        $orderPrice = $orders->sum('price');
        return view('panel-pages/seller/report/index' , compact(['orders' , 'orderPrice' , 'orderCount']));
    }

}
