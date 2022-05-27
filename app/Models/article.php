<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
	
	protected $table = 'article';
    protected $primaryKey = 'id';
    protected $guarded = [];
	
	protected $fillable = [

        'articles_title',
        'articles_thumbnail',
        'articles_content'

    ];
	
    public function articleFeedbacks() {
        return $this->hasMany(User::class, 'article_id', 'id');
    }
	
	public function productArticle() {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
	
    public function brandArticle() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
	
    public function categoryArticle() {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
	
    public function articleAuthor() {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }
}
