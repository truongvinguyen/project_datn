@extends('layouts.client-1')
@section('title')
Thanh toán
@endsection
@section('content')
<style>
    .btn-continue{
        display: none !important;
    }
    .totals h3{
        display: none !important;
    }
    .btn-proceed-checkout{
        display: none !important;
    }
    /* From uiverse.io by @lenin55 */
.cl-checkbox {
 position: relative;
 display: inline-block;
}

/* Input */
.cl-checkbox > input {
 appearance: none;
 -moz-appearance: none;
 -webkit-appearance: none;
 z-index: -1;
 position: absolute;
 left: -10px;
 top: -8px;
 display: block;
 margin: 0;
 border-radius: 50%;
 width: 40px;
 height: 40px;
 background-color: rgba(0, 0, 0, 0.6);
 box-shadow: none;
 outline: none;
 opacity: 0;
 transform: scale(1);
 pointer-events: none;
 transition: opacity 0.3s, transform 0.2s;
}

/* Span */
.cl-checkbox > span {
 display: inline-block;
 width: 100%;
 cursor: pointer;
}

/* Box */
.cl-checkbox > span::before {
 content: "";
 display: inline-block;
 box-sizing: border-box;
 margin: 3px 11px 3px 1px;
 border: solid 2px;
 /* Safari */
 border-color: rgba(0, 0, 0, 0.6);
 border-radius: 2px;
 width: 18px;
 height: 18px;
 vertical-align: top;
 transition: border-color 0.2s, background-color 0.2s;
}

/* Checkmark */
.cl-checkbox > span::after {
 content: "";
 display: block;
 position: absolute;
 top: 3px;
 left: 1px;
 width: 10px;
 height: 5px;
 border: solid 2px transparent;
 border-right: none;
 border-top: none;
 transform: translate(3px, 4px) rotate(-45deg);
}

/* Checked, Indeterminate */
.cl-checkbox > input:checked,
.cl-checkbox > input:indeterminate {
 background-color: #018786;
}

.cl-checkbox > input:checked + span::before,
.cl-checkbox > input:indeterminate + span::before {
 border-color: #018786;
 background-color: #018786;
}

.cl-checkbox > input:checked + span::after,
.cl-checkbox > input:indeterminate + span::after {
 border-color: #fff;
}

.cl-checkbox > input:indeterminate + span::after {
 border-left: none;
 transform: translate(4px, 3px);
}

/* Hover, Focus */
.cl-checkbox:hover > input {
 opacity: 0.04;
}

.cl-checkbox > input:focus {
 opacity: 0.12;
}

.cl-checkbox:hover > input:focus {
 opacity: 0.16;
}

/* Active */
.cl-checkbox > input:active {
 opacity: 1;
 transform: scale(0);
 transition: transform 0s, opacity 0s;
}

.cl-checkbox > input:active + span::before {
 border-color: #85b8b7;
}

.cl-checkbox > input:checked:active + span::before {
 border-color: transparent;
 background-color: rgba(0, 0, 0, 0.6);
}

/* Disabled */
.cl-checkbox > input:disabled {
 opacity: 0;
}

.cl-checkbox > input:disabled + span {
 color: rgba(0, 0, 0, 0.38);
 cursor: initial;
}

.cl-checkbox > input:disabled + span::before {
 border-color: currentColor;
}

.cl-checkbox > input:checked:disabled + span::before,
.cl-checkbox > input:indeterminate:disabled + span::before {
 border-color: transparent;
 background-color: currentColor;
}

</style>

<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home text-uppercase"> <a title="Go to Home Page" href="index.html">trang chủ</a><span>&raquo;</span></li>
            <li class="text-uppercase"><strong>thanh toán</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
<!-- Main Container -->
<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
 
        
        <div class="page-content checkout-page"><div class="page-title">
          <h2>thanh toán</h2>
        </div>
        @if((Session::has('userFullname')))
        <h4 class="checkout-sep">1. Lời khuyên</h4>
        <div class="box-border">
            <div class="row">
               <div class="col-sm-12 text-center">
                  Bạn vẫn có thể giữ nguyên hoặc thay đổi thông tin mua hàng của mình
               </div>
            </div>
        </div>
        @else
            <h4 class="checkout-sep">1. Lời khuyên</h4>
            <div class="box-border">
                <div class="row">
                    <div class="col-sm-6">
                        <br>
                        <h4>Đăng nhập và tiết kiệm thời gian!</h4>
                        <p>Đăng nhập với chúng tôi để thuận tiện trong tương lai:</p>
                        <p><i class="fa fa-check-circle text-primary"></i>Thanh toán nhanh chóng và dễ dàng</p>
                        <p><i class="fa fa-check-circle text-primary"></i>Dễ dàng truy cập vào lịch sử và trạng thái đơn hàng của bạn</p>
                    </div>
                    <div class="col-sm-6">
                        <h5>Đăng nhập</h5>
                        <p>Vui lòng đăng nhập bên dưới:</p>
                        <form action="{{route('loginCheckout')}}" method="post">
                          @csrf
                          <label>Email:</label>
                          <div class="input-text">
                            <input type="text" name="email" value="{{old('email')}}" class="form-control input">
                          </div>
                          @error('email')
                            <span style="color:red">{{$message}}</span>
                          @enderror
                          <label>Mật khẩu:</label>
                          <div class="input-text">
                            <input type="password" name="password" value="{{old('password')}}" class="form-control">
                          </div>
                          @error('password')
                            <span style="color:red">{{$message}}</span>
                          @enderror
                          <p><a href="{{ route('getForgotPass') }}">Quên mật khẩu?</a></p>
                          <button class="button" type="submit"><i class="icon-login"></i>&nbsp; <span>Đăng nhập</span></button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
            <h4 class="checkout-sep">2. thông tin thanh toán</h4>
            <form action="{{ route('order') }}" method="POST">
                @csrf
                <div class="box-border" style="display:block;">
                    <ul>
                                        
                        <li class="row">
                            
                        <div class="col-sm-12">
                            
                            <label for="first_name_1" class="required">Họ và tên của bạn</label>
                            @if((Session::has('userFullname')))
                            <input class="input form-control" type="text" name="customer_name" id="customer_name" value="{{Session::get('userFullname')}}">
                            @else
                            <input class="input form-control" type="text" name="customer_name" id="customer_name" value="{{@old('customer_name')}}">
                            @endif
                           
                            @error('customer_name')
                               <span class="text-danger">{{$message}}</span>
                               <style>
                                 #customer_name{
                                    border: 1px solid red;
                                 }
                               </style>
                            @enderror

                        </div><!--/ [col] -->

                      

                        </li><!--/ .row -->

                        <li class="row">
                            
                        <!-- <div class="col-sm-6">
                            
                            <label for="company_name_1">Company Name</label>
                            <input class="input form-control" type="text" name="" id="company_name_1">

                        </div> -->

                        <div class="col-sm-12">
                            
                            <label for="email_address_1" class="required">Địa chỉ email</label>
                            @if((Session::has('userFullname')))
                            <input class="input form-control" type="text" name="customer_email" id="customer_email" value="{{Session::get('userEmail')}}">
                            @else
                            <input class="input form-control" type="text" name="customer_email" id="customer_email" value="{{@old('customer_email')}}">
                            @endif
                            @error('customer_email')
                            <span class="text-danger">{{$message}}</span>
                            <style>
                              #customer_email{
                                 border: 1px solid red;
                              }
                            </style>
                             @enderror
                        </div><!--/ [col] -->

                        </li><!--/ .row -->

                        <li class="row">
                          
                           @if((Session::has('userFullname')))
                           <div class="col-sm-12">
                            <label for="email_address_1" class="required">Địa chỉ giao hàng</label>
                            <input class="input form-control" type="text" name="customer_address" id="telephone_1" value="{{Session::get('userAddress')}}">
                            @error('customer_provinces')
                            <span class="text-danger tinh">{{$message}}</span>
                            <style>
                              .tinh{
                                border: 1px solid red;
                              }
                            </style>
                            @enderror
                          </div>
                           @else
                            <div class="col-sm-4">
                              <label for="email_address_1" class="required">Tỉnh / Thành phố</label>
                              <select class="input form-control tinh" name="calc_shipping_provinces" >
                                  <option value="">Tỉnh / Thành phố</option>
                              </select>
                              @error('customer_provinces')
                              <span class="text-danger tinh">{{$message}}</span>
                              <style>
                                .tinh{
                                  border: 1px solid red;
                                }
                              </style>
                              @enderror
                            </div>
                       
                            <div class="col-sm-4">
                                <label for="email_address_1" class="required">Quận / Huyện</label>
                                <select class="input form-control quan" name="calc_shipping_district" >
                                    <option value="">Quận / Huyện</option>
                              </select>
                              @error('customer_district')
                              <span class="text-danger quan">{{$message}}</span>
                              <style>
                                .quan{
                                    border: 1px solid red;
                                }
                              </style>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label for="email_address_1" class="required">Nhập tên xã / phường và địa chỉ nhà cụ thể</label>
                                <input class="input form-control address" name="customer_address" value="{{@old('customer_address')}}">  
                                @error('customer_address')
                              <span class="text-danger address">{{$message}}</span>
                              <style>
                                .address{
                                    border: 1px solid red;
                                }
                              </style>
                                @enderror 
                            </div>
                            <input class="billing_address_1" name="customer_provinces" type="hidden" value="">
                            <input class="billing_address_2" name="customer_district" type="hidden" value="">
                           @endif
                        </li><!--/ .row -->


                        <li class="row">

                        {{-- <div class="col-sm-6">

                            <label for="postal_code_1" class="required">Mã khuyến mãi</label>
                            <input class="input form-control" type="text" name="" id="postal_code_1">

                        </div><!--/ [col] --> --}}
                        <div class="col-sm-12">

                            <label for="telephone_1" class="required">Diện thoại</label>
                            @if((Session::has('userFullname')))
                            <input class="input form-control" type="number" name="customer_phone" id="telephone_1" value="{{Session::get('userPhone')}}">
                            @else
                            <input class="input form-control" type="number" name="customer_phone" id="telephone_1" value="{{@old('customer_phone')}}">
                            @endif
                            @error('customer_phone')
                            <span class="text-danger address">{{$message}}</span>
                            <style>
                              #telephone_1{
                                 border: 1px solid red;
                              }
                            </style>
                             @enderror 
                        </div><!--/ [col] -->
                        <div class="col-sm-12">

                            <label for="telephone_1" class="required">Lời nhắn</label>
                            <textarea class="input form-control" type="text" name="customer_note" id="telephone_1">{{@old('customer_phone')}}</textarea>

                        </div><!--/ [col] -->
                        @if((Session::has('userFullname')))
                        <input type="hidden" name="status" value="1">
                        @else
                        <input type="hidden" name="status" value="0">
                        @endif
                        @if((Session::has('userFullname')))
                        <input type="hidden" name="customer_id" value="{{Session::get('userId')}}">
                        @else
                        <input type="hidden" name="customer_id" value="0">
                        @endif
                        </li>
                    </ul>
                    {{-- <button class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>tiếp tục</span></button> --}}
                </div>
                <!-- <h4 class="checkout-sep">4. Shipping Method</h4>
                <div class="box-border" style="display:block;">
                    <ul class="shipping_method">
                        <li>
                            <p class="subcaption bold">Free Shipping</p>
                            <label for="radio_button_3"><input type="radio" checked name="radio_3" id="radio_button_3">Free $0</label>
                        </li>

                        <li>
                            <p class="subcaption bold">Free Shipping</p>
                            <label for="radio_button_4"><input type="radio" name="radio_3" id="radio_button_4"> Standard Shipping $5.00</label>
                        </li>
                    </ul>
                    <button class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Continue</span></button>
                </div> -->
                <h4 class="checkout-sep">3. Phương thức thanh toán</h4>
                <div class="box-border" style="display:block;">
                    <ul>
                        <li >
                            <label style="margin-left: 10px" for="radio_button_5" class="cl-checkbox">
                              <input value="1" type="radio" checked name="payment_methods" id="radio_button_5">
                              <span></span>
                            </label>Thanh toán khi nhận hàng
                        </li>

                        <li>
                
                            <label style="margin-left: 10px;z-index: 2;" class="cl-checkbox" for="radio_button_6">
                              <input value="2" type="radio" name="payment_methods" id="radio_button_6">
                              <span></span>
                            </label><img src="/client/images/momo.jpg" style="width:20%;margin-left: -25px ;z-index: 1;" alt="">
                        </li>

                    </ul>
                    {{-- <button class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>tiếp tục</span></button> --}}
                </div>
            
            <h4 class="checkout-sep last">6. Sản phậm trong đơn hàng</h4>
            <div class="box-border" style="display:block;">
            <div class="table-responsive">

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
                                            <input data-id="{{$item['productInfo']->id}}" id="quanty-item-{{$item['productInfo']->id}}" class="form-control input-sm" type="text" value="{{$item['quanty']}}"></td>
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
                                        <td colspan="50" class="a-right last"><a href="/product-grid"><button type="button"title="Continue Shopping" class="button btn-continue"><span>Tiếp tục mua sắm</span></button></a>
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
                    <span>giỏ hàng của bạn đang trống</span> <br>
                    <a href="/product-grid"><button type="button" title="Continue Shopping" class="button btn-continue"><span>Tiếp tục mua sắm</span></button></a>
                    @endif
                </div>
                @if(Session::has('cart') != null)
                </div>
                    <button type="submit" class="button pull-right"><span>Đặt hàng</span></button>
                </div>
                @else
              @endif
        </form>
        </div>
      </div>
      <!-- <aside class="right sidebar col-sm-3 col-xs-12">
        <div class="sidebar-checkout block">
         <div class="sidebar-bar-title">
              <h3>Your Checkout</h3>
            </div>
                 <div class="block-content">
            <dl>
              <dt class="complete"> Billing Address <span class="separator">|</span> <a href="#">Change</a> </dt>
              <dd class="complete">
                <address>
                Deo Jone<br>
                Company Name<br>
                7064 Lorem <br>
                Ipsum <br>
                Vestibulum 0 666/13<br>
                United States<br>
                T: 12345678 <br>
                F: 987654
                </address>
              </dd>
              <dt class="complete"> Shipping Address <span class="separator">|</span> <a href="#">Change</a> </dt>
              <dd class="complete">
                 <address>
                Deo Jone<br>
                Company Name<br>
                7064 Lorem <br>
                Ipsum <br>
                Vestibulum 0 666/13<br>
                United States<br>
                T: 12345678 <br>
                F: 987654
                </address>
              </dd>
              <dt class="complete"> Shipping Method <span class="separator">|</span> <a href="#">Change</a> </dt>
              <dd class="complete"> Flat Rate - Fixed <br>
                <span class="price">$15.00</span> </dd>
              <dt> Payment Method </dt>
            </dl>
          </div>
        </div>
        </aside> -->
    </div>
  </div>
</section>
  <!-- Main Container End -->
   <!-- our clients Slider -->
  
  <div class="our-clients">
    <div class="container">
      <div class="slider-items-products">
        <div id="our-clients-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6"> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="images/brand1.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="images/brand2.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="images/brand3.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="images/brand4.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="images/brand5.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="images/brand6.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="images/brand7.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
  <script>//<![CDATA[
  if (address_2 = localStorage.getItem('address_2_saved')) {
    $('select[name="calc_shipping_district"] option').each(function() {
      if ($(this).text() == address_2) {
        $(this).attr('selected', '')
      }
    })
    $('input.billing_address_2').attr('value', address_2)
  }
  if (district = localStorage.getItem('district')) {
    $('select[name="calc_shipping_district"]').html(district)
    $('select[name="calc_shipping_district"]').on('change', function() {
      var target = $(this).children('option:selected')
      target.attr('selected', '')
      $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
      address_2 = target.text()
      $('input.billing_address_2').attr('value', address_2)
      district = $('select[name="calc_shipping_district"]').html()
      localStorage.setItem('district', district)
      localStorage.setItem('address_2_saved', address_2)
    })
  }
  $('select[name="calc_shipping_provinces"]').each(function() {
    var $this = $(this),
      stc = ''
    c.forEach(function(i, e) {
      e += +1
      stc += '<option value=' + e + '>' + i + '</option>'
      $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
      if (address_1 = localStorage.getItem('address_1_saved')) {
        $('select[name="calc_shipping_provinces"] option').each(function() {
          if ($(this).text() == address_1) {
            $(this).attr('selected', '')
          }
        })
        $('input.billing_address_1').attr('value', address_1)
      }
      $this.on('change', function(i) {
        i = $this.children('option:selected').index() - 1
        var str = '',
          r = $this.val()
        if (r != '') {
          arr[i].forEach(function(el) {
            str += '<option value="' + el + '">' + el + '</option>'
            $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
          })
          var address_1 = $this.children('option:selected').text()
          var district = $('select[name="calc_shipping_district"]').html()
          localStorage.setItem('address_1_saved', address_1)
          localStorage.setItem('district', district)
          $('select[name="calc_shipping_district"]').on('change', function() {
            var target = $(this).children('option:selected')
            target.attr('selected', '')
            $('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
            var address_2 = target.text()
            $('input.billing_address_2').attr('value', address_2)
            district = $('select[name="calc_shipping_district"]').html()
            localStorage.setItem('district', district)
            localStorage.setItem('address_2_saved', address_2)
          })
        } else {
          $('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
          district = $('select[name="calc_shipping_district"]').html()
          localStorage.setItem('district', district)
          localStorage.removeItem('address_1_saved', address_1)
        }
      })
    })
  })
  //]]></script>
@endsection