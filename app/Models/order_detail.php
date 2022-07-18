<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table = '=order_detail';
    protected $fillable = [

       
        'order_id',
        'product_id',
        'user_id',
        'quantity',
        'created_at',
        'updated_at'

        
       
    ];
}
