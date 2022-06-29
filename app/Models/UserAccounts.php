<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccounts extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'token' , 'fb_id' , 'user_id' , 'image' , 'email' , 'password'
    ];
}
