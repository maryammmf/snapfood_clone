<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\ResponsToCommentRequest;
use App\Models\Order;
use App\Models\User\Comment;
use App\Models\User\User;
use Illuminate\Http\Request;

class SellerCommentController extends Controller
{

    public function index()
    {
        $comments = Comment::query()->where('delete_request' , '=' , 1)->paginate(5);
        $userName = [];
        if ($comments->isNotEmpty()){
            $userId = $comments->pluck('user_id')->toArray();
            $userName = User::query()->where('id' , $userId)->pluck('name');
        }
        return view('panel-pages.admin.comments.index' , compact(['comments' , 'userName']));
    }


    public function response(ResponsToCommentRequest $request , int $commentId)
    {
        $validated = $request->validated();
//        $cartId = Order::cartIdByOrderId($orderId);
//        $comment = Comment::commentByCartId($cartId)->first();
//        dd($comment , $cartId);
//        $comment->response = $validated['message'];
//        $comment->save();

//        dd($validated , $validated['message']);
        Comment::query()->find($commentId)->update(['response' => $validated['message']]);

        return redirect()->back();
    }

    public function approve(int $commentId)
    {
        Comment::query()->find($commentId)->update(['status' => true]);
        return redirect()->back();
    }

    public function sendDeleteRequest(int $commentId)
    {
        Comment::query()->find($commentId)->update(['delete_request' => true]);
        return redirect()->back();
    }
}
