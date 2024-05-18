<?php

namespace App\Models\seller;

use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
use App\Models\Order;
use App\Models\User\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'material',
        'price',
        'photo',
        'food_category_id',
        'discount_id',
        'restaurant_id',
        'seller_id',
    ];

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function foodcategories(){
        return $this->belongsToMany(FoodCategory::class ,'food_food_category' );
    }

    public function discount(){
        return $this->belongsTo(Discount::class , 'discount_id');
    }

//    public function orders(){
//        return $this->belongsToMany(Order::class);
//    }

}
