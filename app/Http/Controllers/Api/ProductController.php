<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function orderByList($offset = 0, $limit = 6, String $orderBy = 'id', String $sort = 'desc'){
        $products = DB::table('product')
        ->orderBy($orderBy, $sort)
        ->offset($offset)->limit($limit) 
        ->get();
        return view('client.product.productList',compact('products'));
    }

    public function orderByGrid($offset = 0, $limit = 6, String $orderBy = 'id', String $sort = 'desc'){
        $products = DB::table('product') 
        ->orderBy($orderBy, $sort)
        ->offset($offset)->limit($limit) 
        ->get();
        return view('client.product.productGrid',compact('products'));
    }

    public function gridPrice(String $orderBy = 'id', String $sort = 'desc'){
        $products = DB::table('product') 
        ->orderBy($orderBy, $sort)
        ->get();
        return view('client.product.productGrid',compact('products'));
    }

    public function gridDiscount(String $orderBy = 'id', String $sort = 'desc', $discount = 'product_price_sale'){
        $products = DB::table('product') 
        ->orderBy($orderBy, $sort)
        ->where($discount, '!=', 'null')
        ->get();
        return view('client.product.productGrid',compact('products'));
    }

    public function listPrice(String $orderBy = 'id', String $sort = 'desc'){
        $products = DB::table('product') 
        ->orderBy($orderBy, $sort)
        ->get();
        return view('client.product.productList',compact('products'));
    }

    public function listDiscount(String $orderBy = 'id', String $sort = 'desc', $discount = 'product_price_sale'){
        $products = DB::table('product') 
        ->orderBy($orderBy, $sort)
        ->where($discount, '!=', 'null')
        ->get();
        return view('client.product.productList',compact('products'));
    }

    public function gridByColumns($columns_name,$cate_id){
        $products = DB::table('product')->where($columns_name, $cate_id)->get();
        return view('client.product.productGrid',compact('products'));
    }

    public function listByColumns($columns_name,$cate_id){
        $products = DB::table('product')->where($columns_name, $cate_id)->get();
        return view('client.product.productList',compact('products'));
    }

    public function show($id)
    {
        //
    }

}
