<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\inventory;
use App\Models\imageProduct;
class showDataController extends Controller
{
    public function product(){
        $data = new product();
        $product = $data->products();
        return  response() ->json($product, 200);
    }

    public function home_page(){

        $data = new product();
        
        $best_product = $data->products();
        $products = $data::all();
        // return compact('new_product');
        return view('client.home-page', compact('best_product','products'));
    }

    public function product_grid(){

        $data = new category();
        $categories = $data::all();
        return view('client.product-grid',compact('categories'));
    }

    public function product_list(){

        $data = new category();
        $categories = $data::all();
        return view('client.product-list',compact('categories'));
    }

    public function product_by_id($id){

        $data = new product();
        $product = $data->productsById($id);
        return  response() ->json($product, 200);
        
    }
    public function quickview (Request $request,$id){
        $data = DB::table('product')
        ->select('*')
        ->where('id',$id)
        ->first();
        $image =imageProduct::where('product_id',$id)->get();    
   
        $size = inventory::where('product_id',$id)->get();  
        return view('client.cart.modal_quickview',compact('data','image','size'));
    }
}
