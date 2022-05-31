<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'category';
    protected $fillable = [

        'category_name',
        'category_image',
        'category_status'
       
    ];
	
	public function categoryProducts() {
        return $this->hasMany(product::class, 'category_id', 'id');
    }
	
    public function categoryArticles() {
        return $this->hasMany(Brand::class, 'category_id', 'id');
    }
	
    public function categoryCreator() {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}