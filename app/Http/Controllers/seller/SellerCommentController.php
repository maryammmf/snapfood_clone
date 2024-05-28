<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\seller\food\FindFoodByNameRequest;
use App\Http\Requests\seller\ResponsToCommentRequest;
use App\Models\Order;
use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use App\Models\User\Cart;
use App\Models\User\Comment;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerCommentController extends Controller
{

    public function index()
    {
        $sellerRestaurantId = Restaurant::query()->where('seller_id' , Auth::id())->get()->pluck('id')->toArray();
        $comment = Comment::with('cart')->get();
        $selectComments = $comment->map(function ($comment) use ($sellerRestaurantId){
            if (in_array($comment->cart->restaurant_id , $sellerRestaurantId)){
                return $comment->id;
            }
        });
        $comments = Comment::query()->whereIn('id' , $selectComments)->orderBy('created_at' , 'desc')->paginate(5);
        $foods = Food::query()->whereIn('id' , $comments->pluck('food_id'))->pluck('name' , 'id');
        return view('panel-pages.seller.comments.index' , compact(['comments' , 'foods']));
    }


    public function response(ResponsToCommentRequest $request , int $commentId)
    {
        $validated = $request->validated();
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

    public function search(FindFoodByNameRequest $request)
    {
        $validated = $request->validated();
        $foodInput = Food::query()->where('name' , $validated)->pluck('id');
        if ($foodInput->isEmpty()){
            return redirect()->back()->with('message' , 'چنین غذایی وجود ندارد');
        }
        $comments = Comment::query()->where('food_id' , $foodInput)->orderBy('created_at' , 'asc')->paginate(5);
        $foods = Food::query()->whereIn('id' , $comments->pluck('food_id'))->pluck('name' , 'id');
        return view('panel-pages.seller.comments.index' , compact(['comments' , 'foods']));
    }
}
