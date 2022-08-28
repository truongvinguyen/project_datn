@extends('layouts.client-1')

@section('title')
Hồ sơ người dùng
@endsection

@section('content')
<style>
  .navtab {
    height: 40px;
    /* margin: 40px auto; */
    /* background-color: rgba(23, 23, 50, 0.7); */
    text-align: center;
    color: black;
    border-radius: 4px;
  }

  .navtab ul {
    list-style-type: none;
  }

  .navtab .main {
    display: flex;
    justify-content: center;
  }

  .navtab .main>li {
    margin: 0 2%;
  }

  .navtab .main>li a {
    /* border-left:1px solid rgba(23, 23, 50, 1); */
    text-decoration: none;
    color: #666;
    display: block;

  }


  /* .navtab .main > li a:hover {
  background-color: #631818;
} */
</style>
<!-- Breadcrumbs -->

<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul>
          <li class="home text-uppercase"> <a title="Go to Home Page" href="index.html">trang
              chủ</a><span>&raquo;</span></li>
          <li class="text-uppercase"><strong>hồ sơ người dùng</strong></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col2-left-layout">
  <div class="container">
    <div class="row">
      <div class="col-main col-sm-9 col-xs-12">
        <div class="product-view-area">
          <div class="product-big-image col-xs-12 col-sm-3 col-lg-3 col-md-3">
            <div class="large-image">
              @if(Session::get('userImage')==null)
              <img src="https://ui-avatars.com/api/?name={{Session::get('userFullname')}}" alt="">
              @else
              <img src="{{ _IMAGE::USER }}user_avatar.jpg" alt="user">
              @endif
            </div>

            <!-- end: more-images -->

          </div>
          <div class="col-xs-12 col-sm-9 col-lg-9 col-md-9 product-details-area">
            <div class="product-name">
              <h3 class="no-cut">{{$users->fullname}}</h3>
            </div>
            <div class="ratings">
              <p class="rating-links">
                Tham gia ngày:
                <strong>{{$users->create_at}}2</strong>
              </p>

              <p class="pull-right">
                Trạng thái tài khoản:
                <span>Kích hoạt</span>
              </p>
            </div>
            <div class="ratings">
              <!-- <p class="rating-links">
                      Chức vụ:
                      <strong class="separator">Nhân viên</strong>
                    </p> -->
              <p class="availability active pull-right">

              </p>
            </div>
            <div class="product-variation">
              <div class="ratings">
                <h5 class="rating-links">
                  <span>Email:</span>
                  &ensp;
                  <strong class="separator">{{$users->email}}</strong>
                </h5>
              </div>
              <div class="ratings">
                <h5 class="rating-links">
                  <span>Số điện thoại:</span>
                  &ensp;
                  <strong class="separator">{{$users->phone}}</strong>
                </h5>
              </div>
              <div class="ratings">
                <h5 class="rating-links">
                  <span>Địa chỉ:</span>
                  &ensp;
                  <strong class="separator">{{$users->address}}</strong>
                </h5>
              </div>
            </div>
          </div>
        </div>
        <div class="product-overview-tab">
          <div class="product-tab-inner">
            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
              <li class="active"> <a href="#description" data-toggle="tab"> Đã mua gần đây </a></li>
              <li> <a href="#wishlist" data-toggle="tab">Danh sách yêu thích</a> </li>
            </ul>
            <div id="productTabContent" class="tab-content" style="background-color: #f5f5f5;">
              <div class="tab-pane fade in active" id="description">

                <div class="navtab">
                  <ul class="main" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                        data-toggle="tab">Tất cả</a></li>
                    <li role="presentation"><a href="#dangxuly" aria-controls="dangxuly" role="tab"
                        data-toggle="tab">Đang chờ xử lý</a></li>
                    <li role="presentation"><a href="#danggiao" aria-controls="danggiao" role="tab"
                        data-toggle="tab">Đang giao</a></li>
                    <li role="presentation"><a href="#hoanthanh" aria-controls="hoanthanh" role="tab"
                        data-toggle="tab">Đã hoàn thành</a></li>
                    <li role="presentation"><a href="#dahuy" aria-controls="dahuy" role="tab" data-toggle="tab">Đã
                        hủy</a></li>
                  </ul>
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                  {{-- tab tất cả đơn hàng --}}
                  <div role="tabpanel" class="tab-pane active" id="home">
                    @if($order)
                    @foreach ($order as $item)
                    <div class="card"
                      style="margin: 20px;margin-bottom: 20px; background-color: white;padding: 10px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                      <div class="card-header row">
                        <div class="col-md-8">
                          Đơn hàng
                          @if ($item->status == 1)
                          <span style="color:black;background-color:#ffc107;border-radius:3px;"
                            class="badge bg-warning text-dark">Đang chờ xử lý</span>
                          @elseif($item->status == 2)
                          <span style="color:white;background-color:#198754;border-radius:3px;"
                            class="badge bg-warning text-dark">Đang giao</span>
                          @else
                          <span style="border-radius:3px;" class="badge bg-warning text-dark">Đã hoàn thành ngày
                            {{$item->updated_at}}}</span>
                          @endif
                        </div>
                        <div class="col-md-4">
                          <p>Ngày đặt hàng: {{$item->created_at}}</p>
                        </div>
                      </div>
                      @foreach($order_detail as $item2)
                      @if($item2->order_id == $item->id)
                      <div class="card-body row" style="padding: 10px;">
                        <div class="col-md-2">
                          <img src="/upload/product/{{$item2->product_image}}" alt="">
                        </div>
                        <div class="col-md-8">
                          <h5 class="card-title">{{$item2->product_name}}.</h5>
                          <p style="opacity: 0.7;" class="card-text">Kích thước: {{$item2->product_size}}</p>
                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                          <h5 class="card-title">x {{$item2->quantity}}</h5>
                        </div>
                        <div class="col-md-2">
                          <p>{{number_format($item2->price)}} vnđ</p>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      <hr>
                      <div class="card-footer row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                          <p>Phí vận chuyển: {{number_format($item->ship_fee)}}</p>
                          <p class="">Tổng thanh toán: {{number_format($item->total_price)}} vnđ</p>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @endif
                  </div>
                  {{-- tab đơn hàng đang xử lý --}}
                  <div role="tabpanel" class="tab-pane" id="dangxuly">
                    @if($order)
                    @foreach ($order as $item)
                    @if($item->status ==1)
                    <div class="card"
                      style="margin: 20px;margin-bottom: 20px; background-color: white;padding: 10px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                      <div class="card-header row">
                        <div class="col-md-8">
                          Đơn hàng
                          @if ($item->status == 1)
                          <span style="color:black;background-color:#ffc107;border-radius:3px;"
                            class="badge bg-warning text-dark">Đang chờ xử lý</span>
                          @elseif($item->status == 2)
                          <span style="color:white;background-color:#198754;border-radius:3px;"
                            class="badge bg-warning text-dark">Đang giao</span>
                          @else
                          <span style="border-radius:3px;" class="badge bg-warning text-dark">Đã hoàn thành ngày
                            {{$item->updated_at}}}</span>
                          @endif
                        </div>
                        <div class="col-md-4">
                          <p>Ngày đặt hàng: {{$item->created_at}}</p>
                        </div>
                      </div>
                      @foreach($order_detail as $item2)
                      @if($item2->order_id == $item->id)
                      <div class="card-body row" style="padding: 10px;">
                        <div class="col-md-2">
                          <img src="/upload/product/{{$item2->product_image}}" alt="">
                        </div>
                        <div class="col-md-8">
                          <h5 class="card-title">{{$item2->product_name}}.</h5>
                          <p style="opacity: 0.7;" class="card-text">Kích thước: {{$item2->product_size}}</p>
                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                          <h5 class="card-title">x {{$item2->quantity}}</h5>
                        </div>
                        <div class="col-md-2">
                          <p>{{number_format($item2->price)}} vnđ</p>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      <hr>
                      <div class="card-footer row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                          <p>Phí vận chuyển: {{number_format($item->ship_fee)}}</p>
                          <p class="">Tổng thanh toán: {{number_format($item->total_price)}} vnđ</p>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                  </div>
                  {{-- tab đơn hàng đang giao --}}
                  <div role="tabpanel" class="tab-pane" id="danggiao">
                    @if($order)
                    @foreach ($order as $item)
                    @if($item->status ==2)
                    <div class="card"
                      style="margin: 20px;margin-bottom: 20px; background-color: white;padding: 10px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                      <div class="card-header row">
                        <div class="col-md-8">
                          Đơn hàng
                          @if ($item->status == 1)
                          <span style="color:black;background-color:#ffc107;border-radius:3px;"
                            class="badge bg-warning text-dark">Đang chờ xử lý</span>
                          @elseif($item->status == 2)
                          <span style="color:white;background-color:#198754;border-radius:3px;"
                            class="badge bg-warning text-dark">Đang giao</span>
                          @else
                          <span style="border-radius:3px;" class="badge bg-warning text-dark">Đã hoàn thành ngày
                            {{$item->updated_at}}}</span>
                          @endif
                        </div>
                        <div class="col-md-4">
                          <p>Ngày đặt hàng: {{$item->created_at}}</p>
                        </div>
                      </div>
                      @foreach($order_detail as $item2)
                      @if($item2->order_id == $item->id)
                      <div class="card-body row" style="padding: 10px;">
                        <div class="col-md-2">
                          <img src="/upload/product/{{$item2->product_image}}" alt="">
                        </div>
                        <div class="col-md-8">
                          <h5 class="card-title">{{$item2->product_name}}.</h5>
                          <p style="opacity: 0.7;" class="card-text">Kích thước: {{$item2->product_size}}</p>
                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                          <h5 class="card-title">x {{$item2->quantity}}</h5>
                        </div>
                        <div class="col-md-2">
                          <p>{{number_format($item2->price)}} vnđ</p>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      <hr>
                      <div class="card-footer row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                          <p>Phí vận chuyển: {{number_format($item->ship_fee)}}</p>
                          <p class="">Tổng thanh toán: {{number_format($item->total_price)}} vnđ</p>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                  </div>
                  {{-- tab đơn hàng đã hoàn thành --}}
                  <div role="tabpanel" class="tab-pane" id="hoanthanh">
                    @if($order)
                    @foreach ($order as $item)
                    @if($item->status ==3)
                    <div class="card"
                      style="margin: 20px;margin-bottom: 20px; background-color: white;padding: 10px;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                      <div class="card-header row">
                        <div class="col-md-8">
                          Đơn hàng
                          @if ($item->status == 1)
                          <span style="color:black;background-color:#ffc107;border-radius:3px;"
                            class="badge bg-warning text-dark">Đang chờ xử lý</span>
                          @elseif($item->status == 2)
                          <span style="color:white;background-color:#198754;border-radius:3px;"
                            class="badge bg-warning text-dark">Đang giao</span>
                          @else
                          <span style="border-radius:3px;" class="badge bg-warning text-dark">Đã hoàn thành ngày
                            {{$item->updated_at}}}</span>
                          @endif
                        </div>
                        <div class="col-md-4">
                          <p>Ngày đặt hàng: {{$item->created_at}}</p>
                        </div>
                      </div>
                      @foreach($order_detail as $item2)
                      @if($item2->order_id == $item->id)
                      <div class="card-body row" style="padding: 10px;">
                        <div class="col-md-2">
                          <img src="/upload/product/{{$item2->product_image}}" alt="">
                        </div>
                        <div class="col-md-8">
                          <h5 class="card-title">{{$item2->product_name}}.</h5>
                          <p style="opacity: 0.7;" class="card-text">Kích thước: {{$item2->product_size}}</p>
                          {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                          <h5 class="card-title">x {{$item2->quantity}}</h5>
                        </div>
                        <div class="col-md-2">
                          <p>{{number_format($item2->price)}} vnđ</p>
                        </div>
                      </div>
                      @endif
                      @endforeach
                      <hr>
                      <div class="card-footer row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                          <p>Phí vận chuyển: {{number_format($item->ship_fee)}}</p>
                          <p class="">Tổng thanh toán: {{number_format($item->total_price)}} vnđ</p>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                  </div>
                  {{-- tab đơn hàng đã hủy --}}
                  <div role="tabpanel" class="tab-pane" id="dahuy">Không có</div>
                </div>
              </div>
              <div class="tab-pane fade" id="wishlist">
                <div class="main container">
                  <div class="row">
                    <div class="col-main col-sm-9 col-xs-12" style="padding-left: 0 !important;">
                      <div class="my-account" style="margin: 20px;">

                        <div class="wishlist-item table-responsive">
                          <table class="col-md-12">
                            <thead>
                              <tr>
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
                                <td class="th-product"><a href="/product-detail/{{$wishlist->product_id}}"><img
                                      src="/upload/product/{{$wishlist->product_image}}" alt="cart"></a></td>
                                <td class="th-details">
                                  <h2><a
                                      href="/product-detail/{{$wishlist->product_id}}">{{$wishlist->product_name}}</a>
                                  </h2>
                                </td>
                                @if($wishlist->product_price_sale)
                                <td class="th-price regular">{{number_format($wishlist->product_price_sale)}}₫</td>
                                <td class="th-price price">{{number_format($wishlist->product_price)}}₫</td>
                                @else
                                <td class="th-price regular">{{number_format($wishlist->product_price)}}₫</td>
                                <td class="th-price price"></td>
                                @endif
                                <th class="td-add-to-cart"><a href="/product-detail/{{$wishlist->product_id}}">Xem lại
                                    sản phẩm</a></th>
                              </tr>

                              @endforeach
                            </tbody>
                          </table>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <aside class="right sidebar col-sm-3 col-xs-12">
        <div class="block shop-by-side">
          <div class="sidebar-bar-title">
            <h3>Tuỳ chọn</h3>
          </div>
          <div class="block-content">
            <div class="layered-Category">
              <div class="layered-content">
                <ul class="check-box-list check-box-list-tools">
                  <li>
                    <label for="jtv1">
                      <h4 class="button"><i class="fa fa-pencil"></i>&ensp;
                        <span data-toggle="modal" data-target="#edit-profile">Chỉnh sửa hồ sơ</span>
                      </h4>
                    </label>
                  </li>
                  <li>
                    <a href="/wishlist">
                      <label for="jtv2">
                        <h4 class="button"><i class="fa fa-heart"></i>&ensp;
                          <span>Danh sách yêu thích</span>
                        </h4>
                      </label>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="block popular-tags-area ">
          <div class="sidebar-bar-title">
            <h3>Từ khoá gần đây</h3>
          </div>
          <div class="tag">
            <ul>
              <li><a href="#">Quần kaki</a></li>
              <li><a href="#">Áo khoác</a></li>
              <li><a href="#">Quần jean</a></li>
              <li><a href="#">Áo sơ mi</a></li>
            </ul>
          </div>
        </div>
      </aside>
    </div>
  </div>
</div>

<!-- Main Container End -->

<div class="container">
  <!-- service section -->
  <div class="jtv-service-area">
    <div class="row">
      <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
        <div class="block-wrapper ship">
          <div class="text-des"> <i class="icon-rocket"></i>
            <h3>FREE SHIPPING & RETURN</h3>
            <p>Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
      </div>
      <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
        <div class="block-wrapper return">
          <div class="text-des"> <i class="fa fa-dollar"></i>
            <h3>MONEY BACK GUARANTEE</h3>
            <p>Lorem ipsum dolor sit amet.</p>
          </div>
        </div>
      </div>
      <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
        <div class="block-wrapper support">
          <div class="text-des"> <i class="fa fa-headphones"></i>
            <h3>ONLINE SUPPORT 24/7</h3>
            <p>Lorem ipsum dolor sit amet. </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="edit-profile" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="{{ route('update_customer', ['id'=>$users->id]) }}" method="post">
      @csrf
      <div class="row" style="padding: 50px;background-color:#eee;">
        <div class="col-md-5">
          <div class="card-body text-center">
            @if(Session::get('userImage')==null)
            <img src="https://ui-avatars.com/api/?name={{Session::get('userFullname')}}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            @else
            <img src="public/upload/user/{{$users->image}}" alt="avatar" class="rounded-circle img-fluid"
              style="width: 150px;">
            @endif
            <input type="file" name="file" class="form-control">
          </div>
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Họ và tên</p>
              </div>
              <div class="col-sm-9">
                <input type="text" name="fullname" class="form-control" value="{{$users->fullname}}" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <input type="text" name="email" class="form-control" value="{{$users->email}}" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Số điện thoại</p>
              </div>
              <div class="col-sm-9">
                <input type="text" name="phone" class="form-control" value="{{$users->phone}}" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Địa chỉ</p>
              </div>
              <div class="col-sm-9">
                <input type="text" name="address" class="form-control" value="{{$users->address}}" required>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <input style="background:#CF3341;color: #fff;" type="submit" class="form-control" value="Lưu lại">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

  </div>
</div>
<!-- our clients Slider -->
<div class="our-clients">
  <div class="container">
    <div class="slider-items-products">
      <div id="our-clients-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col6">

          <!-- Item -->
          <div class="item"> <a href="#"><img src="client/images/brand1.png" alt="Image" class="grayscale"></a> </div>
          <!-- End Item -->

          <!-- Item -->
          <div class="item"> <a href="#"><img src="client/images/brand2.png" alt="Image" class="grayscale"></a> </div>
          <!-- End Item -->

          <!-- Item -->
          <div class="item"> <a href="#"><img src="client/images/brand3.png" alt="Image" class="grayscale"></a> </div>
          <!-- End Item -->

          <!-- Item -->
          <div class="item"> <a href="#"><img src="client/images/brand4.png" alt="Image" class="grayscale"></a> </div>
          <!-- End Item -->
          <!-- Item -->
          <div class="item"> <a href="#"><img src="client/images/brand5.png" alt="Image" class="grayscale"></a> </div>
          <!-- End Item -->
          <!-- Item -->
          <div class="item"> <a href="#"><img src="client/images/brand6.png" alt="Image" class="grayscale"></a> </div>
          <!-- End Item -->
          <!-- Item -->
          <div class="item"> <a href="#"><img src="client/images/brand7.png" alt="Image" class="grayscale"></a> </div>
          <!-- End Item -->

        </div>
      </div>
    </div>
  </div>
</div>

@endsection