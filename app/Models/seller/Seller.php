<?php

namespace App\Models\seller;

use App\Models\Order;
use App\Models\User\Cart;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model implements Authenticatable
{
    use HasFactory , \Illuminate\Auth\Authenticatable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    public function orders(){
        return $this->belongsToMany(Order::class);
    }


    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}
