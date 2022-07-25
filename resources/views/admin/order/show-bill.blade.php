{{-- <div class="row pb-30">
    <div class="col-md-6">
        <h5 class="mb-15">Tên khách hàng</h5>
        <p class="font-14 mb-5">Ngày đặt hàng: {{$order->created_at}} <strong class="weight-600"></strong></p>
        <p class="font-14 mb-5">Hóa đơn số: <strong class="weight-600">{{$order->id}}</strong></p>
    </div>
    <div class="col-md-6">
        <div class="text-right">
            <p class="font-14 mb-5">{{$order->customer_name}}</strong></p>
            <p class="font-14 mb-5">{{$order->customer_address}}</p>
        </div>
    </div>
</div>
<div class="invoice-desc pb-30">
    <div class="invoice-desc-head clearfix">
        <div class="invoice-sub">Tên sản phẩm</div>
        <div class="invoice-rate">Kích thước</div>
        <div class="invoice-hours">Số lượng</div>
        <div class="invoice-subtotal">Giá</div>
    </div>
    <div class="invoice-desc-body">
        <ul>
            @foreach($order_detail as $item)
            <li class="clearfix">
                <div class="invoice-sub">{{$item->product_name}}</div>
                <div class="invoice-rate">{{$item->product_size}}</div>
                <div class="invoice-hours">{{$item->quantity}}</div>
                <div class="invoice-subtotal"><span class="weight-600">{{$item->price}}</span></div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="invoice-desc-footer">
        <div class="invoice-desc-head clearfix">
            <div class="invoice-sub">Bank Info</div>
            <div class="invoice-rate">Due By</div>
            <div class="invoice-subtotal">Total Due</div>
        </div>
        <div class="invoice-desc-body">
            <ul>
                <li class="clearfix">
                    <div class="invoice-sub">
                        <p class="font-14 mb-5">Account No: <strong class="weight-600">123 456 789</strong></p>
                        <p class="font-14 mb-5">Code: <strong class="weight-600">4556</strong></p>
                    </div>
                    <div class="invoice-rate font-20 weight-600">10 Jan 2018</div>
                    <div class="invoice-subtotal"><span class="weight-600 font-24 text-danger">$8000</span></div>
                </li>
            </ul>
        </div>
    </div>
</div>
<h4 class="text-center pb-20">Thank You!!</h4> --}}

<div class="container">
    <div class="brand-section">
        <div class="row">
        </div>
    </div>

    <div class="body-section">
        <div class="row">
            <div class="col-6">
                <h2 class="heading">Số hóa đơn : 00{{$order->id}}</h2>
                <p class="sub-heading">Ngày đặt hàng: {{$order->created_at}} </p>
                <p class="sub-heading">Email: {{$order->customer_email}}</p>
            </div>
            <div class="col-6">
                <p class="sub-heading">Tên khách hàng: {{$order->customer_name}} </p>
                <p class="sub-heading">Địa chỉ giao hàng: {{$order->customer_address}} </p>
                <p class="sub-heading">Số điện thoại: {{$order->customer_phone}} </p>
            </div>
        </div>
    </div>

    <div class="body-section">
        <h3 class="heading">Sản phẩm</h3>
        <br>
        <table class="table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Tên</th>
                    <th class="w-20 text-center">Kích thước</th>
                    <th class="w-20 text-center">Số lượng x giá</th>
                    <th class="w-20 text-center">Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order_detail as $item)
                <tr>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->product_size}}</td>
                    <td>{{$item->quantity}} x {{ number_format($item->price)}}</td>
                    <td>{{number_format($item->quantity*$item->price)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right">Phí giao hàng</td>
                    <td> {{number_format($order->ship_fee)}}</td>
                </tr>
                <tr>
                    <td colspan="3" class="text-right">Tổng thanh toán</td>
                    <td> {{number_format($order->total_price)}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        @if($order->payment_methods==1)
        <h3 class="heading">Trạng thái thanh toán: chưa thanh toán</h3>
        @else
        <h3 class="heading">Trạng thái thanh toán: đã thanh toán (MOMO)</h3>
        @endif
        @if($order->payment_methods==1)
        <h3 class="heading">Phương thức thanh toán: COD</h3>
        @else
        <h3 class="heading">Phương thức thanh toán: Thanh toán online (MOMO)</h3>
        @endif
    </div> 
</div> 