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
     $data = DB::table('product')
     ->select('*')
     ->where('id',$id)
     ->get();
     $image =imageProduct::where('product_id',$id)->get();    

     $size = inventory::where('product_id',$id)->get();  
    return view('client.product-detail',compact('data','image','size'));

    }
}
