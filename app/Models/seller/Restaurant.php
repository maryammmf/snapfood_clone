<?php

namespace App\Models\seller;

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
    ];
}
