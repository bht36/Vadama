<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'properties';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'account_id',
        'title',
        'description',
        'location',
        'price_per_month',
        'type',
        'status',
    ];

    // Define the relationship with the Account model (each property belongs to one account)
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    // Optionally, you can define a method for any custom logic on property status, price, etc.
}
