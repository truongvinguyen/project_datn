<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [

       
        'product_name',
        'product_price_sale',
        'product_price',
        'product_content',
        'category_id',
        'product_status',
        'product_image',
        'product_tag',
        'product_tag',
        'product_user',
        'created_at',
        'updated_at'

        
       
    ];

    public function products (String $orderBy = 'qty_sold', String $sort = 'desc'){
        $data = DB::table('product')
        ->selectRaw('product_name, product_price_sale, product_price, product_image, product_content, category_id, product.id as id, sum(sold) as qty_sold')
        ->groupBy('product_inventory.product_id','product.id','product_name','product_price_sale', 'product_content', 'category_id','product_id','product_price', 'product_image')
        ->orderBy($orderBy, $sort)
        ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
        ->get();
        return $data;
    }
    
    public function productByCategory($cate,$offset = 0, $limit = 6){
        $data = DB::table('product')->offset($offset)->limit($limit)->where('category_id','=',$cate);
        return $data;
    }

    public function relatedProducts($cate){
        $data = DB::table('product')->where('category_id','=',$cate)->get();
        return $data;
    }

    public function searchProduct($value,$offset = 0, $limit = 6){
        $data = DB::table('product') ->offset($offset)->limit($limit) ->where('product_name', 'like','%' .$value. '%')->get();

        return $data;
    }


    public function productAll($offset = 0, $limit = 6){
        $data = DB::table('product')
        ->offset($offset)->limit($limit) 
        ->get();
        return $data;
    }

    public function priceLow($offset = 0, $limit = 6){
        $data = DB::table('product')
        ->offset($offset)->limit($limit) 
        ->orderBy('product_price', 'asc')
        ->get();
        return $data;
    }

    public function priceHigh($offset = 0, $limit = 6){
        $data = DB::table('product')
        ->offset($offset)->limit($limit) 
        ->orderBy('product_price', 'desc')
        ->get();
        return $data;
    }

    public function priceSale($offset = 0, $limit = 6){
        $data = DB::table('product')
        ->offset($offset)->limit($limit) 
        ->whereNotNull('product_price_sale')
        ->get();
    
        return $data;
    }

    public function pagination(String $orderBy, String $sort){
        $data = DB::table('product')
        ->orderBy($orderBy, $sort);
        return $data;
    }
}
