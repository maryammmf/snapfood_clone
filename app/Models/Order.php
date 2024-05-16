<?php

namespace App\Models;

use App\Models\seller\Food;
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

//    public function foods(){
//        return $this->belongsToMany(Food::class);
//    }
}
