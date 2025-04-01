<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalSellingRequest extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'rental_selling_requests';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'buyer_id',
        'property_id',
        'status',
    ];

    // Define the relationship with the Buyer (Account) model
    public function buyer()
    {
        return $this->belongsTo(Account::class, 'buyer_id');
    }

    // Define the relationship with the Property model
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
