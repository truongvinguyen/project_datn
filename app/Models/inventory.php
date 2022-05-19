<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'product_inventory';
    protected $fillable = [

       
        'product_size',
        'import_price',
        'price',
        'inventory',
        'sold',    
        'product_id'

        
       
    ];
}
