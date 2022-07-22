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
        return view('home');
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
