function compareValues(key, order = 'asc') {
  return function(a, b) {
    if(!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
      // nếu không tồn tại
      return 0;
    }

    const varA = (typeof a[key] === 'string') ? a[key].toUpperCase() : a[key];
    const varB = (typeof b[key] === 'string') ? b[key].toUpperCase() : b[key];

    let comparison = 0;
    if (varA > varB) { 
      comparison = 1;
    }else if (varA < varB) {
      comparison = -1;
    }
    return (
      (order == 'desc') ? (comparison * -1) : comparison
    );
  };
}

// function sortBy( a, b){
//   if(parseInt(a.product_price) < parseInt(b.product_price)){
//     return -1;
//   }else if(parseInt(a.product_price) < parseInt(b.product_price)){
//     return 1;
//   }
//   return 0;
// }

const numberFormat = new Intl.NumberFormat('vi-VN', {
  style: 'currency',
  currency: 'VND',
});

const param = new Proxy(new URLSearchParams(window.location.search), {
  get: (searchParams, prop) => searchParams.get(prop),
});

const url = `http://127.0.0.1:8000/api/home/`;
fetch(url)
.then(response => response.json())
.then(data=> data.sort(compareValues('qty_sold','desc')))
.then(data =>{
    let product = document.querySelector('#products-grid')
    const html = data.map(product =>{
        return `
        <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="product-item">
            <div class="item-inner">
              <div class="product-thumbnail">
                <div class="icon-sale-label sale-left">
                  ${Math.round(((product.product_price_sale-product.product_price)/product.product_price_sale)*100)}%
                </div>
                <div class="box-hover">
                  <div class="btn-quickview"> <a  href="" onclick="quickviewProduct(${product.id})" data-toggle="modal" data-target="#modal-quickview"><i class="fa fa-search-plus" aria-hidden="true"></i>Xem nhanh</a> </div>
                  <div class="add-to-links" data-role="add-to-links"> <a href="wishlist.html" class="action add-to-wishlist" title="Add to Wishlist"></a> <a href="compare.html" class="action add-to-compare" title="Add to Compare"></a> </div>
                </div>
                <a href="/product-detail/${product.id}" class="product-item-photo"> <img class="product-image-photo" src="/upload/product/${product.product_image}" style="height:271px;" alt="${product.product_name}"></a> </div>
              <div class="pro-box-info">
                <div class="item-info">
                  <div class="info-inner">
                    <div class="item-title">
                      <h4> <a title="Product Title Here" href="/product-detail/${product.id}">${product.product_name}</a></h4>
                    </div>
                    <div class="item-content">
                      <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                      <div class="price-box">
                        <p class="special-price"> <span class="price-label">Giá đặt biệt</span> <span class="price">${numberFormat.format(product.product_price_sale)}</span> </p>
                        <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price">${numberFormat.format(product.product_price)} </span> </p>
                        <p class="old-price" style="width:40%;float:right;"> <span class="price-label">Đã bán:</span> <span class="qty-sold"> Đã bán: ${product.qty_sold} </span> </p>
                     </div>
                    </div>
                  </div>
                </div>
                <div class="box-hover">
                  <div class="product-item-actions">
                    <div class="pro-actions">
                      <button onclick="location.href='shopping_cart.html'" class="action add-to-cart" type="button" title="Add to Cart"> <span>Thêm vào giỏ</span> </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        `;
    })
    .join("");
    product.insertAdjacentHTML("afterbegin", html);
    
})
.catch(error => {console.log('Error')});

function productById($id){

    const product = `http://127.0.0.1:8000/api/home/`+$id;
    fetch(product)
    .then(response => response.json())
    .then(data =>{
      let p = document.querySelector('#modal-quickview')
      const html = data.map(product =>{
          return `
          <div class="modal-dialog">
            <div class="modal-body">
              <button type="button" class="close myclose" data-dismiss="modal">×</button>
              <div class="product-view-area">
                <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
                  <div class="icon-sale-label sale-left"> ${Math.round(((product.product_price_sale-product.product_price)/product.product_price_sale)*100)}%</div>
                  <div class="slider-items-products">
                    <div id="previews-list-slider" class="product-flexslider hidden-buttons">
                      <div class="slider-items slider-width-col6"> 
                        <a href="/upload/product/${product.product_image}" class="cloud-zoom-gallery" id="zoom1"> 
                          <img class="zoom-img" src="/upload/product/${product.product_image}" alt="products"> 
                        </a> 
                      </div>
                    </div>
                  </div>
                  
                  <!-- end: more-images --> 
                  
                </div>
                <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
                  <div class="product-name">
                    <h2>${product.product_name}</h2>
                  </div>
                  <div class="price-box">
                    <p class="old-price"> <span class="price-label">Giá thường:</span> <span class="price"> ${numberFormat.format(product.product_price)} </span> </p>
                    <p class="special-price"> <span class="price-label">Giá đặt biệt:</span> <span class="price"> ${numberFormat.format(product.product_price_sale)} </span> </p>
                    
                    <p class="old-price" style="width:15%;float:right;"> <span class="price-label">Đã bán:</span> <span class="qty-sold"> Đã bán: ${product.qty_sold} </span> </p>
                  </div>
                  <div class="ratings">
                    <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                    <p class="rating-links"> <a href="#">1 đánh giá(s)</a> <span class="separator">|</span> <a href="#">Thêm đánh giá</a> </p>
                    <p class="availability in-stock pull-right">Tình trạng: <span>Còn hàng</span></p>
                  </div>
                  <div class="short-description">
                  <p> ${product.product_content}</p>
                    </div>
                  <div class="product-color-size-area">
                    <!-- <div class="color-area">
                      <h2 class="saider-bar-title">Màu</h2>
                      <div class="color">
                        <ul>
                          <li><a href="#"></a></li>
                          <li><a href="#"></a></li>
                          <li><a href="#"></a></li>
                          <li><a href="#"></a></li>
                          <li><a href="#"></a></li>
                          <li><a href="#"></a></li>
                        </ul>
                      </div>
                    </div> -->
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
                  <div class="product-variation">
                    <form action="#" method="post">
                      <div class="cart-plus-minus">
                        <label for="qty">Số lượng:</label>
                        <div class="numbers-row">
                          <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                          <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                          <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                        </div>
                      </div>
                      <button class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</span></button>
                    </form>
                  </div>
                  <div class="product-cart-option">
                    <ul>
                      <li><a href="wishlist.html"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a></li>
                      <li><a href="#"><i class="fa fa-retweet"></i><span>So sánh</span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          <div class="modal-footer"> <a href="#" class="btn-services-shop-now" data-dismiss="modal">Close</a> </div>
        </div>
          `;
      })
      .join("");
      p.insertAdjacentHTML("afterbegin", html);
    })
}
function quickviewProduct(id){
    $.ajax({
      url: `/quickview/${id}`,
      type: 'GET',
    }).done(function (response) {
      $("#show-modal-quickview").empty();
      $("#show-modal-quickview").html(response);
      
    });
}
  
