<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Authenticatable
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'accounts';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'phone_number',
        'email',
        'password',
        'profile_picture',
    ];

    // Define hidden attributes (for example, to hide password in API responses)
    protected $hidden = [
        'password',
    ];
}