<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hoodie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'meta_description', 
        'main_image', 
        'mobile_image'
    ];
}
