<?php

namespace App\Models\seller;

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
    ];

    public function categories(){
        return $this->belongsToMany(FoodCategory::class);
    }
}
