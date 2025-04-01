<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payer_id',
        'property_id',
        'amount',
        'payment_method',
        'status',
        'transaction_id'
    ];

    // Define relationships
    public function payer()
    {
        return $this->belongsTo(Account::class, 'payer_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
