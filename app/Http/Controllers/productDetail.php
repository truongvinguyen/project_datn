<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use App\Models\product;
use App\Models\imageProduct;
use App\Models\inventory;
use App\Models\Client\UserClient;
use Session;

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
     $checkBuy = 0;
     if(Session::get('userId')){
        $order=DB::table('order')
        ->join('=order_detail','=order_detail.order_id','=','order.id')
        ->join('product_inventory','=order_detail.product_id','=','product_inventory.id')
        ->where('order.customer_id',Session::get('userId'))
        ->where('product_inventory.product_id',$id)
        ->select('product_inventory.product_id')
        ->get();
        $checkBuy = count($order);
     }
    $report = DB::table('rating')
    ->join('customer_user', 'rating.user', '=','customer_user.id')
    ->where('product', $id)
    ->select('rating.*','customer_user.fullname','customer_user.image')
    ->get();
     
    $products = $product->relatedProducts($data->category_id);
    return view('client.cart.product_detail',compact('data','image','size','products','checkBuy','report'));

    }
}
