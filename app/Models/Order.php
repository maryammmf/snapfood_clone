<?php

namespace App\Models;

use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
use App\Models\User\Cart;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'price',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class);
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

//    public function foods(){
//        return $this->belongsToMany(Food::class);
//    }
}
