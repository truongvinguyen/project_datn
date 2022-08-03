<div class="modal-body">
    <button type="button" class="close myclose" data-dismiss="modal">×</button>
    <div class="product-view-area">
        <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
            <div class="icon-sale-label sale-left">Sale</div>
            <div class="slider-items-products">
                <div id="previews-list-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col6">
                        <a href="/upload/product/{{$data->product_image}}" class="cloud-zoom-gallery" id="zoom1">
                            <img class="zoom-img" src="/upload/product/{{$data->product_image}}" alt="products" style="height: 480px;">
                        </a>
                       
                    </div>
                </div>
            </div>

            <!-- end: more-images -->

        </div>
        <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
            <div class="product-name">
                <h2>{{$data->product_name}}</h2>
            </div>
            <div class="price-box">
                <p class="special-price"> <span class="price-label">Giá đặt biệt:</span> <span class="price">
                        {{number_format($data->product_price)}} </span> </p>
                <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">
                        {{number_format($data->product_price_sale)}} </span> </p>
            </div>
            <div class="ratings">
                <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                <p class="rating-links"> <a href="#">1 đánh giá(s)</a> <span class="separator">|</span> <a href="#">Thêm
                        đánh giá</a> </p>
                <p class="availability in-stock pull-right">Tình trạng: <span>Còn hàng</span></p>
            </div>
            <div class="short-description">
                <h3>Mô tả</h3>
                <p>Nike Air Force 1 Ra mắt vào năm 1982 bởi nhà thiết kế Bruce Kilgore,
                </p>
            </div>
            <div class="product-color-size-area">
                <div class="color-area">
                    <h2 class="saider-bar-title">Tồn kho</h2>
                    <div class="">
                        <ul>
                            <li><a href="" id="showqty"> vui lòng chọn kích thước</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="size-area">
                    <h2 class="saider-bar-title">Size</h2>
                    <div class="size">
                        <ul>@if($size != null)
                                @foreach($size as $item3)
                                <li><a onclick="setsize({{$item3->id}},{{$item3->inventory}})" href="javascript:">{{$item3->product_size}}</a></li>
                                @endforeach
                            @else
                                Sản phẩm chưa mở bán
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product-variation">
                <form>
                    <div class="cart-plus-minus">
                        <label for="qty">Số lượng:</label>
                        <div class="numbers-row">
                            <div onClick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;"
                                class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                            <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="quantity" >
                            <div onClick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                                class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                        </div>
                    </div>
                    <input type="hidden" id="showinventory" class="inventory" value="">
                    <input type="hidden" id="image" value="{{$data->product_image}}">
                    <input type="hidden" id="name" value="{{$data->product_name}}">
                    <button onclick="addtocart(id)" class="button pro-add-to-cart addtocart" id="" title="Add to Cart" type="button" data-dismiss="modal"><span><i
                                class="fa fa-shopping-cart"></i>Thêm vào giỏ</span></button>
                </form>
            </div>
            <div class="product-cart-option">
                <ul>
                    @if($data->wishlist_id != null)
                        <li class="text-danger"><i class="fa fa-heart" style="margin-right: 8px;"></i><span>Đã yêu thích</span></li>
                    @endif
                    <li><a style="color:#fe0100 ;" href="/product-detail/{{$data->id}}"><i class="fa fa-retweet"></i><span>Xem chi tiết</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>