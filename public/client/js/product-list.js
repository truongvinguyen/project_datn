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

function filterValues(key) {
  return function(a, b) {
    if(!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
      // nếu không tồn tại
      return 0;
    }

    const varA = (typeof a[key] === 'string') ? a[key].toUpperCase() : a[key];
    const varB = (typeof b[key] === 'string') ? b[key].toUpperCase() : b[key];

    let comparison = 0;
    if (varA == varB) { 
      comparison !== 1;
    }else if (varA < varB) {
      comparison = -1;
    }
  };
}

const numberFormat = new Intl.NumberFormat('vi-VN', {
  style: 'currency',
  currency: 'VND',
});

const url = `http://127.0.0.1:8000/api/home/`;
fetch(url)
.then(response => response.json())
.then(data=> data.sort(compareValues('qty_sold','desc')))
.then(data =>{
    let product = document.querySelector('#products-list')
    const html = data.map(product =>{
        return `
        <li class="item ">
        <div class="product-img">
          <div class="icon-sale-label sale-left">
            ${Math.round(((product.product_price_sale-product.product_price)/product.product_price_sale)*100)}%
          </div>
          <a href="/product-detail/${product.id}" title="${product.product_name}">
            <figure> <img class="small-image" src="/upload/product/${product.product_image}" alt="${product.product_name}">
            </figure>
          </a>
        </div>
        <div class="product-shop">
          <h2 class="product-name"><a href="/product-detail/${product.id}" title="${product.product_name}">${product.product_name}</a></h2>
          <div class="ratings">
            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
            <p class="rating-links"> <a href="#">1 đánh giá(s)</a> <span class="separator">|</span> <a
                href="#">Thêm đánh giá</a> </p>
          </div>
          <div class="price-box">
            <p class="special-price"> <span class="price-label"></span> <span class="price">${numberFormat.format(product.product_price_sale)}</span>
            </p>
            <p class="old-price"> <span class="price-label"></span> <span class="price">${numberFormat.format(product.product_price)} </span>
            </p>
            <p class="old-price" style="width:15%;float:right;"> <span class="price-label">Đã bán:</span> <span class="qty-sold"> Đã bán: ${product.qty_sold} </span> </p>
          </div>
          <div class="desc std">
            <p>
              ${product.product_content}
              <a class="link-learn" title="Learn More" href="/product-detail/${product.id}">Xem thêm</a>
            </p>
          </div>
          <div class="actions">
            <button class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</span></button>
            <ul>
              <li><a href="wishlist.html"><i class="fa fa-heart"></i><span>Thêm vào yêu thích</span></a></li>
              <li><a href="#"><i class="fa fa-retweet"></i><span>So sánh</span></a></li>
            </ul>
          </div>
        </div>
      </li>
        `;
    })
    .join("");
    product.insertAdjacentHTML("afterbegin", html);
    
})
.catch(error => {console.log('Error')});


function productByCate($id){
  const url = `http://127.0.0.1:8000/api/home/`;
  console.log(url)
  fetch(url)
  .then(response => response.json())
  .then(data=> console.log(data.filter(filterValues('qty_sold'))))
  
}