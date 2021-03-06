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

    <meta name="csrf-token" content="{{csrf_token()}}">


      <!-- Mobile specific metas  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon  -->
    <link rel="shortcut icon" type="x-icon" href="/client/images/favicon.ico">

    <!-- CSS Style -->
    <link rel="stylesheet" href="{{asset('client/style.css')}}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>

<body class="cms-index-index cms-home-page">

    <div id="toast">
        
    </div>
    @if(Session::has('success'))
    <script>
        alertify.message('{{Session::get('success')}}', 'custom', 2,
            function() {
                console.log('dismissed');
            });
        alertify.set('notifier', 'position', 'bottom-right');
    </script>
    @endif

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
                                                <p><i class="pe-7s-plane"></i> Mi???n ph?? v???n chuy???n cho ????n h??ng t???
                                                    <span>500.000???</span>
                                                </p>
                                            </div>
                                            <div class="offer-content-text">
                                                <p><i class="pe-7s-like2"></i><span>Ch???t l?????ng s???n ph???m </span>?????n t???
                                                    th????ng hi???u</p>
                                            </div>
                                            <div class="offer-content-text">
                                                <p><i class="pe-7s-gift"></i>T???ng qu?? khi mua <span>t??? 5 s???n ph???m tr???
                                                        l??n</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- top links -->
                            <div class="headerlinkmenu col-md-7 col-sm-7 col-xs-12">
                                <!-- Default Welcome Message -->
                                <div class="welcome-msg hidden-xs">Ch??o m???ng b???n ?????n v???i Website</div>
                                @if((Session::has('userFullname')))
                                <div class="welcome-msg hidden-xs"><a href="{{ route('checkout') }}">Thanh toa??n</a></div>
                                @else
                                <div class="welcome-msg hidden-xs"><a href="{{ route('checkout') }}">Thanh toa??n</a></div>
                                @endif
                                <ul class="links">
                                    @if((Session::has('userFullname')))
                                        <li class="nav-item dropdown">
                                            <div class="language-currency-wrapper pull-right">
                                                <div class="inner-cl">
                                                    <div class="block block-language form-language">
                                                        <div class="lg-cur">
                                                             <span> 
                                                                <span class="lg-fr">
                                                                    <i class="fa fa-angle-down"></i> {{Session::get('userFullname')}}
                                                                    @if(Session::get('userImage')==null)
                                                                   <img class="img_user" src="https://ui-avatars.com/api/?name={{Session::get('userFullname')}}" alt="">
                                                                   @else
                                                                   <img class="img_user" src="/upload/user/{{Session::get('userImage')}}" alt="">
                                                                   @endif
                                                                   
                                                                </span> 
                                                               
                                                            </span>
                                                     </div>
                                                        <ul>
                                                            <li id="logout"><a href="{{route('getLogout')}}">????ng xu???t</a></li>
                                                            <li ><a href="/wishlist">S???n ph???m y??u th??ch</a></li>
                                                        </ul>
                                                    </div>
                                                    {{-- <div class="block block-currency">
                                                        <div class="item-cur"> <span>VND</span> <i class="fa fa-angle-down"></i>
                                                        </div>
                                                        <ul>
                                                            <li> <a class="selected" href="#"><span class="cur_icon">$</span>USD</a> </li>
                                                        </ul>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        <li style="line-height: 45px;"><a href="{{route('dang-ky')}}">T???o t??i kho???n</a></li>
                                        <li style="line-height: 45px;"><a href="{{route('getLogin')}}">????ng nh???p</a></li>
                                    @endif

                                </ul>
                                
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
                                        <input type="text" class="form-control" placeholder="t??m ki???m..." id="search" name="search">
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
                            <div class="logo"><a title="e-commerce" href="/"><img alt="e-commerce"
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
                            @if (Session::has('userId'))
                                @if (Session::get('userImage') == "")
                                    <a href="#" class="top-my-account" style="padding: 0">
                                        <img src="/upload/client/user/anoymous.png" alt="">
                                    </a>
                                @else
                                    <a href="#" class="top-my-account" style="padding: 0">
                                        <img src="/upload/client/user/'.Session::get('userImage')" alt="">
                                    </a>
                                @endif
                            @else
                            <a href="account_page.html" class="top-my-account"><i class="fa fa-user"></i></a>
                            @endif
                            <a href="compare.html" class="top-compare"><i class="fa fa-signal"></i></a>
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
                                        <li class="active custom-menu"><a href="/">Trang ch???</a></li>
                                        <li class="megamenu"><a href="/product-grid">S???n ph???m <span class="menu-item-tag menu-item-tag-new">m???i</span></a></li>
                                        <li class="custom-menu"><a href="/article">B??i vi???t</a></li>
                                        <li><a href="/contact-us">V??? ch??ng t??i</a></li>
                                        <li><a href="/contact-us">Li??n h???</a></li>
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
                                    <h3 class="">????ng k?? ????? nh???n b???n tin</h3>
                                    <span>Nh???n c??c giao d???ch m???i nh???t v?? ??u ????i ?????c bi???t</span>
                                </div>
                                <div class="col-md-5 col-sm-7">
                                    <form id="newsletter-validate-detail" method="post" action="#">
                                        <div class="newsletter-inner">
                                            <input class="newsletter-email" name='Email'
                                                placeholder='Nh???p email c???a b???n' />
                                            <button class="button subscribe" type="submit" title="Subscribe">????ng
                                                k??</button>
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
                        <div class="footer-logo"><a href="/home-page"><img style="width: 50%;"
                                    src="client/images/footer-logo.png" alt="fotter logo"></a> </div>
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
                                <p>QTSC, Innovation l?? 24, Quang Trung, Q12, Tp.HCM</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">H???i ????p<a class="expander visible-xs" href="#TabBlock-1">+</a></h3>
                            <div class="tabBlock" id="TabBlock-1">
                                <ul class="list-links list-unstyled">
                                    <li><a href="#s">V??? ch??ng t??i</a></li>
                                    <li><a href="#">Li??n h???</a></li>
                                    <li><a href="sitemap.html">C??u h???i th?????ng g???p</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">Danh m???c s???n ph???m<a class="expander visible-xs"
                                    href="#TabBlock-3">+</a></h3>
                            <div class="tabBlock" id="TabBlock-3">
                                <ul class="list-links list-unstyled">
                                    <li> <a href="sitemap.html">??o kho??c</a> </li>
                                    <li> <a href="#">Qu???n</a> </li>
                                    <li> <a href="#">??o thun</a> </li>
                                    <li> <a href="about_us.html">??o s?? mi</a> </li>
                                    <li> <a href="contact_us.html">Qu???n short</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2 col-xs-12 col-lg-3 collapsed-block">
                        <div class="footer-links">
                            <h3 class="links-title">D???ch v???<a class="expander visible-xs" href="#TabBlock-4">+</a></h3>
                            <div class="tabBlock" id="TabBlock-4">
                                <ul class="list-links list-unstyled">
                                    <li> <a href="account_page.html">T??i kho???n</a> </li>
                                    <li> <a href="shopping_cart.html">Gi??? h??ng</a> </li>
                                    <li> <a href="#">Ch??nh s??ch ho??n tr???</a> </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-coppyright">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12 coppyright"> Copyright ?? 2022-2030 <a href="#"> Trendy </a> ????
                            ????ng k?? B???n quy???n.</div>
                        <div class="col-sm-6 col-xs-12">
                            <div class="payment">
                                <ul>
                                    <li><a href="#"><img title="Visa" alt="Visa" src="{{asset('client/images/visa.png')}}"></a></li>
                                    <li><a href="#"><img title="Paypal" alt="Paypal" src="{{asset('client/images/paypal.png')}}"></a></li>
                                    <li><a href="#"><img title="Discover" alt="Discover" src="{{asset('client/images/discover.png')}}"></a></li>
                                    <li><a href="#"><img title="Master Card" alt="Master Card"src="{{asset('client/images/master-card.png')}}"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-up"></i></a>
        <div id="modal-quickview" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width: 1035px !important; border-radius: 10px; padding: 10px;height: 550px;">
                <div id="show-modal-quickview">
                   
                </div>
            </div>
        </div>
        <div id="modal-cart" class="modal modal-right fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">??</span></button>
                        <h4 class="modal-title">Gi??? c???a b???n</h4>
                    </div>
                    <div id="showcart" style="height: 100%">
                        @if(Session::has('cart') != null)
                        <div class="modal-body" >

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
                                                <div class="cart-pr-quantity">S??? l?????ng: <span>{{$item['quanty']}}</span>
                                                    | Size:
                                                    {{$item['productInfo']->product_size}}</div>
                                            </div>
                                            <a href="javascript:" onclick="deleteCart({{$item['productInfo']->id}})"
                                                class="cart-pr-remove" title="Remove from cart">??</a>
                                        </div>
                                        <!-- End shopping cart product -->
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- End shopping cart content -->

                        </div>

                        <div class="modal-footer padding-vertical-0">
                            <div class="cart-total"> <strong>T???ng gi??? h??ng:</strong> <span>t???ng
                                    c???ng:{{number_format(Session::get('cart')->totalPrice)}} vn??</span> </div>
                            <div class="row">
                                <div class="col-xs-6 no-padding"> <a href="{{route('cart.viewcart')}}"
                                        class="view-cart no-margin">xem gi??? h??ng</a>
                                </div>
                                <!-- /.col -->

                                <div class="col-xs-6 no-padding"> <a href="{{route('checkout')}}"
                                        class="btn-checkout no-margin">thanh to??n</a> </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    @else
                    <span>gio?? ha??ng cu??a ba??n ??ang tr????ng</span>
                    @endif

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
       

    </div>

    <!-- mobile menu -->
    <div id="jtv-mobile-menu" class="jtv-mobile-menu">
        <ul>
            <li><a href="/home-page"><img alt="e-commerce" src="client/images/logo-mobile.png"></a></li>
            <li><a href="/home-page">Trang ch???</a></li>
            <li><a href="/product-list">S???n ph???m</a></li>
            <li><a href="shop_grid.html">B??i vi???t</a></li>
            <li><a href="shop_grid.html">V??? ch??ng t??i</a></li>
            <li><a href="shop_grid.html">Li??n h???</a></li>
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
    <script type="text/javascript" src="{{asset('client/js/toast.js')}}"></script>
    <script src="{{ asset('/client/js/home-page.js') }}"></script>
    <script src="{{ asset('/client/js/product-list.js') }}"></script>
    <script src="{{ asset('/client/js/article.js') }}"></script>
    
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
        var btnLogout = document.querySelector('#logout');
        // btnLogout.onclick = function() {
        //     alert('Logged out');
        // }
        
    </script>
    
</body>
@yield('js')
<!-- Mirrored from htmlgenius.justthemevalley.com/Version2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jun 2022 11:24:35 GMT -->

</html>