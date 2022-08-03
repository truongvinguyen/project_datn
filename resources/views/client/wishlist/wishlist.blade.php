@extends('layouts.client-1')
@section('title')
Trang Sản Phẩm Yêu Thích
@endsection
@section('content')
  <section class="main-container col2-right-layout">

    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Sản phẩm yêu thích của bạn</h2>
            </div>
            <div class="wishlist-item table-responsive">
              <table class="col-md-12">
                <thead>
                  <tr>
                    <th class="th-delate">Xóa</th>
                    <th class="th-product">Hình</th>
                    <th class="th-details">Tên sản phẩm</th>
                    <th class="th-price">Giá bán</th>
                    <th class="th-price">Giá đặc biệt</th>
                    <th class="th-total th-add-to-cart"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($list as $wishlist)
                  
                      <tr id="/del/{{$wishlist->id}}">
                        <td class="th-delate" id="th-delate"><a href="/wishlist/delete/{{$wishlist->id}}">X</a></td>
                        <td class="th-product"><a href="/product-detail/{{$wishlist->product_id}}"><img src="/upload/product/{{$wishlist->product_image}}" alt="cart"></a></td>
                        <td class="th-details"><h2><a href="/product-detail/{{$wishlist->product_id}}">{{$wishlist->product_name}}</a></h2></td>
                        @if($wishlist->product_price_sale)
                          <td class="th-price regular">{{number_format($wishlist->product_price_sale)}}₫</td>
                          <td class="th-price price">{{number_format($wishlist->product_price)}}₫</td>
                        @else
                          <td class="th-price regular">{{number_format($wishlist->product_price)}}₫</td>
                          <td class="th-price price"></td>
                        @endif
                        <th class="td-add-to-cart"><a href="/product-detail/{{$wishlist->product_id}}">Xem lại sản phẩm</a></th>
                      </tr>
                   
                  @endforeach
                </tbody>
              </table>
            </div>
           
          </div>
        </div>
        <!-- <aside class="right sidebar col-sm-3 col-xs-12">
          <div class="sidebar-account block">
            <div class="sidebar-bar-title">
              <h3>Tài khoản của bạn</h3>
            </div>
            <div class="block-content">
              <ul>
                <li><a>Account Dashboard</a></li>
                <li><a href="#">Account Information</a></li>
                <li><a href="#">Address Book</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="#">Billing Agreements</a></li>
                <li><a href="#">Recurring Profiles</a></li>
                <li><a href="#">My Product Reviews</a></li>
                <li><a href="#">My Tags</a></li>
                <li class="current"><a href="#">My Wishlist</a></li>
                <li><a href="#">My Downloadable</a></li>
                <li class="last"><a href="#">Newsletter Subscriptions</a></li>
              </ul>
            </div>
          </div>
     
        </aside> -->
      </div>
      @if(Session::has('success'))
        <div id="dislike" class="bg-success">
              <h4 class="text-light m-auto">{{Session::get('success')}}</h4>
          </div>
        </div>
      @endif
    </div>
   
  </section>
  <script src="{{asset('client/js/jquery.min.js')}}"></script>
  <script src="{{ asset('/client/js/wishlist.js') }}"></script>
@endsection