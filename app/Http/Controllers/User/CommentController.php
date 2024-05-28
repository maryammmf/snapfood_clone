<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\AddCommentRequest;
use App\Http\Resources\CommentIndexResource;
use App\Models\Order;
use App\Models\User\Cart;
use App\Models\User\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $restaurantId)
    {

        $cartId = Cart::checkCartRestaurantId($restaurantId)->pluck('id');
//        dd($cartId);
        $comment = Comment::filterComment($cartId)->get();
        return response()->json([
            'comments' => CommentIndexResource::collection($comment)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCommentRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::guard('customer')->id();
        $validated['food_id'] = Cart::with('foods')
                                ->where('id' , $request->cart_id)
                                ->pluck('food_id')
                                ->first();
        $validated['food_id'] =
        Comment::query()->create($validated);
        return response()->json([
            'msg'=>__('response.comment_created_successfully')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $orderId)
    {
        $cartId = Order::cartIdByOrderId($orderId);
        $comments = Comment::commentByCartId($cartId)->paginate(2);
        return view('panel-pages.seller.comments.show' , compact(['comments' ,'orderId']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
    public function destroy()
    {

    }
}
