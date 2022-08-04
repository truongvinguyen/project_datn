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
    
    public function productByCategory($cate){
        $data = DB::table('product')->where('category_id','=',$cate)->get();
   
        return $data;
    }

    public function searchProduct($value){
        $data = DB::table('product')->where('product_name','like', '%' .$value. '%')->get();
   
        return $data;
    }
}
