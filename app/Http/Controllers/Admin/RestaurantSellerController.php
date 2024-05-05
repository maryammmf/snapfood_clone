<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\seller\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantSellerController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('panel-pages.admin.restaurant.index' , compact('restaurants'));
    }
}
