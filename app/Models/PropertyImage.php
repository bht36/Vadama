<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'property_images';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'property_id',
        'image_path',
    ];

    // Define the relationship with the Property model (each image belongs to one property)
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
