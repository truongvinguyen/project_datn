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
                                                        src="/upload/product/{{$item['productInfo']->product_image}}"
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
                                                <input id="quanty-item-{{$item['productInfo']->id}}" class="form-control input-sm" type="text" value="{{$item['quanty']}}"></td>
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
                                            <td colspan="50" class="a-right last"><button type="button"
                                                    title="Continue Shopping" class="button btn-continue"
                                                    onclick="setLocation('#')"><span>Tiếp tục mua sắm</span></button>
                                                <button type="submit" name="update_cart_action" value="update_qty"
                                                    title="Update Cart" class="button btn-update"><span>Cập nhật giỏ
                                                        hàng</span></button>
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
                                            <td style="" class="a-left" colspan="1"> Phí vận chuyển: </td>
                                            <td style="" class="a-right"><span class="price">30.000 đ</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <ul class="checkout">
                                    <li>
                                        <button type="button" title="Proceed to Checkout"
                                            class="button btn-proceed-checkout"><span>Tiến hành thanh
                                                toán</span></button>
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

<div class="our-clients">
    <div class="container">
        <div class="slider-items-products">
            <div id="our-clients-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col6">

                    <!-- Item -->
                    <div class="item"> <a href="#"><img src="/client/images/brand1.png" alt="Image" class="grayscale"></a>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item"> <a href="#"><img src="/client/images/brand2.png" alt="Image" class="grayscale"></a>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item"> <a href="#"><img src="/client/images/brand3.png" alt="Image" class="grayscale"></a>
                    </div>
                    <!-- End Item -->

                    <!-- Item -->
                    <div class="item"> <a href="#"><img src="/client/images/brand4.png" alt="Image" class="grayscale"></a>
                    </div>
                    <!-- End Item -->
                    <!-- Item -->
                    <div class="item"> <a href="#"><img src="/client/images/brand5.png" alt="Image" class="grayscale"></a>
                    </div>
                    <!-- End Item -->
                    <!-- Item -->
                    <div class="item"> <a href="#"><img src="/client/images/brand6.png" alt="Image" class="grayscale"></a>
                    </div>
                    <!-- End Item -->
                    <!-- Item -->
                    <div class="item"> <a href="#"><img src="/client/images/brand7.png" alt="Image" class="grayscale"></a>
                    </div>
                    <!-- End Item -->

                </div>
            </div>
        </div>
    </div>
</div>


@endsection