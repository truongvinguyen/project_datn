@extends('layouts.client-1')
@section('title')
Giỏ hàng của bạn
@endsection
@section('content')
<!-- Header -->

<!-- end header -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home text-uppercase"> <a title="Go to Home Page" href="index.html">trang
                            chủ</a><span>&raquo;</span></li>
                    <li class="text-uppercase"><strong>giỏ hàng</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Main Container -->
<section class="main-container col1-layout">
    <div class="main container">
        <div class="col-main">
            <div class="cart">

                <div class="page-content page-order">
                    <div class="page-title">
                        <h2>giỏ hàng</h2>
                    </div>
                    <div id="show-list-cart">
                        @if(Session::has('cart') != null)

                        <div class="order-detail-content">
                            <div class="table-responsive">
                                <table class="table table-bordered cart_summary">
                                    <thead>
                                        <tr>
                                            <th class="cart_product">Sản phẩm</th>
                                            <th>Mô tả</th>
                                            <th class="text-center">Giá</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Tạm tính</th>
                                            <th class="action"><i class="fa fa-trash-o"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Session::get('cart')->products as $item)
                                        <tr>
                                            <td class="cart_product"><a href="#"><img
                                                        src="public/upload/product/{{$item['productInfo']->product_image}}"
                                                        alt="Product"></a></td>
                                            <td class="cart_description">
                                                <p class="product-name"><a
                                                        href="#">{{$item['productInfo']->product_name}}</a></p>
                                                <!-- <small><a href="#">Màu : </a></small><br> -->
                                                <small><a href="#">Kích thước
                                                        :{{$item['productInfo']->product_size}}</a></small>
                                            </td>
                                            <td class="price"><span>{{number_format($item['productInfo']->price)}}
                                                </span></td>
                                            <td class="qty">
                                                <input data-id="{{$item['productInfo']->id}}" id="quanty-item-{{$item['productInfo']->id}}" class="form-control input-sm" type="number" min="1" value="{{$item['quanty']}}"></td>
                                            <td class="price">
                                                <span>{{number_format($item['productInfo']->price*$item['quanty'])}}</span>
                                            </td>
                                            <td class="action">
                                                <a onclick="deleteitemlist({{$item['productInfo']->id}})" href="javascript:">Xóa</a> |
                                                <a onclick="upDateCart({{$item['productInfo']->id}})" href="javascript:">Lưu</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="first last">
                                            <td colspan="50" class="a-right last"><a href="/all-product"><button type="button"title="Continue Shopping" class="button btn-continue"><span>Tiếp tục mua sắm</span></button></a>
                                                <input type="hidden" class="token_saveall" value="{{csrf_token()}}">
                                                <button onclick="upDateAllCart()" type="button"  value="update_qty" title="Update Cart" class="button btn-update update_cart_action"><span>Cập nhật giỏ hàng</span></button>
                                                <button onclick="deleteAllCart()" type="submit" name="update_cart_action" value="empty_cart"
                                                    title="Clear Cart" class="button btn-empty"
                                                    id="empty_cart_button"><span>Xóa giỏ hàng</span></button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>

                        <div class="totals col-sm-4">
                            <h3>Shopping Cart Total</h3>
                            <div class="inner">
                                <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
                                    <colgroup>
                                        <col>
                                        <col width="1">
                                    </colgroup>
                                    <tfoot>
                                        <tr>
                                            <td style="" class="a-left" colspan="1"><strong>Tổng thanh toán:</strong>
                                            </td>
                                            <td style="" class="a-right"><strong><span class="price">
                                                        {{number_format(Session::get('cart')->totalPrice+30000)}}
                                                        đ</span></strong>
                                            </td>
                                            <input type="hidden" id="totalqtyshow" value="{{Session::get('cart')->totalQty}}">
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td style="" class="a-left" colspan="1"> Phí vận chuyển (đơn hàng trên 500,000đ sẽ tự động miễn phí vận chuyển): </td>
                                            <td style="" class="a-right"><span class="price">30.000 đ</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="checkout">
                                    <li>
                                        <a href="{{ route('checkout') }}"><button type="button" title="Proceed to Checkout"class="button btn-proceed-checkout"><span>Tiến hành thanh toán</span></button></a>
                                    </li>
                                    <br>
                                    <!-- <li><a href="multiple_addresses.html" title="Checkout with Multiple Addresses">Checkout with Multiple Addresses</a> </li> -->
                                    <br>
                                </ul>
                            </div>
                            <!--inner-->

                        </div>

                        @else
                        <span>giỏ hàng của bạn đang trống</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- our clients Slider -->




@endsection
