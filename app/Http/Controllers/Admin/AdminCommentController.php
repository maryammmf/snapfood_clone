<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User\Comment;
use App\Models\User\User;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
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

    public function destroy(int $commentId)
    {
        Comment::query()->find($commentId)->delete();
        return redirect()->back();
    }
}
