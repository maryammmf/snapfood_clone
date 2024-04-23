<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements Authenticatable
{
    use HasFactory , \Illuminate\Auth\Authenticatable;

    protected $fillable=[
        'email',
        'password',
        'name'
    ];
}
