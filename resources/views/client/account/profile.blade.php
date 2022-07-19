@extends('layouts.client-1')

@section('title')
    Hồ sơ người dùng
@endsection

@section('content')

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
                    <img src="{{ _IMAGE::USER }}user_avatar.jpg" alt="user">
                  </div>
  
                  <!-- end: more-images -->
  
                </div>
                <div class="col-xs-12 col-sm-9 col-lg-9 col-md-9 product-details-area">
                  <div class="product-name">
                    <h1 class="no-cut">Trần Thị Yến Nhi</h1>
                  </div>
                  <div class="ratings">
                    <p class="rating-links">
                      Giới tính:
                      <strong class="separator">Nữ</strong>
                    </p>
                    <p class="pull-right">
                      Tham gia ngày:
                      <strong>21/05/2022</strong>
                    </p>
                  </div>
                  <div class="ratings">
                    <!-- <p class="rating-links">
                      Chức vụ:
                      <strong class="separator">Nhân viên</strong>
                    </p> -->
                    <p class="availability active pull-right">
                      Trạng thái tài khoản:
                      <span>Kích hoạt</span>
                    </p>
                  </div>
                  <div class="product-variation">
                    <div class="ratings">
                      <h4 class="rating-links">
                        <span>Email:</span>
                        &ensp;
                        <strong class="separator">trendyshop@trendy.com.vn</strong>
                      </h4>
                    </div>
                    <div class="ratings">
                      <h4 class="rating-links">
                        <span>Số điện thoại:</span>
                        &ensp;
                        <strong class="separator">012345678</strong>
                      </h4>
                    </div>
                    <div class="ratings">
                      <h4 class="rating-links">
                        <span>Địa chỉ:</span>
                        &ensp;
                        <strong class="separator">Quận 12, TP. Hồ Chí Minh, Việt Nam</strong>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="product-overview-tab">
                <div class="product-tab-inner">
                  <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> <a href="#description" data-toggle="tab"> Mô tả </a> </li>
                    <li> <a href="#recents" data-toggle="tab">Đã mua gần đây</a> </li>
                    <li><a href="#reviews" data-toggle="tab">Đánh giá gần đây</a></li>
                    <li> <a href="#wishlist" data-toggle="tab">Danh sách yêu thích</a> </li>
                  </ul>
                  <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="description">
                      <div class="std">
                        <p>
                          Mô tả về người dùng
                        </p>
                      </div>
                    </div>
                    <div id="recents" class="tab-pane fade">
                    </div>
                    <div class="tab-pane fade" id="reviews">
                    </div>
                    <div class="tab-pane fade" id="wishlist">
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
                        <!-- <li>
                          <label for="jtv1">
                            <h4 class="button"><i class="fa fa-user"></i>&ensp;
                              <span>Trang quản trị</span>
                            </h4>
                          </label>
                        </li> -->
                        <li>
                          <label for="jtv1">
                            <h4 class="button"><i class="fa fa-pencil"></i>&ensp;
                              <span>Chỉnh sửa hồ sơ</span>
                            </h4>
                          </label>
                        </li>
                        <li>
                          <label for="jtv2">
                            <h4 class="button"><i class="fa fa-heart"></i>&ensp;
                              <span>Danh sách yêu thích</span>
                              <span class="count">(2)</span>
                            </h4>
                          </label>
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