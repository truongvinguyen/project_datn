@extends('layouts.client-1')
@section('title')
Trang Sản Phẩm
@endsection
@section('content')
    
<div class="main-container col2-left-layout" id="grid">
    <div class="container">
        <div class="row">
            <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
                <div class="shop-inner">  
                    <div class="product-overview-tab">
                        <div class="product-tab-inner">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs p">
                                <li style="float: right;"> <a href="#lowToHigh" data-toggle="tab" ><i class="fa fa-dollar" style="font-size:20px"></i> tăng dần</a> </li>
                                <li style="float: right;"> <a href="#highToLow" data-toggle="tab" ><i class="fa fa-dollar" style="font-size:20px"></i> giảm dần</a> </li>
                                <li style="float: right;"> 
                                    <a href="#sale" data-toggle="tab" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-inboxes-fill" viewBox="0 0 16 16">
                                        <path d="M4.98 1a.5.5 0 0 0-.39.188L1.54 5H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0A.5.5 0 0 1 10 5h4.46l-3.05-3.812A.5.5 0 0 0 11.02 1H4.98zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.374l-.39 3.124A1.5 1.5 0 0 1 14.117 10H1.883A1.5 1.5 0 0 1 .394 8.686l-.39-3.124a.5.5 0 0 1 .106-.374L3.81.563zM.125 11.17A.5.5 0 0 1 .5 11H6a.5.5 0 0 1 .5.5 1.5 1.5 0 0 0 3 0 .5.5 0 0 1 .5-.5h5.5a.5.5 0 0 1 .496.562l-.39 3.124A1.5 1.5 0 0 1 14.117 16H1.883a1.5 1.5 0 0 1-1.489-1.314l-.39-3.124a.5.5 0 0 1 .121-.393z"/>
                                        </svg>
                                        Giảm giá
                                    </a> 
                                </li>
                                <li class="active" style="float: right;"> 
                                    <a href="#all" data-toggle="tab" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                                        <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
                                        </svg>
                                        Tất cả
                                    </a> 
                                </li>
                            </ul>
                            <div id="productTabContent" class="tab-content" >
                                <div class="tab-pane" id="cate">
                                
                                    <div id="category">
                                        <div class="product-grid-area">
                                            <ul class="products-grid">                          
                                                @foreach($lowToHigh as $product)
                                                    <li class="productByCategory item col-lg-4 col-md-4 col-sm-6 col-xs-12" id="item">
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
                                                                            <a  href="" onclick="quickviewProduct({{$product->id}})" data-toggle="modal" data-target="#modal-quickview">
                                                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                                                Xem nhanh
                                                                            </a> 
                                                                        </div>
                                                                    
                                                                    </div>
                                                                    <a href="/product-detail/{{$product->id}}" class="product-item-photo"> 
                                                                        <img class="product-image-photo" src="public/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
                                                                    </a> 
                                                                </div>
                                                                <div class="pro-box-info">
                                                                    <div class="item-info">
                                                                        <div class="info-inner">
                                                                            <div class="item-title">
                                                                                <h4> <a title="Product Title Here" href="/product-detail/{{$product->id}}">{{$product->product_name}}</a></h4>
                                                                            </div>
                                                                            <div class="item-content">
                                                                                <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                                                                                <div class="price-box">
                                                                                @if($product->product_price_sale != null)
                                                                                    <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">{{number_format($product->product_price_sale)}}₫</span></p>
                                                                                    <p class="special-price"> <span class="price-label">Giá đặt biệt</span> &nbsp;<span class="price">₫{{number_format($product->product_price)}}₫</span> </p>
                                                                                @else
                                                                                    <p class="special-price"> <span class="price-label">Giá thường:</span> <span class="regular-price">{{number_format($product->product_price)}}₫</span></p>
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                 
                                </div>

                                <div class="tab-pane" id="lowToHigh">
                                    <div id="productLowToHigh">
                                        <div class="product-grid-area">
                                            <ul class="products-grid">                          
                                                @foreach($lowToHigh as $product)
                                                    <li class="productByCategory item col-lg-4 col-md-4 col-sm-6 col-xs-12" id="item">
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
                                                                            <a  href="" onclick="quickviewProduct({{$product->id}})" data-toggle="modal" data-target="#modal-quickview">
                                                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                                                Xem nhanh
                                                                            </a> 
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <a href="/product-detail/{{$product->id}}" class="product-item-photo"> 
                                                                        <img class="product-image-photo" src="public/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
                                                                    </a> 
                                                                </div>
                                                                <div class="pro-box-info">
                                                                    <div class="item-info">
                                                                        <div class="info-inner">
                                                                            <div class="item-title">
                                                                                <h4> <a title="Product Title Here" href="/product-detail/{{$product->id}}">{{$product->product_name}}</a></h4>
                                                                            </div>
                                                                            <div class="item-content">
                                                                                <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                                                                                <div class="price-box">
                                                                                @if($product->product_price_sale != null)
                                                                                    <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">{{number_format($product->product_price_sale)}}₫</span></p>
                                                                                    <p class="special-price"> <span class="price-label">Giá đặt biệt</span> &nbsp;<span class="price">₫{{number_format($product->product_price)}}₫</span> </p>
                                                                                @else
                                                                                    <p class="special-price"> <span class="price-label">Giá thường:</span> <span class="regular-price">{{number_format($product->product_price)}}₫</span></p>
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pagination-area ">
                                        <ul id="paginationLowToHigh">
                                        @for($i = 1; $i <= ceil($productAllLength/6); $i++ )
                                            <li class="{{$i == 1 ? 'active': '' }}" data-offset="{{$i}}">{{$i}}</li>
                                        @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="highToLow">
                                    <div id="productHighToLow">
                                        <div class="product-grid-area">
                                            <ul class="products-grid">                          
                                                @foreach($highToLow as $product)
                                                    <li class="productByCategory item col-lg-4 col-md-4 col-sm-6 col-xs-12" id="item">
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
                                                                            <a  href="" onclick="quickviewProduct({{$product->id}})" data-toggle="modal" data-target="#modal-quickview">
                                                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                                                Xem nhanh
                                                                            </a> 
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <a href="/product-detail/{{$product->id}}" class="product-item-photo"> 
                                                                        <img class="product-image-photo" src="public/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
                                                                    </a> 
                                                                </div>
                                                                <div class="pro-box-info">
                                                                    <div class="item-info">
                                                                        <div class="info-inner">
                                                                            <div class="item-title">
                                                                                <h4> <a title="Product Title Here" href="/product-detail/{{$product->id}}">{{$product->product_name}}</a></h4>
                                                                            </div>
                                                                            <div class="item-content">
                                                                                <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                                                                                <div class="price-box">
                                                                                @if($product->product_price_sale != null)
                                                                                    <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">{{number_format($product->product_price_sale)}}₫</span></p>
                                                                                    <p class="special-price"> <span class="price-label">Giá đặt biệt</span> &nbsp;<span class="price">₫{{number_format($product->product_price)}}₫</span> </p>
                                                                                @else
                                                                                    <p class="special-price"> <span class="price-label">Giá thường:</span> <span class="regular-price">{{number_format($product->product_price)}}₫</span></p>
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pagination-area ">
                                        <ul id="paginationHighToLow">
                                        @for($i = 1; $i <= ceil($productAllLength/6); $i++ )
                                            <li class="{{$i == 1 ? 'active': '' }}" data-offset="{{$i}}">{{$i}}</li>
                                        @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane" id="sale">
                                    <div id="productSale">
                                        <div class="product-grid-area">
                                            <ul class="products-grid">
                                                                        
                                                @foreach($productSale as $product)
                                                    <li class="productByCategory item col-lg-4 col-md-4 col-sm-6 col-xs-12" id="item">
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
                                                                            <a  href="" onclick="quickviewProduct({{$product->id}})" data-toggle="modal" data-target="#modal-quickview">
                                                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                                                Xem nhanh
                                                                            </a> 
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <a href="/product-detail/{{$product->id}}" class="product-item-photo"> 
                                                                        <img class="product-image-photo" src="public/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
                                                                    </a> 
                                                                </div>
                                                                <div class="pro-box-info">
                                                                    <div class="item-info">
                                                                        <div class="info-inner">
                                                                            <div class="item-title">
                                                                                <h4> <a title="Product Title Here" href="/product-detail/{{$product->id}}">{{$product->product_name}}</a></h4>
                                                                            </div>
                                                                            <div class="item-content">
                                                                                <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                                                                                <div class="price-box">
                                                                                @if($product->product_price_sale != null)
                                                                                    <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">{{number_format($product->product_price_sale)}}₫</span></p>
                                                                                    <p class="special-price"> <span class="price-label">Giá đặt biệt</span> &nbsp;<span class="price">₫{{number_format($product->product_price)}}₫</span> </p>
                                                                                @else
                                                                                    <p class="special-price"> <span class="price-label">Giá thường:</span> <span class="regular-price">{{number_format($product->product_price)}}₫</span></p>
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pagination-area ">
                                        <ul id="paginationSale">
                                        @for($i = 1; $i <= ceil($productSaleLength/6); $i++ )
                                            <li class="{{$i == 1 ? 'active': '' }}" data-offset="{{$i}}">{{$i}}</li>
                                        @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="all">
                                    <div id="product-g">
                                        <div class="product-grid-area">
                                            <ul class="products-grid">
                                                                        
                                                @foreach($productAll as $product)
                                                    <li class="productByCategory item col-lg-4 col-md-4 col-sm-6 col-xs-12" id="item">
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
                                                                            <a  href="" onclick="quickviewProduct({{$product->id}})" data-toggle="modal" data-target="#modal-quickview">
                                                                                <i class="fa fa-search-plus" aria-hidden="true"></i>
                                                                                Xem nhanh
                                                                            </a> 
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <a href="/product-detail/{{$product->id}}" class="product-item-photo"> 
                                                                        <img class="product-image-photo" src="public/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
                                                                    </a> 
                                                                </div>
                                                                <div class="pro-box-info">
                                                                    <div class="item-info">
                                                                        <div class="info-inner">
                                                                            <div class="item-title">
                                                                                <h4> <a title="Product Title Here" href="/product-detail/{{$product->id}}">{{$product->product_name}}</a></h4>
                                                                            </div>
                                                                            <div class="item-content">
                                                                                <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                                                                                <div class="price-box">
                                                                                @if($product->product_price_sale != null)
                                                                                    <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">{{number_format($product->product_price_sale)}}₫</span></p>
                                                                                    <p class="special-price"> <span class="price-label">Giá đặt biệt</span> &nbsp;<span class="price">₫{{number_format($product->product_price)}}₫</span> </p>
                                                                                @else
                                                                                    <p class="special-price"> <span class="price-label">Giá thường:</span> <span class="regular-price">{{number_format($product->product_price)}}₫</span></p>
                                                                                @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pagination-area ">
                                        <ul id="pagination">
                                        @for($i = 1; $i <= ceil($productAllLength/6); $i++ )
                                            <li class="{{$i == 1 ? 'active': '' }}" data-offset="{{$i}}">{{$i}}</li>
                                        @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
               
            </div>
           
            <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <div class="block shop-by-side">
                    <div class="sidebar-bar-product-title"><h3>Danh mục sản phẩm</h3></div>
                    <div class="block-content">
                    <!-- <p class="block-subtitle">Shopping Options</p> -->
                        <div class="layered-Category">
                            <div class="layered-content">
                                <ul id="product-detail-tab">
                                    <li style="width:270px"> 
                                        <a href="#cate" data-toggle="tab" style="color: #000 !important;">
                                            <ul class="check-box-list" id="productByCate">
                                                @foreach($categories as $cate)
                                                    <li data-offset="{{$cate->id}}"><i class="fa fa-angle-right"></i>&nbsp;{{$cate->category_name}}</li>
                                                @endforeach
                                            </ul>
                                        </a> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-bar-product-title"><h3>Thương hiệu</h3></div>
                    <div class="block-content">
                        <div class="layered-Category">
                            

                            <div class="layered-content">
                                <ul id="product-detail-tab">
                                    <li style="width:270px"> 
                                        <a href="#cate" data-toggle="tab" style="color: #000 !important;">
                                            <ul class="check-box-list" id="productByBrand">
                                                @foreach($brands as $e)
                                                    <li data-offset="{{$e->id}}"><i class="fa fa-angle-right"></i>&nbsp;{{$e->brand_name}}</li>
                                                @endforeach
                                            </ul>
                                        </a> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="block blog-module">
              
                    <div class="sidebar-bar-title"><h3>bài viết phổ biến</h3></div>
                    <div class="block_content"> 
                        
                        <div class="layered">
                            <div class="layered-content">
                            <ul class="popular-posts">
                        
                            </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
            </aside>
        </div>
    </div>
</div>

<script src="{{asset('client/js/jquery.min.js')}}"></script>
<script src="{{ asset('/client/js/home-page.js') }}"></script>

@endsection