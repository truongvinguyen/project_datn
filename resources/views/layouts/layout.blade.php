<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    {{-- <link rel="apple-touch-icon" sizes="180x180" href="{{asset('admin/vendors/images/apple-touch-icon.png')}}"> --}}
    {{-- <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png"> --}}

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/core.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('client/css/toast.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/datatables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/datatables/css/dataTables.searchHighlight.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/datatables/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/style.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/switchery/switchery.min.css')}}">
    <!-- bootstrap-tagsinput css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('admin/src/styles/app.css')}}">
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
    <style>
        .product-item {
            margin-left: 15px;
        }

        .ajs-message.ajs-custom {
            color: #ffffff;
            background-color: #151329;
            border-color: #31708f;
        }
        .spinner {
	--size: 15px;
	--first-block-clr: #CF3341;
	--second-block-clr: #3b4348;
	--clr: #111;
	width: 100px;
	height: 100px;
	
   }
   
   .spinner::after,.spinner::before {
	box-sizing: border-box;
	position: absolute;
	content: "";
	width: var(--size);
	height: var(--size);
	top: 50%;
	animation: up 2.4s cubic-bezier(0, 0, 0.24, 1.21) infinite;
	left: 50%;
	background: var(--first-block-clr);
   }
   
   .spinner::after {
	background: var(--second-block-clr);
	top: calc(50% - var(--size));
	left: calc(50% - var(--size));
	animation: down 2.4s cubic-bezier(0, 0, 0.24, 1.21) infinite;
   }
   
   @keyframes down {
	0%, 100% {
	 transform: none;
	}
   
	25% {
	 transform: translateX(100%);
	}
   
	50% {
	 transform: translateX(100%) translateY(100%);
	}
   
	75% {
	 transform: translateY(100%);
	}
   }
   
   @keyframes up {
	0%, 100% {
	 transform: none;
	}
   
	25% {
	 transform: translateX(-100%);
	}
   
	50% {
	 transform: translateX(-100%) translateY(-100%);
	}
   
	75% {
	 transform: translateY(-100%);
	}
   }
   .ajs-message.ajs-custom {
            color: #ffffff;
            background-color: red;
            border-color: white;
        }
    </style>
</head>

<body>
    @if(Session::has('success'))
    <script>
        alertify.message('{{Session::get('success')}}', 'custom', 2,
            function() {
                console.log('dismissed');
            });
        alertify.set('notifier', 'position', 'bottom-right');
    </script>
    @endif
    @if(Session::has('error'))
    <style>
        .ajs-message.ajs-custom {
            color: #ffffff;
            background-color: red;
            border-color: white;
        }
    </style>
    <script>
        alertify.notify('{{Session::get('error')}}', 'custom', 2,
            function() {
                console.log('dismissed');
            });
        alertify.set('notifier', 'position', 'bottom-right');
    </script>
    @endif
    {{-- @if(Session::has('success'))
    <script>
        toast({
        title: "Thành công!",
        message: {{Session::get('success')}},
        type: "success",
        duration: 5000
      });
    </script>
    @endif --}}
    <div id="toast">
        
    </div>
    <div class="header" id="global-header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <div class="header-search">
                <form>
                    <div class="form-group mb-0">
                        <i class="dw dw-search2 search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Tìm kiếm">
                        <div class="dropdown">
                            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                                <i class="ion-arrow-down-c"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">From</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">To</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-2 col-form-label">Subject</label>
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a onclick="loadNotification()" class="dropdown-toggle no-arrow" href="javascript:" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul id="show-notification">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="/upload/user/{{ Auth::user()->user_img }}" alt="">
                        </span>
                        <span class="user-name"> {{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Hồ sơ</a>
                        <a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Cài đặt</a>
                        <a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Trợ giúp</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="icon-copy dw dw-logout1"></i> Đăng xuất
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="/">
                <img src="{{asset('admin/src/images/logowhite.png')}}" alt="" width="150px" class="light-logo">
                <img src="{{asset('admin/src/images/logoblack.png')}}" alt="" width="150px" class="dark-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Trang chủ</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/home-admin">Thống kê</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon icon-copy ion-person-stalker"></span><span class="mtext">Thành
                                viên</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="/users">Quản lý thành viên</a></li>
                            <li><a href="/add-new-user">Thêm thành viên</a></li>
                            <li><a href="/customer-account">Tài khoản khách hàng</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-th-list"></span><span class="mtext">Danh mục</span>
                        </a>

                        <ul class="submenu">
                            <li><a href="{{ route('categories.index') }}">Quản lý danh mục</a></li>
                            <li><a href="{{ route('categories.create') }}">Thêm danh mục</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-tag"></span><span class="mtext">Thương hiệu</span>
                        </a>

                        <ul class="submenu">
                            <li><a href="{{ route('brands.index') }}">Quản lý thương hiệu</a></li>
                            <li><a href="{{ route('brands.create') }}">Thêm thương hiệu</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-newspaper-1"></span><span class="mtext">Bài viết</span>
                        </a>

                        <ul class="submenu">
                            <li><a href="{{ route('articles.index') }}">Quản lý bài viết</a></li>
                            <li><a href="{{ route('articles.create') }}">Thêm bài viết</a></li>

                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-th-large"></span><span class="mtext">Sản phẩm</span>
                            <i class="" aria-hidden="true"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('products.index') }}">Quản lý sản phẩm</a></li>
                            <li><a href="{{ route('products.create') }}">Thêm sản phẩm</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon fa fa-th-large"></span><span class="mtext">Đơn hàng</span>
                            <i class="" aria-hidden="true"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('new_order') }}">Đơn hàng mới</a></li>
                            <li><a href="{{ route('order_processed') }}">Đơn hàng đã xử lý</a></li>
                            <li><a href="{{ route('order_complete') }}">Đơn hàng đã hoàn thành</a></li>

                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon icon-copy fi-graph-bar"></span><span class="mtext">Kho</span>
                            <i class="" aria-hidden="true"></i>
                        </a>

                        <ul class="submenu">
                            <li><a href="/product">Quản lý kho</a></li>
                            <li><a href="/add-new-product">Nhập kho</a></li>

                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20" style="margin-top: -35px;">
            @yield('content')
        </div>
    </div>
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('admin/vendors/scripts/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('admin/vendors/scripts/core.js')}}"></script>
    <script src="{{asset('admin/vendors/scripts/script.min.js')}}"></script>
    <script src="{{asset('admin/vendors/scripts/process.js')}}"></script>
    <script src="{{asset('admin/vendors/scripts/layout-settings.js')}}"></script>
    <script src="{{asset('client/js/toast.js')}}"></script>
    <script src="{{asset('admin/src/plugins/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('admin/src/plugins/datatables/js/jquery.highlight.js')}}"></script>
	<script src="{{asset('admin/src/plugins/datatables/js/dataTables.searchHighlight.min.js')}}"></script>
    <script src="{{asset('admin/vendors/scripts/dashboard.js')}}"></script>
    <script src="{{asset('admin/vendors/scripts/advanced-components.js')}}"></script>
    <script src="{{asset('admin/src/plugins/switchery/switchery.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/src/plugins/datatables/js/vfs_fonts.js')}}"></script>
    <!-- Datatable Setting js -->
    <script src="{{asset('admin/vendors/scripts/datatable-setting.js')}}"></script>
</body>
<!-- bootstrap-tagsinput js -->
<script src="{{asset('admin/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<!-- bootstrap-touchspin js -->
<script src="{{asset('admin/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>

<!-- Default theme -->

<script type="text/javascript">
    $(document).ready(function() {
        load_image();

        function load_image() {
            var product_id = $('.product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "/select-image",
                method: "post",
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    $('#image-load').html(data);
                }
            })
        }
        $('#image').change(function() {
            var error = '';
            var images = $('#image')[0].images;
            if (images.length > 5) {
                error += '<p>chọn tối đa 5 ảnh</p>';
            } else if (images.length == '') {
                error += '<p>Hình ảnh trống</p>';
            } else if (images.size > 2000000) {
                error += '<p>Hình ảnh vượt quá 2MB</p>';
            }
            if (error == '') {

            } else {
                $('#image').val('');
                $("#error_image").html('<span class="text-danger">' + error + '</span>');
                return false;
            }

        });
        $(document).on('click', '.delete-image', function() {


            var image_id = $(this).data('item_id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "/delete-image-product",
                method: "post",
                data: {
                    image_id: image_id,
                    _token: _token
                },
                success: function(data) {
                    load_image();
                    alertify.notify('Đã xóa hình ảnh', 'custom', 2, function() {
                        console.log('dismissed');
                    });
                    alertify.set('notifier', 'position', 'bottom-right');
                }
            });

        });
    });
</script>
<script type="text/javascript">
   
 
</script>

</body>

</html>