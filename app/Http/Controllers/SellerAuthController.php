<?php

namespace App\Http\Controllers;

use App\Http\Requests\seller\SubmitLoginRequest;
use App\Http\Requests\seller\SubmitRegisterRequest;
use App\Models\Restaurant;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerAuthController extends Controller
{
    public function showRegister(){
        return view('register.seller');
    }

    public function submitRegister(SubmitRegisterRequest $request){
        Seller::query()->create($request->validated());
        return redirect(route('restaurant.register.show'));
    }


    public function showLogin(){
        return view('panel-login.seller');
    }

    public function submitLogin(SubmitLoginRequest $request){
        if (Auth::guard('seller')->attempt($request->validated())){
            $request->session()->regenerate();
            return redirect(route('seller.login.show'));
        }
        return back()->withErrors([
            'message'=>'اطلاعات وارد شده صحیح نمی باشد.'
        ]);
    }

    public function logout(){

    }
}
