@extends('layouts.client-1')
@section('title')
Trang Sản Phẩm
@endsection
@section('content')
    
<div class="main-container col2-left-layout" id="grid">
    <div class="container">
        <div class="row">
            <div class="col-main col-sm-12 col-xs-12">
                <div class="shop-inner">  
                    <div class="product-overview-tab">
                        <div class="product-tab-inner">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs p">
                                <li style="float: right;"> <a href="#lowToHigh" data-toggle="tab" >Giá từ thấp đến cao</a> </li>
                                <li style="float: right;"> <a href="#highToLow" data-toggle="tab" >Giá từ cao xuống thấp</a> </li>
                                <li style="float: right;"> <a href="#sale" data-toggle="tab" >Sản phẩm đang giảm giá</a> </li>
                                <li class="active" style="float: right;"> <a href="#all" data-toggle="tab" >Kết quả tìm kiếm</a> </li>
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
                                    <div class="pagination-area ">
                                        <ul id="paginationLowToHigh">
                                        @for($i = 1; $i <= ceil($productAllLength/6); $i++ )
                                            <li class="{{$i == 1 ? 'active': '' }}" data-offset="{{$i}}">{{$i}}</li>
                                        @endfor
                                        </ul>
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
                                                                        
                                                @foreach($products as $product)
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
           
           
        </div>
    </div>
</div>

<script src="{{asset('client/js/jquery.min.js')}}"></script>
<script src="{{ asset('/client/js/home-page.js') }}"></script>

@endsection