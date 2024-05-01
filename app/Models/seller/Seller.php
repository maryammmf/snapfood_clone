<?php

namespace App\Models\seller;

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
}
