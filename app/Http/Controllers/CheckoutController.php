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
use Mail;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('client.checkout.checkout');
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function order(Request $request){
        $validate= $request->validate([
            'customer_name'=>['required','min:5'],
            'customer_email'=>['required','email'],
            'customer_address'=>['required'],
            'customer_phone'=>['required'],
            // 'customer_provinces'=>['required'],
            // 'customer_district'=>['required'],
            'payment_methods'=>['required'],
            
        ],[
           'customer_name.required'=>'Họ và tên không được bỏ trống', 
           'product_name.min'=>'Họ và tên tối thiểu 6 ký tự',   
           'customer_email.required'=>'Email không được bỏ trống',
           'customer_email.email'=>'Email không đúng định dạng',
           'customer_address.required'=>'Xã / phường & địa chỉ cụ thể không được bỏ trống',
           'customer_phone.required'=>'Số điện thoại không được bỏ trống',
           'customer_phone.integer'=>'Số điện thoại phải là số nguyên',
        //    'customer_provinces.required'=>'Tỉnh / thành phố không được bỏ trống',
        //    'customer_district.required'=>'Quận / huyện không được bỏ trống',         
        ]);
        //ship
        if(Session()->get('cart')->totalPrice > 500000){
            $ship_price=0;
        }
        else{
            $ship_price=30000;
        }
        //image  notification
        if(Session()->has('userAddress')){
            $notification_image=Session()->get('userImage');
            }
            else{ $notification_image="1";
        }
        if($request->payment_methods==1){
           $data['customer_name'] = $request->customer_name;
           $data['customer_phone'] = $request->customer_phone;
           $data['customer_email'] = $request->customer_email;
           $data['payment_methods'] = $request->payment_methods;
           if(Session()->has('userAddress')){
           $data['customer_address'] = $request->customer_address;
           }else{
           $data['customer_address'] = $request->customer_provinces." / ".$request->customer_district." / ".$request->customer_address;
           }
           $data['customer_note'] = $request->customer_note;
           $data['ship_fee']= $ship_price;
           $data['total_quantity']=Session()->get('cart')->totalQty;
           $data['total_price']=Session()->get('cart')->totalPrice+$ship_price;
           $data['status']=$request->status;
           $data['customer_id']=$request->customer_id;
           $data['created_at']=now();
           $data['updated_at']=now();
           $order_id =DB::table('order')->insertGetId($data);

           foreach(Session()->get('cart')->products as $item){
            order_detail::create([
                'order_id'=>  $order_id,
                'product_id'=>$item['productInfo']->id,
                'quantity'=>$item['quanty'],
                'product_name'=>$item['productInfo']->product_name,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
           }
           notification::create([
            'notification_name'=>"Đơn hàng mới",
            'notification_content'=>$request->customer_name." vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé",
            'notification_image'=>$notification_image,
            'notification_status'=>1,
            'order_id'=> $order_id
        ]);
        if($request->customer_id<1){
            $order_table=DB::table('order')
            ->select('*')
            ->where('id',$order_id)
            ->first();
            $order_detail=Session()->get('cart')->products;
            Mail::send('client.checkout.check_order',compact('order_table','order_detail'),function($mail) use ($request){
                $mail->to($request->customer_email);
                $mail->subject('Xác nhận đơn hàng.');
            });




        }else {
            $order_table=DB::table('order')
            ->select('*')
            ->where('id',$order_id)
            ->first();
            $order_detail=Session()->get('cart')->products;
            Mail::send('client.checkout.check_order_2',compact('order_table','order_detail'),function($mail) use ($request){
                $mail->to($request->customer_email);
                $mail->subject('Đặt hàng thành công.');
            });
        }
        Session()->forget('cart'); 
        }
        else {
        //thanh toán momo

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = Session()->get('cart')->totalPrice+$ship_price;
        $orderId = time() . "";
        $redirectUrl = "http://127.0.0.1:8000/checkout";
        $ipnUrl = "http://127.0.0.1:8000/checkout";
        $extraData = "";
        


            $requestId = time() . "";
            $requestType = "payWithATM";
            // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = array('partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);  // decode json
            //thanh toán
            $order['customer_name'] = $request->customer_name;
            $order['customer_phone'] = $request->customer_phone;
            $order['customer_email'] = $request->customer_email;
            $order['payment_methods'] = $request->payment_methods;
            if(Session()->has('userAddress')){
            $order['customer_address'] = $request->customer_address;
            }else{
            $order['customer_address'] = $request->customer_provinces." / ".$request->customer_district." / ".$request->customer_address;
            }
            $order['customer_note'] = $request->customer_note;
            $order['ship_fee']= $ship_price;
            $order['total_quantity']=Session()->get('cart')->totalQty;
            $order['total_price']=Session()->get('cart')->totalPrice+$ship_price;
            $order['status']=$request->status;
            $order['customer_id']=$request->customer_id;
            $order['created_at']=now();
            $order['updated_at']=now();
 
            $order_id =DB::table('order')->insertGetId($order);
 
            foreach(Session()->get('cart')->products as $item){
             order_detail::create([
                 'order_id'=>  $order_id,
                 'product_id'=>$item['productInfo']->id,
                 'quantity'=>$item['quanty'],
                 'product_name'=>$item['productInfo']->product_name,
                 'created_at'=>now(),
                 'updated_at'=>now(),
             ]);
            }
            notification::create([
             'notification_name'=>"Đơn hàng mới",
             'notification_content'=>$request->customer_name." vừa đặt 1 đơn hàng mới, bạn vui lòng xử lý đơn hàng này nhé",
             'notification_image'=>$notification_image,
             'notification_status'=>1,
             'order_id'=> $order_id
         ]);

         if($request->customer_id<1){
            $order_table=DB::table('order')
            ->select('*')
            ->where('id',$order_id)
            ->first();
            $order_detail=Session()->get('cart')->products;
            Mail::send('client.checkout.check_order',compact('order_table','order_detail'),function($mail) use ($request){
                $mail->to($request->customer_email);
                $mail->subject('Xác nhận đơn hàng.');
            });
        }else {
            $order_table=DB::table('order')
            ->select('*')
            ->where('id',$order_id)
            ->first();
            $order_detail=Session()->get('cart')->products;
            Mail::send('client.checkout.check_order_2',compact('order_table','order_detail'),function($mail) use ($request){
                $mail->to($request->customer_email);
                $mail->subject('Đặt hàng thành công.');
            });
        }
         Session()->forget('cart'); 
        
            //Just a example, please check more in there
           return redirect()->to($jsonResult['payUrl']);
            // header('Location: ' . $jsonResult['payUrl']);
    

        //
        }
    echo "thanh toán thành công vui lòng kiểm tra mail của bạn";
    }
    public function accept($id){
       
        order::find($id)->update([
            'status'=>2
        ]);
        echo "xác nhận đơn hàng thành công";
    }
}