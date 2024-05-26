<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\ResponsToCommentRequest;
use App\Models\User\Comment;
use Illuminate\Http\Request;

class SellerCommentController extends Controller
{
    public function response(ResponsToCommentRequest $request , int $commentId)
    {
        $validated = $request->validated();
        $comment = Comment::query()->find($commentId);
        $comment->response = $validated;
        $comment->save();
        return redirect()->back()->with('success', 'پاسخ شما ثبت شد.');
    }

    public function approve()
    {

    }

    public function delete()
    {

    }
}
