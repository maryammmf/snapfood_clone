<?php

namespace App\Models\seller;

use App\Models\Admin\Discount;
use App\Models\Admin\FoodCategory;
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
    ];

    public function foodcategories(){
        return $this->belongsToMany(FoodCategory::class ,'food_food_category' );
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }

}
