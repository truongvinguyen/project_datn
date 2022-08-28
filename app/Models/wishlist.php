<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [

        'user_id',
        'product_id',
        'created_at',
        'updated_at'

    ];

    public function productList($user_id){
        $data = DB::table('wishlist')
        ->selectRaw('wishlist.wishlist_id as id,product_name, product_price, product_price_sale, product_image, product_image, product_id')
        ->join('product','product.id','=','wishlist.product_id')
        ->where('user_id','=',$user_id)
        ->get();
        
        return $data;
    }

    public function findId($product_id){
        $data = DB::table('wishlist')
        ->select('*')
        ->where('product_id','=',$product_id)
        ->orWhere('wishlist_id','=',$product_id)
        ->first();
    
        return $data;
    }
}
