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
                                <li style="float: right;"> <a href="#lowToHigh" data-toggle="tab" >Giá từ thấp đến cao</a> </li>
                                <li style="float: right;"> <a href="#highToLow" data-toggle="tab" >Giá từ cao xuống thấp</a> </li>
                                <li style="float: right;"> <a href="#sale" data-toggle="tab" >Sản phẩm đang giảm giá</a> </li>
                                <li class="active" style="float: right;"> <a href="#all" data-toggle="tab" >Tất cả sản phẩm</a> </li>
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
                                                                        <img class="product-image-photo" src="/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
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
                                                                        <img class="product-image-photo" src="/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
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
                                            <li  class="{{$i == 1 ? 'active': '' }}" data-offset="{{$i}}">{{$i}}</li>
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
                                                                        <img class="product-image-photo" src="/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
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
                                            <li  class="{{$i == 1 ? 'active': '' }}" data-offset="{{$i}}">{{$i}}</li>
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
                                                                        <img class="product-image-photo" src="/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
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
                                                                        <img class="product-image-photo" src="/upload/product/{{$product->product_image}}" style="height:271px;" alt="{{$product->product_name}}">
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
                        <div class="layered-Category">
                            <div class="layered-content">
                                <ul id="product-detail-tab">
                                    <li style="width:270px"> 
                                        <a href="#cate" data-toggle="tab" style="color: #000 !important;">
                                            <ul class="check-box-list" id="productByCate">
                                                @foreach($categories as $cate)
                                                    <li> <a href="/product-grid/{{$cate->id}}"><i class="fa fa-angle-right"></i>&nbsp;{{$cate->category_name}}</a></li>
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
                
                <div class="block blog-module">
                    <div class="sidebar-bar-title">
                        <h3>bài viết phổ biến</h3>
                    </div>
                    <div class="block_content"> 
                    <!-- layered -->
                        <div class="layered">
                            <div class="layered-content">
                                <ul class="blog-list-sidebar">   
                                    @foreach($articles as $article)
                                        <li>
                                            <div class="post-thumb"> <a href="/article-detail/{{$article->id}}"><img src="/upload/article/{{$article->article_thumbnail}}" alt="Blog"></a> </div>
                                            <div class="post-info">
                                                <h5 class="entry_title"><a href="/article-detail/{{$article->id}}">{!!$article->article_title!!}</a></h5>
                                                <div class="post-meta"> <span class="date"><i class="fa fa-calendar"></i> {{date('d-m-y', strtotime($article->created_at))}}</span> <span class="comment-count"> <i class="fa fa-comment-o"></i> 3 </span> </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    <!-- ./layered --> 
                </div>
            </aside>
        </div>
    </div>
</div>

<script src="{{asset('client/js/jquery.min.js')}}"></script>
<script src="{{ asset('/client/js/home-page.js') }}"></script>

@endsection