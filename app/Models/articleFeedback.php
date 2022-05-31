<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class articleFeedback extends Model
{
    use HasFactory;
	
	protected $table = 'article_feedback';
    protected $primaryKey = 'id';
    protected $guarded = [];
	
	protected $fillable = [

        'article_id',
        'rating'

    ];
	
	public function articleFeedback() {
        return $this->belongsTo(product::class, 'article_id', 'id');
    }
	
    public function customerFeedback() {
        return $this->belongsTo(Brand::class, 'customer_id', 'id');
    }
}
