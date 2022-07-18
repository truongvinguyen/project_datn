<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Redirect;
use App\Models\product;
use App\Models\order;
use App\Models\order_detail;
use App\Models\imageProduct;

class CheckoutController extends Controller
{
    public function order(Request $request){
        $validate= $request->validate([
            'customer_name'=>['required','min:5'],
            'customer_email'=>['required','email'],
            'customer_address'=>['required'],
            'customer_phone'=>['required','integer'],
            'customer_provinces'=>['required'],
            'customer_district'=>['required'],
            'payment_methods'=>['required'],
            
        ],[
           'customer_name.required'=>'Họ và tên không được bỏ trống', 
           'product_name.min'=>'Họ và tên tối thiểu 6 ký tự',   
           'customer_email.required'=>'Email không được bỏ trống',
           'customer_email.email'=>'Email không đúng định dạng',
           'customer_address.required'=>'Xã / phường & địa chỉ cụ thể không được bỏ trống',
           'customer_phone.required'=>'Số điện thoại không được bỏ trống',
           'customer_phone.integer'=>'Số điện thoại phải là số nguyên',
           'customer_provinces.required'=>'Tỉnh / thành phố không được bỏ trống',
           'customer_district.required'=>'Quận / huyện không được bỏ trống',         
        ]);
        if(Session()->get('cart')->totalPrice > 500000){
            $ship_price=0;
        }
        else{
            $ship_price=30000;
        }
        if($request->payment_methods==1){
           $data['customer_name'] = $request->customer_name;
           $data['customer_phone'] = $request->customer_phone;
           $data['customer_address'] = $request->customer_provinces." / ".$request->customer_district." / ".$request->customer_address;
           $data['customer_note'] = $request->customer_note;
           $data['ship_fee']= $ship_price;
           $data['total_quantity']=Session()->get('cart')->totalQty;
           $data['total_price']=Session()->get('cart')->totalPrice;
           $data['created_at']=now();
           $data['updated_at']=now();

           $order_id =DB::table('order')->insertGetId($data);

           foreach(Session()->get('cart')->products as $item){
            order_detail::create([
                'order_id'=>  $order_id,
                'user_id'=>0,
                'product_id'=>$item['productInfo']->id,
                'quantity'=>$item['quanty'],
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
           }
        }
        else{
            
        }
        echo "thanh toán thành công";
    }
}
