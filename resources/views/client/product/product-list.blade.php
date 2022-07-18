@extends('layouts.client-1')
@section('title')
Trang Sản Phẩm
@endsection
@section('content')
<div class="main-container col2-left-layout">
    <div class="container">
        <div class="row">
            <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
                
                <div class="shop-inner">
                    <div class="page-title"><h2>Sản phẩm</h2></div>
                    <div class="category-description">
                        <div class="slider-items-products">
                            <div id="category-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4">
                                    <a href="#"><img src="client/images/banner111.jpg" alt="banner"></a>
                                    <a href="#"><img src="client/images/banner41111.jpg" alt="banner"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="toolbar">
                        <div class="view-mode">
                            <ul>
                                <li> <a href="/product-grid"> <i class="fa fa-th-large"></i> </a> </li>
                                <li class="active"> <a href="/product-list"> <i class="fa fa-th-list"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-info">
                        <ul class="check-box-list productlg" id="data_price">
                            <li data-price="discount">Gian hàng giảm giá</li>
                            <li data-price="">Giá từ cao đến thấp</li>
                            <li data-price="ASC">Giá từ thấp đến cao</li>
                        </ul>
                        <!-- /.nav-tabs --> 
                    </div>
                    <div id="product-l">

                    </div>
                    <div class="pagination-area ">
                        <ul id="pagination">
                            @for($i = 1; $i <= ceil($length/6); $i++ )
                                <li data-offset="{{$i}}" class="{{$i == 1 ? 'active': '' }}">{{$i}}</li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
            <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <div class="block shop-by-side">
                    <div class="sidebar-bar-title"><h3>Bộ lọc tìm kiếm</h3></div>
                    <div class="block-content">
                    <!-- <p class="block-subtitle">Shopping Options</p> -->
                        <div class="layered-Category">
                            <!-- <h2 class="saider-bar-title">Categories</h2> -->
                            <div class="layered-content">
                                <h2 class="saider-bar-title">Theo danh mục</h2>
                                <ul class="check-box-list" id="listByCate">
                                    @foreach($categories as $cate)
                                        <li data-offset="{{$cate->id}}"><i class="fa fa-angle-right"></i>&nbsp;{{$cate->category_name}}</li>
                                    @endforeach
                                 
                                </ul>
                            </div>
                        </div>

                        <div class="layered-Category">
                            <!-- <h2 class="saider-bar-title">Categories</h2> -->
                            <div class="layered-content">
                                <h2 class="saider-bar-title">Theo thương hiệu</h2>
                                <ul class="check-box-list" id="listByBrand">
                                    @foreach($brands as $brand)
                                        <li data-offset="{{$brand->id}}"><i class="fa fa-angle-right"></i>&nbsp;{{$brand->brand_name}}</li>
                                        
                                    @endforeach
                                 
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
                                                <div class="post-meta"> <span class="date"><i class="fa fa-calendar"></i> {{$article->created_at}}</span> <span class="comment-count"> <i class="fa fa-comment-o"></i> 3 </span> </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    <!-- ./layered --> 
                </div>
                </div>
                <div class="block popular-tags-area "><div class="sidebar-bar-title"><h3>Thẻ liên quan</h3></div>
                    <div class="tag">
                        <ul>
                            <li><a href="#">Boys</a></li>
                            <li><a href="#">Camera</a></li>
                            <li><a href="#">good</a></li>
                            <li><a href="#">Computers</a></li>
                            <li><a href="#">Phone</a></li>
                            <li><a href="#">clothes</a></li>
                            <li><a href="#">girl</a></li>
                            <li><a href="#">shoes</a></li>
                            <li><a href="#">women</a></li>
                            <li><a href="#">accessoties</a></li>
                            <li><a href="#">View All Tags</a></li>
                        </ul>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
<script src="{{asset('client/js/jquery.min.js')}}"></script>
    <script src="{{ asset('/client/js/product-list.js') }}"></script>
@endsection