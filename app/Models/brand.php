<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;

    protected $table = 'brand';
    protected $primaryKey = 'id';
    protected $guarded = [];

	protected $fillable = [

        'brand_name',
        'brand_image',
        'brand_status',
		'brand_description'

    ];
	
	public function brandProducts() {
        return $this->hasMany(product::class, 'brand_id', 'id');
    }
	
    public function brandArticles() {
        return $this->hasMany(Brand::class, 'brand_id', 'id');
    }
	
    public function brandCreator() {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
