<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function orderByGrid($offset = 0, $limit = 9, String $orderBy = 'id', String $sort = 'desc'){
        $products = DB::table('product') 
        ->orderBy($orderBy, $sort)
        ->offset($offset)->limit($limit) 
        ->get();
        return view('client.product.productGrid',compact('products'));
    }

    public function gridByColumns($columns_name,$cate,$offset = 0, $limit = 6){
        $products = DB::table('product')->where($columns_name, $cate)->offset($offset)->limit($limit) ->get();
        $productAllLength = DB::table('product')->where('category_id','=',$cate)->count();
        $cate_id = $cate;
        return view('client.product.productCate',compact('cate_id','products','productAllLength'));
    }

}
