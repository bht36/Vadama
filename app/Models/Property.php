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
        'checkin_time',
        'checkout_time ',
        'guest',
        'bedroom',
        'bed',
        'bath',
        'amenities', 
        'bathroom', 
        'highlights', 
    ];
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    // A property can have many images
    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id');
    }
    // Property.php
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
