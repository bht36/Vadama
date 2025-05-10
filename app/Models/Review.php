<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id',
        'property_id',
        'rating',
        'description',
        'problem',
    ];

    // Relationship: A review belongs to a tenant (user)
    public function tenant()
    {
        return $this->belongsTo(Account::class, 'tenant_id');
    }

    // Relationship: A review belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
