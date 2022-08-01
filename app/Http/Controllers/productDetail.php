<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use App\Models\product;
use App\Models\imageProduct;
use App\Models\inventory;

class productDetail extends Controller
{
    public function index($id){
    $product = new product();
     $data = DB::table('product')
     ->select('*')
     ->leftJoin('wishlist','wishlist.product_id','=','product.id')
     ->where('product.id',$id)
     ->first();
     $image =imageProduct::where('product_id',$id)->get();    

     $size = inventory::where('product_id',$id)->get();  

     $products = $product->productByCategory($data->category_id);
    return view('client.cart.product_detail',compact('data','image','size','products'));

    }
}
