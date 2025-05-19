<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verify extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id',
        'picture_name',
        'action',
    ];

    // Relationship: A verification belongs to an account
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
