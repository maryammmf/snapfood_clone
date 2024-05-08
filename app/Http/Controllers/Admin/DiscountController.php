<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddDiscountRequest;
use App\Http\Requests\Admin\DeleteDiscountRequest;
use App\Models\Admin\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discounts = Discount::all();
        return view('panel-pages.admin.discount.index' , compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel-pages.admin.discount.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDiscountRequest $request)
    {
        Discount::query()->create($request->validated());
        return redirect(route('discount.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteDiscountRequest $request)
    {
        $discount = Discount::findOrFail($request->id);
        $discount->delete();
        return back();
    }

}
