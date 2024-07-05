<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'receipt_number',
        'expiring_date',
        'license_fees',
        'penalty_fees',
        'other_fees',
      
    ];
}
