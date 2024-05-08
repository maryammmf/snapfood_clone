<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserAddressRequest;
use App\Models\User\User;
use App\Models\User\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserAddressRequest $request)
    {
        $validated = $request->validated();
//        $user_id = User::query()->where('id' , $validated->);
        $address = UserAddress::query()->create($validated);
        dd($address);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
