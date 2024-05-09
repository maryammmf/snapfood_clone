<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequst;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserAuthCotroller extends Controller
{
    public function login(UserLoginRequst $request){
        $user = User::query()->where('email' , $request->email)->firstOrFail();
        if (!Hash::check(request('password') , $user->password)){
            abort(Response::HTTP_UNAUTHORIZED);
        }
        $token = $user->createToken('auth')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user_id' => Auth::id()
        ]);
    }


}
