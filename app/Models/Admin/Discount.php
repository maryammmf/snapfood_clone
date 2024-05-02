<?php

namespace App\Models\Admin;

use App\Models\seller\Food;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'amount',
        'expired_at',
    ];


    public function food(){
        return $this->hasMany(Food::class);
    }
}
