<?php

namespace App\Models\seller;

use App\Models\Admin\RestaurantCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'restaurant_category_id',
        'number',
        'address',
        'bank_info',
        'seller_id',
        'is_open',
        'schedule',
        'days',
        'days_time',
        'shipping_cost',
        'photo',
    ];

    public function restaurantCategry(){
        return $this->belongsTo(RestaurantCategory::class);
    }

    protected $casts = [
        'schedule' => 'json'
    ];
}
