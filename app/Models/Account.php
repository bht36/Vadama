<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
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

    // You may also want to use Laravel's hashing function to automatically hash passwords
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
