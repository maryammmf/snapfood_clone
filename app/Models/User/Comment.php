<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Comment extends Authenticatable
{
    use HasApiTokens , HasFactory;

    protected $fillable = [
        'cart_id',
        'score',
        'message',
        'user_id',
        'food_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function scopeFilterComment($query , $cartId)
    {
        return $query->where('user_id' , Auth::guard('customer')->id())->whereIn('cart_id' , $cartId );
    }

    public function scopeCommentByCartId($query , $cartId)
    {
        return $query->where('cart_id' , $cartId);
    }


}
