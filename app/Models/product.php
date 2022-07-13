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

    public function products ($offset = 0, $limit = 6){
        $data = DB::table('product')
        ->selectRaw('product_name, product_price_sale, product_price, product_image, product_content, category_id, product.id as id, CAST(sum(inventory) as int) as qty_sold')
        ->groupBy('product_inventory.product_id','product.id','product_name','product_price_sale', 'product_content', 'category_id','product_id','product_price', 'product_image')
        ->orderBy('product.id','ASC')
        ->offset($offset)->limit($limit)
        ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
        ->get();
        return $data;
    }

    public function productsByBrand($id){
        $data = DB::table('product')
        ->selectRaw('product_name, product_price_sale, product_price, product_image, product_content, category_id, product.id as id, CAST(sum(inventory) as int) as qty_sold')
        ->groupBy('product_inventory.product_id','product.id','product_name','product_price_sale', 'product_content', 'category_id','product_id','product_price', 'product_image')
        ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
        ->join('brand', 'product.id', '=', 'brand.product_id')
        ->where('category_id','=', $id)
        ->get();
        return $data;
    }

    
    public function productsById($id){
        $data = DB::table('product')
        ->selectRaw('product_name, product_price_sale, product_price, product_image, product_content, category_id, product.id as id, CAST(sum(inventory) as int) as qty_sold')
        ->groupBy('product_inventory.product_id','product.id','product_name','product_price_sale', 'product_content', 'category_id','product_id','product_price', 'product_image')
        ->join('product_inventory', 'product.id', '=', 'product_inventory.product_id')
        ->where('product.id','=', $id)
        ->get();
        return $data;
    }
}
