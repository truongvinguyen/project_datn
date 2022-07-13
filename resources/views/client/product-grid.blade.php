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
            <div class="page-title">
              <h2>Sản phẩm</h2>
            </div>
            <div class="category-description">
              <div class="slider-items-products">
                <div id="category-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4">
                    <a href="#"><img src="/client/images/banner3.jpg" alt="banner"></a>
                    <a href="#"><img src="/client/images/banner4.jpg"></a>
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
           
            <div class="product-grid-area">
              <ul class="products-grid" id="products-grid">
                
              </ul>
            </div>
            <div class="pagination-area ">
              <ul>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <div class="block category-sidebar">
            <div class="sidebar-title">
              <h3>Categories</h3>
            </div>
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
            <div class="sidebar-bar-title">
              <h3>Danh mục</h3>
            </div>
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
                      <label for="jtv2"> <span class="button"></span>Hàng mới về </label>
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
                      <li class="li-brand"><a href="#" onclick="productByBrand({{$cate->id}})">{{$cate->category_name}} </a></li>
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
          <!-- <div class="block product-price-range ">
            <div class="sidebar-bar-title">
              <h3>Giá</h3>
            </div>
            <div class="block-content">
              <div class="slider-range">
                <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                <div class="amount-range-price">Range: $10 - $550</div>
                <ul class="check-box-list">
                  <li>
                    <input type="checkbox" id="p1" name="cc" />
                    <label for="p1"> <span class="button"></span> $20 - $50<span class="count">(0)</span> </label>
                  </li>
                  <li>
                    <input type="checkbox" id="p2" name="cc" />
                    <label for="p2"> <span class="button"></span> $50 - $100<span class="count">(0)</span> </label>
                  </li>
                  <li>
                    <input type="checkbox" id="p3" name="cc" />
                    <label for="p3"> <span class="button"></span> $100 - $250<span class="count">(0)</span> </label>
                  </li>
                </ul>
              </div>
            </div>
          </div> -->

          <!-- <div class="block sidebar-cart">
            <div class="sidebar-bar-title">
              <h3>My Cart</h3>
            </div>
            <div class="block-content">
              <p class="amount">There are <a href="shopping_cart.html">2 items</a> in your cart.</p>
              <ul>
                <li class="item"> <a href="shopping_cart.html" title="Sample Product" class="product-image"><img src="images/products/img07.jpg" alt="Sample Product "></a>
                  <div class="product-details">
                    <div class="access"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a></div>
                    <p class="product-name"> <a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a> </p>
                    <strong>1</strong> x <span class="price">$19.99</span> </div>
                </li>
                <li class="item last"> <a href="#" title="Sample Product" class="product-image"><img src="images/products/img08.jpg" alt="Sample Product"></a>
                  <div class="product-details">
                    <div class="access"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a></div>
                    <p class="product-name"> <a href="shopping_cart.html">Consectetur utes anet adipisicing elit</a> </p>
                    <strong>1</strong> x <span class="price">$8.00</span> 
                   
                  </div>
                </li>
              </ul>
              <div class="summary">
                <p class="subtotal"> <span class="label">Cart Subtotal:</span> <span class="price">$27.99</span> </p>
              </div>
              <div class="cart-checkout">
                <button class="button button-checkout" title="Submit" type="submit"><i class="fa fa-check"></i> <span>Checkout</span></button>
              </div>
            </div>
          </div> -->

          
          <!-- <div class="block compare">
            <div class="sidebar-bar-title">
              <h3>Compare Products (4)</h3>
            </div>
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
          </div> -->
          <div class="single-img-add sidebar-add-slider ">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
             
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              
           
              <div class="carousel-inner" role="listbox">
                <div class="item active"> <img src="images/add-slide1.jpg" alt="slide1">
                  <div class="carousel-caption">
                    <h3><a href="single_product.html" title=" Sample Product">Giảm giá lên đến 50%</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">shopping Now</a> </div>
                </div>
                <div class="item"> <img src="images/add-slide2.jpg" alt="slide2">
                  <div class="carousel-caption">
                    <h3><a href="single_product.html" title=" Sample Product">Bộ sưu tập ấn tượng</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">Xem chi tiết</a> </div>
                </div>
                <div class="item"> <img src="images/add-slide3.jpg" alt="slide3">
                  <div class="carousel-caption">
                    <h3><a href="single_product.html" title=" Sample Product">Khuyến mãi chào hè</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div>
              
            
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
          </div>
          <!-- <div class="block special-product">
            <div class="sidebar-bar-title">
              <h3>Có thể bạn thích</h3>
            </div>
            <div class="block-content">
              <ul>
                <li class="item">
                  <div class="products-block-left"> <a href="single_product.html" title="Sample Product" class="product-image"><img src="images/products/img01.jpg" alt="Sample Product "></a></div>
                  <div class="products-block-right">
                    <p class="product-name"> <a href="single_product.html">Giày lười</a> </p>
                    <span class="price">₫19.99</span>
                   </div>
                </li>   
              </ul>
              <a class="link-all" href="shop_grid.html">All Products</a> </div>
          </div> -->
          <div class="block popular-tags-area ">
            <div class="sidebar-bar-title">
              <h3>Thẻ liên quan</h3>
            </div>
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

<script src="{{ asset('/client/js/home-page.js') }}"></script>
    <script src="{{ asset('/client/js/product-list.js') }}"></script>