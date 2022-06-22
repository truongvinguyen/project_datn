@extends('layouts.client')
@section('title')
Giỏ hàng của bạn
@endsection
@section('content')
<div class="container" style="margin-top: 45px;">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Shoping Cart
        </span>
    </div>
</div>

<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row" id="show-list-cart">
            @if(Session::has('cart') != null)
            <div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tbody>
                                <tr class="table_head">
                                    <th class="column-1">Sản phẩm</th>
                                    <th class="column-2"></th>
                                    <th class="column-3">Giá | Kích thước</th>
                                    <th class="column-4">Quantity</th>
                                    <th class="column-5">Tổng cộng</th>
                                    <th class="column-6"></th>
                                </tr>
                                @foreach(Session::get('cart')->products as $item)
                                <tr class="table_row">
                                    <td class="column-1">
                                        <div class="how-itemcart1">
                                            <img src="/upload/product/{{$item['productInfo']->product_image}}"
                                                alt="IMG">
                                        </div>
                                    </td>
                                    <td class="column-2">{{$item['productInfo']->product_name}}</td>
                                    <td class="column-3">{{number_format($item['productInfo']->price)}} | size
                                        {{$item['productInfo']->product_size}}</td>
                                    <td class="column-4">
                                        <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                name="num-product1" value="{{$item['quanty']}}">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="column-5">{{number_format($item['productInfo']->price*$item['quanty'])}}
                                    </td>
                                    <td class="column-6"><i class="icon-copy fi-trash" style="font-size: 21px;"></i>  |  <i class="icon-copy fi-save" style="font-size: 21px;"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                name="coupon" placeholder="Coupon Code">

                            <div
                                class="flex-c-m stext-101 cl2 size-118 bg1 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Chọn mã giảm giá
                            </div>
                        </div>

                        <div
                            class="flex-c-m stext-101 cl2 size-119 bg1 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Cập nhật giỏ hàng
                        </div>
                        <div
                            class="flex-c-m stext-101 cl2 size-119 bg1 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                           Tiếp tục mua
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl10 p-b-30">
                        Cart Totals
                    </h4>

                        <div class="size-208">
                            <span class="stext-110 cl10">
                                Tổng cộng:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl10">
                                {{number_format(Session::get('cart')->totalPrice)}} VNĐ
                            </span>
                        </div>
                    </div>
                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                              
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                              
                            </span>
                        </div>
                    </div>

                    <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </button>
                </div>
            </div>
            @else
            <span>giỏ hàng của bạn đang trống</span>
            @endif
        </div>
    </div>
</form>
@endsection