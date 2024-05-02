<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\SubmitLoginRequest;
use App\Http\Requests\seller\SubmitRegisterRequest;
use App\Models\seller\Seller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerAuthController extends Controller
{
    public function showRegister(){
        return view('register.seller');
    }

    public function submitRegister(SubmitRegisterRequest $request){
        $validated = $request->validated();
        $validated['password']=Hash::make($validated['password']);
        $seller = Seller::query()->create($validated);
        $sellerId = $seller->id;
        return redirect(route('restaurant.create' , ['sellerId' => $sellerId]));
    }


    public function showLogin(){
        return view('panel-login.seller');
    }

    public function submitLogin(SubmitLoginRequest $request){
        if (Auth::guard('seller')->attempt($request->validated())){
            $request->session()->regenerate();
            return redirect(route('panel.seller'));
        }
        return back()->withErrors([
            'message'=>'اطلاعات وارد شده صحیح نمی باشد.'
        ]);
    }

    public function logout(){
        Auth::guard('seller')->logout();
        return redirect(route('seller.login.show'));
    }


}
