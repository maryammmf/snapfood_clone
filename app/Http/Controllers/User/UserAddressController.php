<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserAddressRequest;
use App\Http\Requests\User\UpdateUserAddressRequest;
use App\Models\User\UserAddress;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        dd(33);
        $addreesses = UserAddress::all();
        dd($addreesses);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAddressRequest $request)
    {
        $validated = $request->validated();
//        $user_id = User::query()->where('id' , $validated->);
        $address = UserAddress::query()->create($validated);
        return response()->json([
            'message' => __('response.store_successfully'),
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        $validated = $request->validated();
        $address = UserAddress::query()->update($validated);
        return response()->json([
            'message' => __('response.update_successfully'),
        ]);
    }


}
