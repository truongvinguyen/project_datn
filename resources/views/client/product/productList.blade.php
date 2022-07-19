<div class="product-list-area">
    <ul class="products-list">                
        @foreach($products as $product)
            <li class="item ">
                <div class="product-img">
                    @if($product->product_price_sale != null)
                      <div class="icon-sale-label sale-left">
                          {{round((($product->product_price_sale-$product->product_price)/$product->product_price_sale)*100)}}%
                      </div>
                    @endif
                    <a href="/product-detail/{{$product->id}}" title="{{$product->product_name}}">
                        <figure> <img class="small-image" src="/upload/product/{{$product->product_image}}" alt="{{$product->product_name}}"></figure>
                    </a>
                </div>
                <div class="product-shop">
                    <h2 class="product-name"><a href="/product-detail/{{$product->id}}" title="{{$product->product_name}}">{{$product->product_name}}</a></h2>
                    <!-- <div class="ratings">
                        <div class="rating"> 
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i> 
                            <i class="fa fa-star-o"></i> 
                        </div>
                        <p class="rating-links"> 
                            <a href="#">1 đánh giá(s)</a> 
                            <span class="separator">|</span> 
                            <a href="#">Thêm đánh giá</a> 
                        </p>
                    </div> -->
                    <div class="price-box">
                        @if($product->product_price_sale != null)
                            <p class="special-price"> 
                                <span class="price-label"></span> 
                                <span class="price">{{number_format($product->product_price)}}₫</span>
                            </p>
                            <p class="old-price"> 
                                <span class="price-label"></span> 
                                <span class="price">{{number_format($product->product_price_sale)}}₫</span>
                            </p>
                        @else
                            <p class="special-price"> 
                                <span class="price-label"></span> 
                                <span class="regular-price" style="margin-left: 0 !important;">{{number_format($product->product_price)}}₫</span>
                            </p>
                        @endif
                    </div>
                    <div class="desc std">
                        <p>
                            {!!$product->product_content!!}
                            <a class="link-learn" title="Learn More" href="/product-detail/{{$product->id}}">Xem thêm</a>
                        </p>
                    </div>
                    <div class="actions">
                        <button class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</span></button>
                        <ul>
                            <li>
                                <a href="wishlist.html"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-retweet"></i><span>So sánh</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        @endforeach
              
    </ul>
</div>