<?php

namespace App\Models\seller;

use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
use App\Models\Order;
use App\Models\User\Cart;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
//    protected $table = 'food';

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

    public function scopeSearchFoodName(Builder $query ,string $name)
    {
        return $query->where('name' , $name)->where( 'seller_id' , Auth::id());
    }

    public function scopeSearchFoodCategory(Builder $query ,string $categoryId)
    {
        return $query->where('food_category_id' , $categoryId)->where( 'seller_id' , Auth::id());
    }

    public function scopeCheckSeller(Builder $query)
    {
        return $query->where( 'seller_id' , Auth::id());
    }

    public function scopeCheckFoodId(Builder $query , int $foodId)
    {
        return $query->where('id' , $foodId);
    }

//    protected function photo()
//    {
//        return Attribute::make(
////            get: fn($value)
//
//            get: function ($value){
//                $file = $value;
//                $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
//                $file->move(public_path('images') , $fileName);
//                $this->attributes['photo'] = $fileName;
//            }
//
//        );
//
//
//    }

//    public function getPhotoAttribute($value)
//    {
//        return asset($value);
//    }

//    public function setPhotoAttribute($value)
//    {
//        dd($value , 99);
//        $file = $value;
//        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
//        $file->move(public_path('images') , $fileName);
//        $validated['photo'] = $fileName;
//        $this->attributes['photo'] = $fileName;
//    }


}
