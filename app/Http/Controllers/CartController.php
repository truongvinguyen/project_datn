<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use App\Models\product;
use App\Models\imageProduct;
use App\Models\inventory;
use App\Models\Cart;

class CartController extends Controller
{
    public function add_to_cart(Request $request,$id,$quantity){    
        $product=DB::table('product_inventory')
        ->join('product','product_inventory.product_id','=','product.id')
        ->select('product_inventory.*','product.product_name','product.product_image')
        ->where('product_inventory.id',$id)
        ->first();
        if($product != null){     
            $cartO = Session('cart') ? Session('cart') : null;
            $newCart = new Cart($cartO);
            $newCart->addCart($product,$id,$quantity);
            $request->session()->put('cart',$newCart);         
        }
        return view('client.cart');
   }
}
