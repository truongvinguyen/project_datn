<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmlgenius.justthemevalley.com/Version2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jun 2022 11:24:04 GMT -->

<head>
    <!-- Basic page needs -->
    <meta charset="utf-8">
    <!--[if IE]>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <![endif]-->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title')</title>
    <meta name="description" content="">

    <!-- Mobile specific metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon  -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- CSS Style -->
    <link rel="stylesheet" href="{{asset('client/style.css')}}">
</head>

<body class="cms-index-index cms-home-page">

    <!--[if lt IE 8]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

    <div id="page">

        <!-- Header -->
        <header id="header">
            <div class="header-container">
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-6 hidden-xs">
                                <div class="slider-items-products">
                                    <div id="offer-slider" class="product-flexslider hidden-buttons">
                                        <div class="slider-items slider-width-col4">
                                            <div class="offer-content-text">
                                                <p><i class="pe-7s-plane"></i> Miễn phí vận chuyển cho đơn hàng từ
                                                    <span>500.000₫</span>
                                                </p>
                                            </div>
                                            <div class="offer-content-text">
                                                <p><i class="pe-7s-like2"></i><span>Chất lượng sản phẩm </span>đến từ
                                                    thương hiệu</p>
                                            </div>
                                            <div class="offer-content-text">
                                                <p><i class="pe-7s-gift"></i>Tặng quà khi mua <span>từ 5 sản phẩm trở
                                                        lên</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- top links -->
                            <div class="headerlinkmenu col-md-7 col-sm-7 col-xs-12">
                                <!-- Default Welcome Message -->
                                <div class="welcome-msg hidden-xs">Chào mừng bạn đến với Website</div>
                                <ul class="links">
                                    <li><a href="checkout.html">Thủ tục thanh toán</a></li>
                                    <li><a href="register_page.html">Tạo tài khoản</a></li>
                                    <li><a href="account_page.html">Đăng nhập</a></li>
                                </ul>
                                <div class="language-currency-wrapper pull-right">
                                    <div class="inner-cl">
                                        <div class="block block-language form-language">
                                            <div class="lg-cur"> <span> <span class="lg-fr">Tiếng Việt</span> <i
                                                        class="fa fa-angle-down"></i> </span> </div>
                                            <ul>
                                                <li> <a href="#"><span>English</span> </a> </li>
                                            </ul>
                                        </div>
                                        <div class="block block-currency">
                                            <div class="item-cur"> <span>VND</span> <i class="fa fa-angle-down"></i>
                                            </div>
                                            <ul>
                                                <li> <a class="selected" href="#"><span class="cur_icon">$</span>
                                                        USD</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-md-4 top-search">
                            <!-- Search -->
                            <div id="search">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <button class="btn-search" type="button"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>

                            <!-- End Search -->
                        </div>
                        <!-- Header Logo -->
                        <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4">
                            <div class="mm-toggle-wrap hidden-lg hidden-md hidden-sm">
                                <div class="mm-toggle"> <i class="fa fa-align-justify"></i><span
                                        class="mm-label">Menu</span> </div>
                            </div>
                            <div class="logo"><a title="e-commerce" href="index.html"><img alt="e-commerce"
                                        style="width:30%;" src="/client/images/logo.png"></a> </div>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-xs-12 top-cart">
                            @if(Session::has('cart') != null)
                            <div id="shopping-cart-trigger">
                                <a href="#0" class="cart-icon" title="Shopping Cart" data-toggle="modal"
                                    data-target="#modal-cart"> <i class="fa fa-shopping-bag"></i>
                                    <span class="cart-num" id="showqtycart">{{Session::get('cart')->totalQty}}</span>
                                </a>
                            </div>
                            @else
                            <div id="shopping-cart-trigger">
                                <a href="#0" class="cart-icon" title="Shopping Cart" data-toggle="modal"
                                    data-target="#modal-cart"> <i class="fa fa-shopping-bag"></i>
                                    <span class="cart-num" id="showqtycart">0</span>
                                </a>
                            </div>
                            @endif
                            <!-- End shopping cart trigger -->
                            <a href="account_page.html" class="top-my-account"><i class="fa fa-user"></i></a> <a
                                href="compare.html" class="top-compare"><i class="fa fa-signal"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Header Logo -->

            <nav>
                <!-- Start Menu Area -->
                <div class="menu-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-menu">
                                    <ul class="hidden-xs">
                                        <li class="active custom-menu"><a href="index.html">Trang chủ</a></li>
                                        <li class="megamenu"><a href="shop_grid.html">Sản phẩm <span
                                                    class="menu-item-tag menu-item-tag-new">mới</span></a></li>
                                        <li class="custom-menu"><a href="blog.html">Bài viết</a></li>
                                        <li><a href="contact_us.html">Về chúng tôi</a></li>
                                        <li><a href="contact_us.html">Liên hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content')
        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="footer-newsletter">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-sm-5">
                                    <h3 class="">đăng ký để nhận bản tin</h3>
                                    <span>Nhận các giao dịch mới nhất và ưu đãi đặc biệt</span>
                                </div>
                                <div class="col-md-5 col-sm-7">
                                    <form id="newsletter-validate-detail" method="post" action="#">
                                        <div class="newsletter-inner">
                                            <input class="newsletter-email" name='Email'
                                                placeholder='Nhập email của bạn' />
                                            <button class="button subscribe" type="submit" title="Subscribe">Đăng
                                                ký</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4 col-sm-12">
                                    <div class="social">
                                        <ul class="inline-mode">
                                            <li class="social-network fb"><a title="Connect us on Facebook"
                                                    target="_blank" href="https://www.facebook.com/"><i
                                                        class="fa fa-facebook"></i></a></li>
                                            <li class="social-network googleplus"><a title="Connect us on Google+"
                                                    target="_blank" href="https://plus.google.com/"><i
                                                        class="fa fa-google-plus"></i></a></li>
                                            <li class="social-network tw"><a title="Connect us on Twitter"
                                                    target="_blank" href="https://twitter.com/"><i
                                                        class="fa fa-twitter"></i></a></li>
                                            <li class="social-network linkedin"><a title="Connect us on Linkedin"
                                                    target="_blank" href="https://www.pinterest.com/"><i
                                                        class="fa fa-linkedin"></i></a></li>
                                            <li class="social-network rss"><a title="Connect us on Instagram"
                                                    target="_blank" href="#"><i class="fa fa-rss"></i></a></li>
                                            <li class="social-network instagram"><a title="Connect us on Instagram"
                                                    target="_blank" href="https://instagram.com/"><i
                                                        class="fa fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-12 col-lg-3">
                        <div class="footer-logo"><a href="index.html"><img style="width: 50%;"
                                    src="images/footer-logo.png" alt="fotter logo"></a> </div>
                        <div class="footer-content">
                            <div class="email"> <i class="fa fa-envelope"></i>
                                <p>
                                    <a href="https://htmlgenius.justthemevalley.com/cdn-cgi/l/email-protection"
                                        style="color: white;" class="__cf_email__"
                                        data-cfemail="43103633332c313703372b262e26306d202c2e">
                                        caodang@fpt.edu.vn
                                    </a>
                                </p>
                            </div>
                            <div class="phone"> <i class="fa fa-phone"></i>
                                <p>(028) 6252 3434</p>
                            </div>
                            <div class="address"> <i class="fa fa-map-marker"></i>
                                <p>QTSC, Innovation lô 24, Quang Trung, Q12, Tp.HCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">Hỏi đáp<a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
                            <div class="tabBlock" id="TabBlock-1">
                                <ul class="list-links list-unstyled">
                                    <li><a href="#s">Về chúng tôi</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                    <li><a href="sitemap.html">Câu hỏi thường gặp</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">Danh mục sản phẩm<a class="expander visible-xs"
                                    href="#TabBlock-3">+</a></h3>
                            <div class="tabBlock" id="TabBlock-3">
                                <ul class="list-links list-unstyled">
                                    <li> <a href="sitemap.html">Áo khoác</a> </li>
                                    <li> <a href="#">Quần</a> </li>
                                    <li> <a href="#">Áo thun</a> </li>
                                    <li> <a href="about_us.html">Áo sơ mi</a> </li>
                                    <li> <a href="contact_us.html">Quần short</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">Dịch vụ<a class="expander visible-xs" href="#TabBlock-4">+</a></h3>
                            <div class="tabBlock" id="TabBlock-4">
                                <ul class="list-links list-unstyled">
                                    <li> <a href="account_page.html">Tài khoản</a> </li>
                                    <li> <a href="shopping_cart.html">Giỏ hàng</a> </li>
                                    <li> <a href="#">Chính sách hoàn trả</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-coppyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 coppyright"> Copyright © 2022-2030 <a href="#"> Trendy </a> Đã
                            đăng ký Bản quyền.</div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="payment">
                                <ul>
                                    <li><a href="#"><img title="Visa" alt="Visa" src="images/visa.png"></a></li>
                                    <li><a href="#"><img title="Paypal" alt="Paypal" src="images/paypal.png"></a></li>
                                    <li><a href="#"><img title="Discover" alt="Discover" src="images/discover.png"></a>
                                    </li>
                                    <li><a href="#"><img title="Master Card" alt="Master Card"
                                                src="images/master-card.png"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
        <!-- End Footer -->

        <div id="modal-cart" class="modal modal-right fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Giỏ của bạn</h4>
                    </div>
                    <div id="showcart">
                        @if(Session::has('cart') != null)
                        <div class="modal-body" style="height:85%;">

                            <!-- Begin shopping cart content -->
                            <div class="cart-content">
                                <ul class="cart-product-list">
                                    @foreach(Session::get('cart')->products as $item)
                                    <li>

                                        <!-- Begin shopping cart product -->
                                        <div class="cart-product"> <a href="#" class="cart-pr-thumb bg-image"><img
                                                    src="/upload/product/{{$item['productInfo']->product_image}}"
                                                    alt="Lorem ipsum dolor" width="65"></a>
                                            <div class="cart-pr-info"> <a href="#"
                                                    class="cart-pr-title">{{$item['productInfo']->product_name}}</a>
                                                <div class="cart-pr-price">
                                                    {{number_format($item['productInfo']->price)}}</div>
                                                <div class="cart-pr-quantity">Số lượng: <span>{{$item['quanty']}}</span>
                                                    | Size:
                                                    {{$item['productInfo']->product_size}}</div>
                                            </div>
                                            <a href="javascript:" onclick="deleteCart({{$item['productInfo']->id}})"
                                                class="cart-pr-remove" title="Remove from cart">×</a>
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
                            <div class="row">
                                <div class="col-xs-6 no-padding"> <a href="{{route('cart.viewcart')}}"
                                        class="view-cart no-margin">xem giỏ hàng</a>
                                </div>
                                <!-- /.col -->

                                <div class="col-xs-6 no-padding"> <a href="checkout.html"
                                        class="btn-checkout no-margin">thanh toán</a> </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    @else
                    <span>giỏ hàng của bạn đang trống</span>
                    @endif

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
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

        <div id="modal-quickview" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-body">
                    <button type="button" class="close myclose" data-dismiss="modal">×</button>
                    <div class="product-view-area">
                        <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                            <div class="icon-sale-label sale-left">Sale</div>
                            <div class="slider-items-products">
                                <div id="previews-list-slider" class="product-flexslider hidden-buttons">
                                    <div class="slider-items slider-width-col6"> <a href="images/products/img03.jpg"
                                            class="cloud-zoom-gallery" id="zoom1"> <img class="zoom-img"
                                                src="images/products/img03.jpg" alt="products"> </a> <a
                                            href='images/products/img01.jpg' class="cloud-zoom-gallery"><img
                                                src="images/products/img01.jpg" alt="Thumbnail 2" /></a> <a
                                            href='images/products/img07.jpg' class="cloud-zoom-gallery"><img
                                                src="images/products/img07.jpg" alt="Thumbnail 1" /></a> <a
                                            href='images/products/img02.jpg' class="cloud-zoom-gallery"><img
                                                src="images/products/img02.jpg" alt="Thumbnail 1" /></a> <a
                                            href='images/products/img04.jpg' class="cloud-zoom-gallery"><img
                                                src="images/products/img04.jpg" alt="Thumbnail 2" /></a> </div>
                                </div>
                            </div>

                            <!-- end: more-images -->

                        </div>
                        <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
                            <div class="product-name">
                                <h2>AIR FORCE 1</h2>
                            </div>
                            <div class="price-box">
                                <p class="special-price"> <span class="price-label">Giá đặt biệt:</span> <span
                                        class="price"> ₫299.00 </span> </p>
                                <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">
                                        ₫399.00 </span> </p>
                            </div>
                            <div class="ratings">
                                <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                                <p class="rating-links"> <a href="#">1 đánh giá(s)</a> <span class="separator">|</span>
                                    <a href="#">Thêm đánh giá</a>
                                </p>
                                <p class="availability in-stock pull-right">Tình trạng: <span>Còn hàng</span></p>
                            </div>
                            <div class="short-description">
                                <h3>Mô tả</h3>
                                <p>Nike Air Force 1 Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore, ngay lập tức mẫu
                                    giày Nike Air Force 1 (AF1) đã trở thành một ‘hit’ mạnh trên khắp thế giới khi ‘sold
                                    out’ ngay trong ngày đầu trình làng.
                                </p>
                            </div>
                            <div class="product-color-size-area">
                                <!-- <div class="color-area">
                <h2 class="saider-bar-title">Màu</h2>
                <div class="color">
                  <ul>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                  </ul>
                </div>
              </div> -->
                                <div class="size-area">
                                    <h2 class="saider-bar-title">Size</h2>
                                    <div class="size">
                                        <ul>
                                            <li><a href="#">S</a></li>
                                            <li><a href="#">L</a></li>
                                            <li><a href="#">M</a></li>
                                            <li><a href="#">XL</a></li>
                                            <li><a href="#">XXL</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="product-variation">
                                <form action="#" method="post">
                                    <div class="cart-plus-minus">
                                        <label for="qty">Số lượng:</label>
                                        <div class="numbers-row">
                                            <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;"
                                                class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                                            <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty"
                                                name="qty">
                                            <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                                                class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                                        </div>
                                    </div>
                                    <button class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i
                                                class="fa fa-shopping-cart"></i>Thêm vào giỏ</span></button>
                                </form>
                            </div>
                            <div class="product-cart-option">
                                <ul>
                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i><span>Thêm vào yêu
                                                thích</span></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i><span>So sánh</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"> <a href="#" class="btn-services-shop-now" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>

    <!-- mobile menu -->
    <div id="jtv-mobile-menu" class="jtv-mobile-menu">
        <ul>
            <li><a href="index.html"><img alt="e-commerce" src="images/logo-mobile.png"></a></li>
            <li><a href="index.html">Trang chủ</a></li>
            <li><a href="shop_grid.html">Sản phẩm</a></li>
            <li><a href="shop_grid.html">Bài viết</a></li>
            <li><a href="shop_grid.html">Về chúng tôi</a></li>
            <li><a href="shop_grid.html">Liên hệ</a></li>
        </ul>
    </div>

    <!-- jquery js -->
    <script data-cfasync="false" src="{{asset('client/js/email-decode.min.js')}}"></script>
    <script src="{{asset('client/js/jquery.min.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/jquery.meanmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/countdown.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/jtv-mobile-menu.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/revolution-slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/jquery.bxslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/magnific-popup.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/cloud-zoom.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/revolution-slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/jquery.nivo.slider.js')}}"></script>
    <script type="text/javascript" src="{{asset('client/js/cart.js')}}"></script>
    <script type='text/javascript'>
        jQuery(document).ready(function () {
            jQuery('#rev_slider_6').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 1170,
                startheight: 520,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',

                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,

                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,

                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
    </script>
    <!-- Hot Deals Timer 1-->
    <script type="text/javascript">
        var dthen1 = new Date("11/25/17 11:59:00 PM");
        start = "08/04/16 03:02:11 AM";
        start_date = Date.parse(start);
        var dnow1 = new Date(start_date);
        if (CountStepper > 0)
            ddiff = new Date((dnow1) - (dthen1));
        else
            ddiff = new Date((dthen1) - (dnow1));
        gsecs1 = Math.floor(ddiff.valueOf() / 1000);

        var iid1 = "countbox_1";
        CountBack_slider(gsecs1, "countbox_1", 1);
    </script>
    <script>
    //     function addtocart(id) {
    //         let quantity = $("#quantity").val();
    //         let inventory = $(".inventory").val();
    //         if (quantity > inventory) {
    //             alert("sản phẩm vượt quá hàng tồn kho");
    //         } else {
    //             $.ajax({
    //                 url: {{ '/add-to-cart/'}} +id + '/' + $("#quantity").val(),
    //                     type: 'get',		
    //                 }).done(function (response) {
    //                         renderCart(response);
    //                         alertify.notify('Thêm vào giỏ hàng thành công.', 'custom', 2,);
    //                     });
    //     $('.js-panel-cart').addClass('show-header-cart')
    //     let showinventory = inventory - quantity;
    //     console.log(showinventory)
    //     document.getElementById('showqty').innerHTML = showinventory;
    //     document.getElementById('showinventory').setAttribute('value', showinventory);
    //             }
    //         }


    //     function deleteCart(id) {
    //         $.ajax({
    //             url: {{ '/delete-item-cart/'}} + id,
    //                 type: 'GET',
    //     }).done(function (response) {
    //                     renderCart(response);
    //                     alertify.warning('Đã xóa sản phẩm khỏi giỏ hàng');
    //                 });
    // };
    //     function renderCart(response) {
    //         $("#showcart").empty();
    //         $("#showcart").html(response);
    //         let qtyshow = $("#totalqtyshow").val();
    //         document.getElementById("showqtycart").innerHTML = qtyshow;
    //     }
    </script>
</body>

<!-- Mirrored from htmlgenius.justthemevalley.com/Version2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jun 2022 11:24:35 GMT -->

</html>