@extends('layouts.client-1')
@section('title')
Trang Chủ
@endsection
@section('content')
<!-- breadcrumb -->
  <!-- Main Slider Area -->
  <div class="main-slider-area">
    <div class="container slider">
      <div class="row">
        <div class="col-md-12 col-xs-12"> 
          <!-- Main Slider -->
          <div class="main-slider">
            <div id='rev_slider_6_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
              <div id='rev_slider_6' class='rev_slider fullwidthabanner'>
                <ul>
                  <li data-transition='slideup' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src="{{asset('/client/images/slider/slider-img1.jpg')}}" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="caption-inner">
                      <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='85'  data-y='145'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>GIẢM GIÁ</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='82'  data-y='200'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>THEO MÙA</div>
                      <div class='tp-caption ExtraLargeTitle jtv-text sft  tp-resizeme' data-x='85'  data-y='258'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>LÊN ĐẾN 55%</div>
                      <div class='tp-caption decs sft  tp-resizeme' data-x='105'  data-y='305'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>Nhiều sản phẩm đang được giảm giá...<br></div>
                      <div class='tp-caption sfb  tp-resizeme ' data-x='105'  data-y='375'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="shop-now-btn">Mua ngay</a></div>
                    </div>
                  </li>
                  <li data-transition='slidedown' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src="client/images/slider/slider-img2.jpg" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                    <div class="caption-inner">
                      <div class='tp-caption LargeTitle sft  tp-resizeme' data-x='85'  data-y='145'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>MÙA HÈ NÀY</div>
                      <div class='tp-caption ExtraLargeTitle sft  tp-resizeme' data-x='82'  data-y='200'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>bộ sưu tập</div>
                      <div class='tp-caption ExtraLargeTitle jtv-text sft  tp-resizeme' data-x='85'  data-y='258'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>giày nữ</div>
                      <div class='tp-caption decs sft  tp-resizeme' data-x='105'  data-y='305'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>Sản phẩm ấn tượng với nhiều đợt khuyến mãi...</div>
                      <div class='tp-caption sfb  tp-resizeme ' data-x='105'  data-y='375'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'><a href='#' class="shop-now-btn">Mua ngay</a></div>
                    </div>
                  </li>
                </ul>
                <div class="tp-bannertimer"></div>
              </div>
            </div>
          </div>
          <!-- End Main Slider --> 
          
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Slider Area --> 


  <div class="container"> 
    <!-- service section -->
    <div class="jtv-service-area">
      <div class="row">
        <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
          <div class="block-wrapper ship">
            <div class="text-des"> <i class="icon-rocket"></i>
              <h3>miễn phí vận chuyển</h3>
              <p>cho hóa đơn ₫500.000 trở lên</p>
            </div>
          </div>
        </div>
        <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
          <div class="block-wrapper return">
            <div class="text-des"> <i class="fa fa-dollar"></i>
              <h3>hoàn tiền nếu lỗi từ sản phẩm</h3>
              <p>quay video khi mở hàng</p>
            </div>
          </div>
        </div>
        <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
          <div class="block-wrapper support">
            <div class="text-des"> <i class="fa fa-headphones"></i>
              <h3>hỗ trợ trực tuyến</h3>
              <p>vào giờ hành chính (thứ 2 - thứ 6)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="best-selling-slider col-sm-6">
        <div class="title_block">
          <h3 class="products_title">Bán chạy nhất</h3>
        </div>
        <div class="slider-items-products">
          <div id="best-selling-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col4">
              @foreach($best_product as $product)
              <div class="product-item">
                <div class="item-inner">
                  <div class="product-thumbnail">
                    @if($product->product_price_sale != null)
                      <div class="icon-sale-label sale-left">
                          {{round((($product->product_price_sale-$product->product_price)/$product->product_price_sale)*100)}}%
                      </div>
                    @endif
                    <div class="box-hover">
                      <div class="btn-quickview">  
                          <a href="#" onclick="quickviewProduct({{$product->id}})" id="modal" data-toggle="modal" data-target="#modal-quickview"><i class="fa fa-search-plus" aria-hidden="true"></i>Xem nhanh</a>
                        </button> 
                      </div>
                      <div class="add-to-links" data-role="add-to-links"> <a href="wishlist.html" class="action add-to-wishlist" title="Add to Wishlist"></a> <a href="compare.html" class="action add-to-compare" title="Add to Compare"></a> </div>
                    </div>
                    <a href="/product-detail/{{$product->id}}" class="product-item-photo"> <img class="product-image-photo" src="/upload/product/{{$product->product_image}}" alt=""></a> </div>
                  <div class="pro-box-info">
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title">
                          <h4> <a title="Product Title Here" href="/product-detail/{{$product->id}}">{{$product->product_name}}</a></h4>
                        </div>
                        <div class="item-content">
                          
                          <div class="price-box">
                          <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">{{number_format($product->product_price)}}₫</span></p>
                            <p class="special-price"> <span class="price-label">Giá đặt biệt</span> &nbsp;<span class="price">₫{{number_format($product->product_price_sale)}}₫</span> </p>
                            <p class="old-price" style="width:40%;float:right;"> 
                                <span class="price-label">Đã bán:</span> 
                                <span class="qty-sold"> Đã bán: {{$product->qty_sold}} </span> 
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      
      <!-- Featured Products -->
      
      <div class="featured-products-slider col-sm-6">
        <div class="title_block">
          <h3 class="products_title">Mới ra mắt</h3>
        </div>
        <div class="slider-items-products">
          <div id="featured-products-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4">
              @foreach($products as $product)
              <div class="product-item">
                <div class="item-inner">
                  <div class="product-thumbnail">
                    @if($product->product_price_sale != null)
                      <div class="icon-sale-label sale-left">
                          {{round((($product->product_price_sale-$product->product_price)/$product->product_price_sale)*100)}}%
                      </div>
                    @endif
                    <div class="box-hover">
                      <div class="btn-quickview"> <a onclick="quickviewProduct({{$product->id}})" data-toggle="modal" data-target="#modal-quickview"><i class="fa fa-search-plus" aria-hidden="true"></i>Xem nhanh</a> </div>
                      <div class="add-to-links" data-role="add-to-links"> <a href="wishlist.html" class="action add-to-wishlist" title="Add to Wishlist"></a> <a href="compare.html" class="action add-to-compare" title="Add to Compare"></a> </div>
                    </div>
                    <a href="/product-detail/{{$product->id}}" class="product-item-photo"> <img class="product-image-photo img-php" src="/upload/product/{{$product->product_image}}" alt=""></a> </div>
                  <div class="pro-box-info">
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title">
                          <h4> <a title="Product Title Here" href="/product-detail/{{$product->id}}">{{$product->product_name}}</a></h4>
                        </div>
                        <div class="item-content">
                          
                          <div class="price-box">
                          <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">{{number_format($product->product_price)}}₫</span></p> 
                          <p class="special-price"> <span class="price-label">Giá đặt biệt</span> <span class="price">&nbsp;{{number_format($product->product_price_sale)}}₫</span> </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="offer-add">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="jtv-banner-box banner-inner">
              <div class="image"> <a class="jtv-banner-opacity" href="#"><img src="client/images/v.jpg" alt=""></a> </div>
              <div class="jtv-content-text">
                <h3 class="title">Mua 2</h3>
                <span class="sub-title">tặng 1!</span><a href="#" class="button">Mua ngay!</a> </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="jtv-banner-box banner-inner">
              <div class="image"> <a class="jtv-banner-opacity" href="#"><img src="client/images/jisoo.jpg" alt=""></a> </div>
              <div class="jtv-content-text hidden">
                <h3 class="title">Mẫu mới</h3>
              </div>
            </div>
            <div class="jtv-banner-box banner-inner">
              <div class="image "> <a class="jtv-banner-opacity" href="#" style="height: 220px;"><img src="client/images/rose.jpg" alt=""></a> </div>
              <div class="jtv-content-text">
                <h3 class="title">Áo khoác</h3>
              </div>
            </div>
          </div>
          <div class="col-md-5 col-sm-5 col-xs-12">
            <div class="jtv-banner-box">
              <div class="image"> <a class="jtv-banner-opacity" href="#" style="height: 432px;"><img src="client/images/junho.jpg" alt=""></a> </div>
              <div class="jtv-content-text">
                <h3 class="title">màu sắc thời thượng</h3>
                <span class="sub-title">xu hướng thời trang mùa hè năm 2022</span> <a href="#" class="button">Mua ngay!</a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
    <div class="row"> 
      <!-- main container -->
      <div class="home-tab">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12"> 
              <!-- Home Tabs  -->
              
              <div class="tab-info">
                <h3 class="new-product-title pull-left">Gợi ý cho bạn</h3>
                <ul class="nav home-nav-tabs home-product-tabs">
                  <li class="active"><a href="#all" data-toggle="tab" aria-expanded="false"></a></li>
                </ul>
                <!-- /.nav-tabs --> 
              </div>
              <div id="productTabContent" class="tab-content">
                <div class="tab-pane active in" id="all">
                  @foreach($suggestions as $suggestion)
                    <div class="product-item col-md-3 col-sm-6">
                      <div class="item-inner">
                        <div class="product-thumbnail">
                          <!-- <div class="icon-new-label new-left">mới</div> -->
                          <div class="box-hover">
                            <div class="btn-quickview"> <a href="#" onclick="quickviewProduct({{$suggestion->id}})" data-toggle="modal" data-target="#modal-quickview"><i class="fa fa-search-plus" aria-hidden="true"></i>Xem nhanh</a> </div>
                            <div class="add-to-links" data-role="add-to-links"> <a href="wishlist.html" class="action add-to-wishlist" title="Add to Wishlist"></a> <a href="compare.html" class="action add-to-compare" title="Add to Compare"></a> </div>
                          </div>
                          <div class="slider-items-products">
                            <div id="pro1-slider" class="product-flexslider hidden-buttons">
                              <div class="slider-items slider-width-col6"> 
                                <a href="/product-detail/{{$suggestion->id}}" class="product-item-photo"> <img class="product-image-photo" src="/upload/product/{{$suggestion->product_image}}" alt=""></a>
                                <a href="/product-detail/{{$suggestion->id}}" class="product-item-photo"> <img class="product-image-photo" src="/upload/product/{{$suggestion->product_image}}" alt=""></a> 
                                <a href="/product-detail/{{$suggestion->id}}" class="product-item-photo"> <img class="product-image-photo" src="/upload/product/{{$suggestion->product_image}}" alt=""></a> 
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="pro-box-info">
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title">
                                <h4> <a title="Product Title Here" href="/product-detail/{{$suggestion->id}}/{{$suggestion->category_id}}">{{$suggestion->product_name}}</a></h4>
                              </div>
                              <div class="item-content">
                                <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div> -->
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Giá đặt biệt:</span> <span class="price"> {{number_format($suggestion->product_price)}}₫ </span> </p>
                                    <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price"> {{number_format($suggestion->product_price_sale)}}₫ </span> </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            
            <!-- prom banner-->
            <div class="jtv-promotion">
              <div class="container">
                <div class="row">
                  <div class="col-md-4 col-sm-5 col-xs-12">
                    <div class="add-banner wow animated fadeInUp animated"> <a href="#"><img src="client/images/jenni1.jpg" alt="banner"></a> </div>
                  </div>
                  <div class="col-md-8 col-sm-7 col-xs-12">
                    <div class="wrap">
                      <div class="wow animated fadeInRight animated">
                        <div class="box jtv-custom">
                          <div class="box-content">
                            <div class="promotion-center">
                              <p class="text_medium">Chỉ trong mùa hè 2022</p>
                              <div class="text_large">
                                <div class="theme-color">đến 50%</div>
                                Giảm giá</div>
                              <p class="text_small">Tất cả sản phẩm &amp; một số ưu đãi</p>
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
        </div>
      </div>
    </div>
  </div>
  </div>
    <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="title_block">
                <h3 class="products_title">bài viết</h3>
              </div>
            </div>
            <div class="latest-post">
              @foreach($articles as $article)
                <article class="jtv-entry col-md-6">
                  <div class="jtv-post-inner">
                    <div class="feature-post images-hover"> <a href="/article-detail/{{$article->id}}"><img src="/upload/article/{{$article->article_thumbnail}}" alt="image"></a>
                      <div class="overlay"></div>
                    </div>
                    <div class="jtv-content-post">
                      <h4 class="title-post"> <a href="/article-detail/{{$article->id}}">{{$article->article_title}}</a> </h4>
                      <ul class="meta-post">
                        <li class="day"> <a href="#">{{$article->created_at}}/</a> </li>
                        <li class="author"> <a href="#">{{$article->name}} /</a> </li>
                        <li class="travel"> <a href="#">{{$article->brand_name}}</a> </li>
                      </ul>
                      <div class="jtv-entry-post excerpt">
                        <p>{!!$article->article_title!!}</p>
                      </div>
                      <div class="read-more"><a href="/article-detail/{{$article->id}}"><i class="fa fa-caret-right"></i>Xem thêm</a></div>
                    </div>
                  </div>
                </article>
              @endforeach
            </div>
          </div>
        </div>
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
          <!--Newsletter Popup Start -->
          <div id="myModal" class="modal fade">
            <div class="modal-dialog newsletter-popup">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="modal-body">
                        <h2 class="modal-title">bản tin</h2>
                        <form id="newsletter-form" method="post" action="#">
                            <div class="content-subscribe">
                                <div class="form-subscribe-header">
                                    <label>Đăng ký ngay để nhận thông tin cập nhật về chiết khấu & phiếu thưởng</label>
                                </div>
                                <div class="input-box">
                                    <input type="text" class="input-text newsletter-subscribe"
                                        title="Sign up for our newsletter" name="email"
                                        placeholder="Nhập địa chỉ email của bạn">
                                </div>
                                <div class="actions">
                                    <button class="button-subscribe" title="Subscribe" type="submit">đăng ký
                                        ngay</button>
                                </div>
                            </div>
                        </form>
                        <div class="subscribe-bottom">
                            <input name="notshowpopup" id="notshowpopup" type="checkbox">
                            Không hiển thị lại cửa sổ bật lên này
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Newsletter Popup-->
        
  </div>
 
@endsection
<!-- <script src="{{ asset('/client/js/home-page.js') }}"></script> -->