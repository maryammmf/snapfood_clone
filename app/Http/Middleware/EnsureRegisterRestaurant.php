<?php

namespace App\Http\Middleware;

use App\Models\seller\Restaurant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureRegisterRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $seller = Auth::guard('seller')->id();
        $restaurant = Restaurant::query()->where('seller_id' , $seller)->exists();

//        dd($seller , $restaurant);
        if (!$restaurant){
//            dd(666);
            return abort(Response::HTTP_UNAUTHORIZED);
        }
        return $next($request);
    }
}
