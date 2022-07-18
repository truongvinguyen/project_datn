<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [

       
        'customer_name',
        'customer_phone',
        'customer_address',
        'customer_note',
        'ship_fee',
        'total_quantity',
        'total_price',
        'created_at',
        'updated_at'

        
       
    ];
}
