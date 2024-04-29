<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubmiteLoginRequest;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class AdminAuthController extends Controller
{

    public function login(){
        return view('panel-login.admin');
    }


    public function submitLogin(SubmiteLoginRequest $request){
        if(Auth::guard('admin')->attempt($request->validated())){
            $request->session()->regenerate();
            return redirect(route('panel-login.admin'));
        }
        return back()->withErrors([
            'password' => 'اطلاعات وارد شده صحیح نیست',
        ])->onlyInput('email');

    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect(route('login.show'));
    }

}
