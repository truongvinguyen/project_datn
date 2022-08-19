@if(Session::has('cart') != null)
<div class="modal-body">
    <!-- Begin shopping cart content -->
    <div class="cart-content">
        <ul class="cart-product-list">
            @foreach(Session::get('cart')->products as $item)
            <li>

                <!-- Begin shopping cart product -->
                <div class="cart-product"> <a href="#" class="cart-pr-thumb bg-image"><img
                            src="public/upload/product/{{$item['productInfo']->product_image}}" alt="Lorem ipsum dolor"
                            width="65"></a>
                    <div class="cart-pr-info"> <a href="#"
                            class="cart-pr-title">{{$item['productInfo']->product_name}}</a>
                        <div class="cart-pr-price"> {{number_format($item['productInfo']->price)}}</div>
                        <div class="cart-pr-quantity">Số lượng: <span>{{$item['quanty']}}</span> | Size:
                            {{$item['productInfo']->product_size}}</div>
                    </div>
                    <a href="javascript:" onclick="deleteCart({{$item['productInfo']->id}})" class="cart-pr-remove"
                        >×</a>
                </div>
                <!-- End shopping cart product -->
            </li>
            @endforeach

        </ul>
    </div>
    <!-- End shopping cart content -->

</div>
<div class="modal-footer padding-vertical-0">
    <div class="cart-total"> <strong>Tổng giỏ hàng:</strong> <span>tổng
            cộng:{{number_format(Session::get('cart')->totalPrice)}} vnđ</span> </div>
            <input type="hidden" id="totalqtyshow" value="{{Session::get('cart')->totalQty}}">
    <div class="row">
        <div class="col-xs-6 no-padding"> <a href="{{route('cart.viewcart')}}" class="view-cart no-margin">xem giỏ hàng</a>
        </div>
        <!-- /.col -->

        <div class="col-xs-6 no-padding"> <a href="{{route('checkout')}}" class="btn-checkout no-margin">thanh toán</a> </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<hr>

@else
<span>giỏ hàng của bạn đang trống</span>
@endif