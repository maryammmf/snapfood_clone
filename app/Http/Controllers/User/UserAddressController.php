<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserAddressRequest;
use App\Http\Requests\User\UpdateUserAddressRequest;
use App\Http\Resources\User\UserAddressResource;
use App\Models\User\UserAddress;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addreesses = UserAddress::all();
        return UserAddressResource::collection($addreesses);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAddressRequest $request)
    {
        $validated = $request->validated();
        $address = UserAddress::query()->create($validated);
        return response()->json([
            'message' => __('response.store_successfully'),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserAddressRequest $request ,  $addressId)
    {
        $validated = $request->validated();
        $address = UserAddress::query()->where('id' , $addressId)->update($validated);
        return response()->json([
            'message' => __('response.update_successfully'),
        ]);
    }



}
