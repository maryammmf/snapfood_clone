<?php

namespace App\Models\seller;

use App\Models\Admin\RestaurantCategory;
use App\Models\Order;
use App\Models\User\Cart;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'restaurant_category_id',
        'number',
        'address',
        'latitude',
        'longitude',
        'bank_info',
        'seller_id',
        'is_open',
        'schedule',
        'shipping_cost',
        'photo',
        'seller_id'

    ];


    protected $casts = [
        'schedule' => 'json'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function restaurantCategry(){
        return $this->belongsTo(RestaurantCategory::class);
    }


    public function seller()
    {
        return $this->hasOne(Seller::class);
    }

    public function scopeCheckSeller(Builder $query)
    {
        return $query->where( 'seller_id' , Auth::id());
    }

    public function scopeCheckRestaurantId( $query , $restaurantId)
    {
        return $query->whereIn('id' , $restaurantId);
    }

}
