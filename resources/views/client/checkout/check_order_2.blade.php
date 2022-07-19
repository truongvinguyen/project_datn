
   
    <div style="width:600px;margin:0 auto">
        <h5>Dear: {{$order->customer_name}} </h5>
        <p>Bạn thân mến! bạn vừa đặt hàng thành công tại trendy shop</p>
        <p>dưới đây là thông tin đơn hàng của bạn</p>
        <p></p>
        <h5>Thông tin đơn hàng</h5>
        <b>Họ và tên: </b><i>{{$order->customer_name}}</i> <br>
        <b>Điện thoại: </b><i>{{$order->customer_phone}}</i> <br>
        <b>Địa chỉ: </b><i>{{$order->customer_address}}</i> <br>
        <b>Phí ship: </b><i>{{number_format($order->ship_fee)}}</i> <br>
        <b>Tổng thanh toán: </b><i>{{number_format($order->total_price)}}</i> <br>

        <table style="text-align: center;width: 100%;" border="1">
            @foreach($order_detail as $item)
            <tr>
                <th>Tên</th>
                <th>Size</th>
                <th>giá/số lượng</th>
                <th>Tổng</th>
            </tr>
              <tr>
                <td>{{$item['productInfo']->product_name}}</td>
                <td>{{$item['productInfo']->product_size}}</td>
                <td>{{$item['quanty']}} x {{number_format($item['productInfo']->price)}}</td>
                <td>{{number_format($item['productInfo']->price*$item['quanty'])}}</td>
              </tr>
            @endforeach
        </table>
        {{-- <div style="text-align: center;"> 
          <a href="{{ route('accept', ['id'=>$order->id]) }}" style="display:inline-block;background:green;color:white;padding:7px 25px;">Xác nhận đơn hàng</a>
        </div> --}}

    </div>