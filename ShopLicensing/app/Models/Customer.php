<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // The attributes that are mass assignable
    protected $fillable = [
        'account_number',
        'tin_number',
        'class_type_goods',
        'vending_details',
        'floor_area',
        'range_number',
        'address_premises',
        'license_name',
        'trading_as',
        'owner_name'
    ];
}
