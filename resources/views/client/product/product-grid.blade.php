@extends('layouts.client-1')
@section('title')
Trang Chủ
@endsection
@section('content')
    
<div class="main-container col2-left-layout" id="grid">
    <div class="container">
        <div class="row">
            <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
                
                <div class="shop-inner">
                    <div class="page-title"><h2>Sản phẩm</h2></div>
                    <div class="category-description">
                        <div class="slider-items-products">
                            <div id="category-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4">
                                    <a href="#"><img src="client/images/banner3.jpg" alt="banner"></a>
                                    <a href="#"><img src="client/images/banner4.jpg" alt="banner"></a>
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
                    <div id="product-g">

                    </div>
                    <div class="pagination-area ">
                        <ul id="pagination">
                            @for($i = 1; $i <= ceil($length/6); $i++ )
                                <li data-offset="{{$i}}">{{$i}}</li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
            <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
                <div class="block category-sidebar">
                    <div class="sidebar-title"><h3>Categories</h3></div>
                    <ul class="product-categories">
                        <li class="cat-item current-cat cat-parent"><a href= "shop_grid.html">Women</a>
                            <ul class="children">
                                <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Accessories</a>
                                    <ul class="children">
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Dresses</a></li>
                                        <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                                            <ul  class="children">
                                                <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a></li>
                                                <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Sling bag</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                                    <ul class="children">
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; backpack</a></li>
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a></li>
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Fabric Handbags</a></li>
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Sling bag</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Jewellery</a> </li>
                                <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Swimwear</a> </li>
                            </ul>
                        </li>
                        <li class="cat-item cat-parent"><a href="shop_grid.html">Men</a>
                            <ul class="children">
                                <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                                    <ul class="children">
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Casual</a></li>
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Designer</a></li>
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Evening</a></li>
                                        <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Hoodies</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Jackets</a> </li>
                                <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Shoes</a> </li>
                            </ul>
                        </li>
                        <li class="cat-item"><a href="shop_grid.html">Electronics</a></li>
                        <li class="cat-item"><a href="shop_grid.html">Furniture</a></li>
                        <li class="cat-item"><a href="shop_grid.html">KItchen</a></li>
                    </ul>
                </div>
                <div class="block shop-by-side">
                    <div class="sidebar-bar-title"><h3>Danh mục</h3></div>
                    <div class="block-content">
                    <!-- <p class="block-subtitle">Shopping Options</p> -->
                        <div class="layered-Category">
                            <!-- <h2 class="saider-bar-title">Categories</h2> -->
                            <div class="layered-content">
                                <ul class="check-box-list">
                                    <li>
                                        <input type="radio" id="jtv1" name="jtvc">
                                        <label for="jtv1"> <span class="button"></span>Bán chạy nhất</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="jtv2" name="jtvc">
                                        <label for="jtv2"> <span class="button"></span>Hàng mới về</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="jtv3" name="jtvc">
                                        <label for="jtv3"> <span class="button"></span>Nhiều bình luận nhất</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="jtv4" name="jtvc">
                                        <label for="jtv4"> <span class="button"></span>Giá từ thấp đến cao</label>
                                    </li>
                                    <li>
                                        <input type="radio" id="jtv5" name="jtvc">
                                        <label for="jtv5"> <span class="button"></span>Giá từ cao xuống thấp</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="size-area">
                            <h2 class="saider-bar-title">Theo phân loại</h2>
                            <div class="size">
                                <ul >
                                    @foreach($categories as $cate)
                                    <li class="li-brand"><a href="#" onclick="productByCate({{$cate->id}})">{{$cate->category_name}} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    
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
                </div>
                <div class="block compare">
                    <div class="sidebar-bar-title"><h3>Compare Products (4)</h3></div>
                    <div class="block-content">
                        <ol id="compare-items">
                            <li class="item"> <a href="compare.html" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>&nbsp; Vestibulum porta tristique porttitor.</a> </li>
                            <li class="item"> <a href="compare.html" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>&nbsp; Lorem ipsum dolor sit amet</a> </li>
                            <li class="item"> <a href="compare.html" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>&nbsp; Vestibulum porta tristique porttitor.</a> </li>
                            <li class="item"> <a href="compare.html" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>&nbsp; Lorem ipsum dolor sit amet</a> </li>
                        </ol>
                        <div class="ajax-checkout">
                            <button type="submit" title="Submit" class="button button-compare"> <span><i class="fa fa-signal"></i> Compare</span></button>
                            <button type="submit" title="Submit" class="button button-clear"> <span><i class="fa fa-eraser"></i> Clear All</span></button>
                        </div>
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
@endsection