<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\ResponsToCommentRequest;
use App\Models\Order;
use App\Models\User\Comment;
use Illuminate\Http\Request;

class SellerCommentController extends Controller
{
    public function response(ResponsToCommentRequest $request , int $orderId)
    {
        $validated = $request->validated();
        $cartId = Order::cartIdByOrderId($orderId);
        $comment = Comment::commentByCartId($cartId)->first();
        $comment->response = $validated['message'];
        $comment->save();
        return redirect()->back();
    }

    public function approve(int $commentId)
    {
        Comment::query()->find($commentId)->update(['status' => true]);
        return redirect()->back();
    }

    public function delete(int $commentId)
    {
        Comment::query()->find($commentId)->delete();
        return redirect()->back();
    }
}
