<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{
    use HasFactory;
    protected $table = 'notification';
    protected $fillable = [

       
        'notification_name',
        'notification_content',
        'notification_image',
        'notification_status',
        'order_id'

        
       
    ];
}
