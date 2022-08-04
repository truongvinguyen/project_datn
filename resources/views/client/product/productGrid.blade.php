<div class="product-grid-area">
    <ul class="products-grid">
                                
        @foreach($products as $product)
            <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-12" id="item">
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
                                <!-- <div class="add-to-links" data-role="add-to-links"> 
                                    <a href="wishlist.html" class="action add-to-wishlist" title="Add to Wishlist"></a> 
                                    <a href="compare.html" class="action add-to-compare" title="Add to Compare"></a> 
                                </div> -->
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