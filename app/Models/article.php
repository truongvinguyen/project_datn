<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class article extends Model
{
    use HasFactory;

    protected $table = 'article';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [

        'article_title',
        'employee_id',
        'article_slug',
        'article_thumbnail',
        'article_content',
        'created_at',
        'updated_at'

    ];

    public function articleFeedbacks()
    {
        return $this->hasMany(User::class, 'article_id', 'id');
    }

    public function productArticle()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

    public function brandArticle()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function categoryArticle()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }

    public function articleAuthor()
    {
        return $this->belongsTo(User::class, 'employee_id', 'id');
    }


    public function article(){
        $articles = article::select('*')
        // ->join('users','users.id','=','article.employee_id')
        // ->join('brand','brand.id','=','article.brand_id')
        ->orderBy('id','DESC')->limit(4)->get();
        return $articles;
    }

    public function articleOne($id){
        $articles = article::select('*')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->where('article.id','=',$id)->first();
        return $articles;
    }

    public function articleByCategory($cate){
        $data = DB::table('article')->where('category_id','=',$cate)->get();
        return $data;
    }
}
