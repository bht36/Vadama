<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalRequest extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'rental_requests';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'tenant_id',
        'property_id',
        'status',
        'total_price',
        'check_in',
        'check_out',
        'duration',
        'guests',
        'review_status',
        ];

    // Define the relationship with the Tenant (Account) model
    public function tenant()
    {
        return $this->belongsTo(Account::class, 'tenant_id');
    }

    // Define the relationship with the Property model
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
