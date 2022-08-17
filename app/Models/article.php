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


    public function article($offset = 0, $limit = 6){
        $articles = article::select('*')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->where('article.article_status','=','1')
        ->select('article.*', 'users.name', 'brand.brand_name')
        ->offset($offset)->limit($limit);
        return $articles;
    }

    public function popular(){
        $articles = DB::table('article')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->orderBy('article_view_count','desc')
        ->where('article.article_status','=','1')
        ->select('article.*', 'users.name', 'brand.brand_name')
        ->limit(4);
        return $articles;
    }


    public function articleOne($id){
        $articles = DB::table('article')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->select('article.*', 'users.name', 'brand.brand_name')
        ->where('article.id','=',$id)
        ->first();
        return $articles;
    }

    public function articleByBrand($cate,$offset = 0, $limit = 6){
        $data = DB::table('article')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->where('brand_id','=',$cate)    
        ->where('article.article_status','=','1')
        ->offset($offset)->limit($limit);
        return $data;
    }

    public function status($cate){
        $data = DB::table('article')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->select('article.*', 'users.name', 'brand.brand_name')
        ->where('brand_id','=',$cate)    
        ->where('article.article_status','=','1');
        return $data;
    }

    public function pageStatus($offset = 0, $limit = 6){
        $data = DB::table('article')
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->select('article.*', 'users.name', 'brand.brand_name')
        ->where('article.article_status','=','1')
        ->offset($offset)->limit($limit);
        return $data;
    }

    public function articleByCategory($cate){
        $data = DB::table('article')
        ->where('brand_id','=',$cate) 
        ->join('users','users.id','=','article.employee_id')
        ->join('brand','brand.id','=','article.brand_id')
        ->select('article.*', 'users.name', 'brand.brand_name');
        return $data;
    }
}
