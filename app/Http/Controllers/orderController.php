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
}
