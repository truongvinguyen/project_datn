<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\wishlist;
use Session;
class WishlistController extends Controller
{
    public function index(){
        $data = new wishlist();
        if (Session::has('userId')) {
            $list = $data->productList(Session::get('userId'));
            return view('client.wishlist.wishlist',compact('list'));
        }
    }

    public function create($product_id){
        $data = new wishlist();
        $product = $data->findId($product_id);
       
        if (Session::has('userId')) {
            if($product == null){
                wishlist::create([
                    'product_id' => $product_id,
                    'user_id' => Session::get('userId'),
                    'created_at' => now()
                ]);
                return redirect()->route('home_client');
            }else{
                return redirect()->route('home_client');
            }
    
        }
    }

    public function destroy($id){
    $del = wishlist::find($id);
    $del->delete();
    return redirect()->route('wishlist');
    }
}

