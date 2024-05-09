<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserInfoRequest;
use App\Models\User\User;
use App\Models\User\UserAddress;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(44);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInfoRequest $request, int $userId)
    {
        $validated = $request->validated();
        $user = User::query()->where('id' , $userId)->update($validated);
        return response()->json([
            'message' => __('response.update_user_successfully'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
