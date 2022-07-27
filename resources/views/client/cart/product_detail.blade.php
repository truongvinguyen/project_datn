@extends('layouts.client-1')
@section('title')
{{$data->product_name}}
@endsection
@section('content')
<style>
    div.stars {
    width: 270px;
    display: inline-block;
    }
 
    input.star { display: none; }
    
    label.star {
    /* float: right; */
    padding: 10px;
    font-size: 36px;
    color: #444;
    /* transition: all .2s; */
    }
    
    input.star:checked ~ label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
    }
    
    input.star-5:checked ~ label.star:before {
    color: #FE7;
    /* text-shadow: 0 0 20px #952; */
    }
    
    input.star-1:checked ~ label.star:before { color: #F62; }
    
    /* label.star:hover { transform: rotate(-15deg) scale(1.3); } */
    
    label.star:before {
    content: '\f006';
    font-family: FontAwesome;
    }
</style>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
                    <li class=""> <a title="Go to Home Page" href="shop_grid.html">Watches</a><span>&raquo;</span></li>
                    <li><strong>Lorem Ipsum is simply</strong></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-main">
          <div class="product-view-area">
            <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
              <div class="icon-sale-label sale-left">Sale</div>
              <div class="large-image"> <a href="/upload/product/{{$data->product_image}}" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img class="zoom-img" src="/upload/product/{{$data->product_image}}" alt="products"> </a> </div>
            <div class="slider-items-products col-md-12">
              <div id="thumbnail-slider" class="product-flexslider hidden-buttons product-thumbnail">
                <div class="slider-items slider-width-col3">
                  <div class="thumbnail-items"><a href='/upload/product/{{$data->product_image}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/upload/product/{{$data->product_image}}' "><img src="/upload/product/{{$data->product_image}}" alt = "Thumbnail 2"/></a></div>
                  @foreach($image as $item)
                  <div class="thumbnail-items"><a href='/upload/product/{{$item->image}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '/upload/product/{{$item->image}}' "><img src="/upload/product/{{$item->image}}" alt = "Thumbnail 1"/></a></div>
                  @endforeach
                </div>
              </div>
            </div>
              
              
              <!-- end: more-images --> 
              
            </div>
            <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
              <div class="product-name">
                <h1>{{$data->product_name}}</h1>
              </div>
              <div class="price-box">
                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price">{{number_format($data->product_price)}} vnđ</span> </p>
                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price">{{number_format($data->product_price_sale)}} vnđ</span> </p>
              </div>
              <div class="ratings">
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                <p class="availability in-stock pull-right">Availability: <span>In Stock</span></p>
              </div>
              <div class="short-description">
                <h4>Quick Overview</h4>
                <p>{!!$data->product_content!!}</p>
              </div>

              <div class="product-color-size-area">
                <div class="size-area">
                  <h2 class="saider-bar-title">Kích thước</h2>
                  <div class="size">
                    <ul>
                      @foreach($size as $item3)
                      <li ><a onclick="setsize({{$item3->id}},{{$item3->inventory}})" href="javascript:">{{$item3->product_size}}</a></li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="size-area">
                  <h2 class="saider-bar-title">Tồn kho</h2>
                  <div class="size">
                    <ul>
                    <li><a href="" id="showqty" style="border: none;">vui lòng chọn kích thước</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="product-variation">
                <form>
                  <div class="cart-plus-minus">
                    <label for="qty">Số lượng:</label>
                    <div class="numbers-row">
                      <div onClick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="number" class="qty" title="Qty" min="1" max="200" value="1" id="quantity">
                      <input type="hidden" id="image" value="{{$data->product_image}}">
                      <input type="hidden" id="name" value="{{$data->product_name}}">
                      <div onClick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                    </div>
                  </div>
                  <input type="hidden" id="showinventory" class="inventory" value="">
                  <button class="button pro-add-to-cart addtocart" onclick="addtocart(id)" id="" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</span></button>
                </form>
              </div>
              <div class="product-cart-option">
                <ul>
                  <li><a href="wishlist.html"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
                  <li><a href="#"><i class="fa fa-retweet"></i><span>Add to Compare</span></a></li>
                  <li><a href="#"><i class="fa fa-envelope"></i><span>Email to a Friend</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="product-overview-tab">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="product-tab-inner">
                  <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>
                    <li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
                    <li><a href="#product_tags" data-toggle="tab">Tags</a></li>
                    <li> <a href="#custom_tabs" data-toggle="tab">Custom Tab</a> </li>
                  </ul>
                  <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="description">
                      <div class="std">
                        <p>{!!$data->product_content!!}</p>
                       
                      </div>
                    </div>
                    <div id="reviews" class="tab-pane fade">
                      <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="reviews-content-right">
                          <h2>Đánh giá sản phẩm</h2>
                          <form action="{{route('review')}}" method="post">
                            <div class="table-responsive reviews-table">
                                <div class="start" style="display: inline-flex; flex-direction: row-reverse;">
                                    <input class="star star-1" id="star-1" type="radio" name="star"/>
                                    <label class="star star-1" for="star-1"></label>
                                    <input class="star star-2" id="star-2" type="radio" name="star"/>
                                    <label class="star star-2" for="star-2"></label>
                                    <input class="star star-3" id="star-3" type="radio" name="star"/>
                                    <label class="star star-3" for="star-3"></label>
                                    <input class="star star-4" id="star-4" type="radio" name="star"/>
                                    <label class="star star-4" for="star-4"></label>
                                    <input class="star star-5" id="star-5" type="radio" name="star"/>
                                    <label class="star star-5" for="star-5"></label>
                                </div>
                            </div>
                            <input type="hidden" value="{{$data->id}}">
                            <div class="form-area">
                              <div class="form-element">
                                <label>Bình luận</label>
                                <textarea style="resize:none;"></textarea>
                              </div>
                              <div class="">
                                <button class="button submit" title="Submit Review" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>
                              </div>
                            </div>
                            @csrf
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="product_tags">
                      <div class="box-collateral box-tags">
                        <div class="tags">
                          <form id="addTagForm" action="#" method="get">
                            <div class="form-add-tags">
                              <div class="input-box">
                                <label for="productTagName">Add Your Tags:</label>
                                <input class="input-text" name="productTagName" id="productTagName" type="text">
                                <button type="button" title="Add Tags" class="button add-tags"><i class="fa fa-plus"></i> &nbsp;<span>Add Tags</span> </button>
                              </div>
                              <!--input-box--> 
                            </div>
                          </form>
                        </div>
                        <!--tags-->
                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom_tabs">
                      <div class="product-tabs-content-inner clearfix">
                        <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                          simply dummy text of the printing and typesetting industry. Lorem Ipsum
                          has been the industry's standard dummy text ever since the 1500s, when 
                          an unknown printer took a galley of type and scrambled it to make a type
                          specimen book. It has survived not only five centuries, but also the 
                          leap into electronic typesetting, remaining essentially unchanged. It 
                          was popularised in the 1960s with the release of Letraset sheets 
                          containing Lorem Ipsum passages, and more recently with desktop 
                          publishing software like Aldus PageMaker including versions of Lorem 
                          Ipsum.</span></p>
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
<!-- Main Container End -->

<!-- Related Product Slider -->
<section class="upsell-product-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="title_block">
                    <h3 class="products_title">Sản phẩm liên quan</h3>
                </div>
                <div class="slider-items-products">
                    <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
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
                                                <div class="btn-quickview"> <a href="#" data-toggle="modal"
                                                        data-target="#modal-quickview"><i class="fa fa-search-plus"
                                                            aria-hidden="true"></i> Quick View</a> </div>
                                                <div class="add-to-links" data-role="add-to-links"> <a href="wishlist.html"
                                                        class="action add-to-wishlist" title="Add to Wishlist"></a> <a
                                                        href="compare.html" class="action add-to-compare"
                                                        title="Add to Compare"></a> </div>
                                            </div>
                                            <a href="/product-detail/{{$product->id}}" class="product-item-photo"> <img
                                                    class="product-image-photo" src="/upload/product/{{$product->product_image}}" alt=""></a>
                                        </div>
                                        <div class="pro-box-info">
                                            <div class="item-info">
                                                <div class="info-inner">
                                                    <div class="item-title">
                                                        <h4><a title="Ipsums Dolors Untra" href="/product-detail/{{$product->id}}">{{$product->product_name}}</a></h4>
                                                    </div>
                                                    <div class="item-content">
                                                       
                                                        <div class="item-price">
                                                            <div class="price-box"> 
                                                                <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">{{number_format($product->product_price)}}₫</span></p> 
                                                                <p class="special-price"> <span class="price-label">Giá đặt biệt</span> <span class="price">&nbsp;{{number_format($product->product_price_sale)}}₫</span> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-hover">
                                                <div class="product-item-actions">
                                                    <div class="pro-actions">
                                                        <button onclick="location.href='shopping_cart.html'"
                                                            class="action add-to-cart" type="button" title="Add to Cart">
                                                            <span>Add to Cart</span> </button>
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
    </div>
</section>
<!-- Upsell Product Slider End -->

<div class="container">
    <!-- service section -->
    <div class="jtv-service-area">
        <div class="row">
            <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
                <div class="block-wrapper ship">
                    <div class="text-des"> <i class="icon-rocket"></i>
                        <h3>FREE SHIPPING & RETURN</h3>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
                <div class="block-wrapper return">
                    <div class="text-des"> <i class="fa fa-dollar"></i>
                        <h3>MONEY BACK GUARANTEE</h3>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
            <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
                <div class="block-wrapper support">
                    <div class="text-des"> <i class="fa fa-headphones"></i>
                        <h3>ONLINE SUPPORT 24/7</h3>
                        <p>Lorem ipsum dolor sit amet. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- our clients Slider -->
<!-- our clients Slider -->

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
@endsection