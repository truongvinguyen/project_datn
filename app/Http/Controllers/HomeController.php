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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notification = DB::table('notification')
        ->select('*')
        ->orderby('id','desc')
        ->orderby('notification_status','desc')
        ->get();
 //số đơn hàng
        $totalOrder =count( DB::table('order')->select('*')->where('status',3)->get());
        $totalProduct = count( DB::table('=order_detail')->join('order','=order_detail.order_id','=','order.id')->select('order.status')->where('order.status','3')->get());
        //tổng doanh thu
        $doanhthu = [];
        $tongdoanhthu = 0;
        $doanhthu =  DB::table('order')->select('total_price','id')->where('status',3)->get();
        foreach($doanhthu as $item){
            $tongdoanhthu += (int)$item->total_price;
        }
        $customer = count(DB::table('customer_user')->select('id')->get());

        
        
        // $khachmua = DB::table('order')->join('customer_user','order.customer_id','=','customer_user.id')->select('customer_user.fullname','customer_user.image','order.*')->orderBy('order.total_price','desc')->limit(5);
        // dd($khachmua);
        return view('home',compact('totalOrder','tongdoanhthu','totalProduct','customer'));


    }
    public function loadNotification(){
        $notification = DB::table('notification')
        ->select('*')
        ->orderby('id','desc')
        ->orderby('notification_status','desc')
        ->get();
        return view('layouts.notification',compact('notification'));
    }
}
