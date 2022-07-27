<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use App\Models\product;
use App\Models\order;
use App\Models\notification;
use App\Models\order_detail;
use App\Models\imageProduct;

class orderController extends Controller
{
   public function new_order(){
     $order=DB::table('order')
     ->select('*')
     ->where('status','<',2)
     ->orderby('id','desc')
     ->get();
     return view('admin.order.new',compact('order'));
   }
   public function orderProcessed(){
    $order=DB::table('order')
    ->select('*')
    ->where('status','=',2)
    ->orderby('id','desc')
    ->get();
    return view('admin.order.processed',compact('order'));
    }
   public function showBill($id){
    $order=DB::table('order')
    ->select('*')
    ->where('id',$id)
    ->first();
    $order_detail=DB::table('product_inventory')
    ->join('=order_detail','=order_detail.product_id','=','product_inventory.id')
    ->select('product_inventory.*','=order_detail.product_name','=order_detail.quantity')
    ->where('order_id',$id)
    ->get();
    return view('admin.order.show-bill',compact('order','order_detail'));
   }
   public function confirmOrder($id){
   order::find($id)->update([
      'status'=>2,
    ]);
    $order=DB::table('order')
    ->select('*')
    ->where('status','<',2)
    ->orderby('id','desc')
    ->get();
    return view('admin.order.order-new-cut',compact('order'));
   }
}
