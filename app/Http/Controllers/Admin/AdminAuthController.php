<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubmiteLoginRequest;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    public function login(){
        return view('admin.login');

    }


    public function submitLogin(SubmiteLoginRequest $request){
        if(Auth::guard('admin')->attempt($request->validated())){
            return redirect(route('admin.panel'));
        }
        return __('request.incorrect_info');
    }

}
