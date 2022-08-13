$(document).ready(function () {
  $('#pagination li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    $.ajax({
      url: `/pagination/id/asc?page=${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        // console.log(response)
        $(`#product-g`).html(response)   
        $(`#pagination li.active`).toggleClass(`active`);
        $(e.target).toggleClass('active');
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

  $(document).ready(function () {
    $('#paginationSale li').on('click', function (e) {
      let offset = e.target.dataset.offset;
      $.ajax({
        url: `/pagination/product_price_sale/desc?page=${offset}`,
        type: 'GET',
        dataType: 'text',
        success: function (response){
          // console.log(response)
          $(`#productSale`).html(response)   
          $(`#paginationSale li.active`).toggleClass(`active`);
          $(e.target).toggleClass('active');
        },
        error: function( error){
          console.log(error.message)
        }
      })
    })
  });

  
  $(document).ready(function () {
    $('#paginationHighToLow li').on('click', function (e) {
      let offset = e.target.dataset.offset;
      //  console.log(e.target.dataset.offset)
      $.ajax({
        url: `/pagination/product_price/desc?page=${offset}`,
        type: 'GET',
        dataType: 'text',
        success: function (response){
          // console.log(response)
          $(`#productHighToLow`).html(response)   
          $(`#paginationHighToLow li.active`).toggleClass(`active`);
          $(e.target).toggleClass('active');
        },
        error: function( error){
          console.log(error.message)
        }
      })
    })
  });

  $(document).ready(function () {
    $('#paginationLowToHigh li').on('click', function (e) {
      let offset = e.target.dataset.offset;
      $.ajax({
        url: `/pagination/product_price/asc?page=${offset}`,
        type: 'GET',
        dataType: 'text',
        success: function (response){
          // console.log(response)
          $(`#productLowToHigh`).html(response)   
          $(`#paginationLowToHigh li.active`).toggleClass(`active`);
          $(e.target).toggleClass('active');
        },
        error: function( error){
          console.log(error.message)
        }
      })
    })
  });

  $('#productByCate li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    $.ajax({
      url: `/api/products/gridProduct/category_id/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        // console.log(response)
        $(`#category`).html(response)   
        $(`#productByCate li.active`).toggleClass(`active`);
        $(e.target).toggleClass('active');
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

  $('#productByBrand li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    $.ajax({
      url: `/api/products/gridProduct/brand_id/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        // console.log(response)
        $(`#category`).html(response)   
        $(`#productByBrand li.active`).toggleClass(`active`);
        $(e.target).toggleClass('active');
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });
});



//Categories
$.ajax({
  url: `/navigation`,
  type: 'GET',
  dataType: 'text',
  success: function (response){
    // console.log(response)
    $(`.nav-menu`).html(response)   
  },
  error: function( error){
    console.log(error.message)
  }
})

function quickviewProduct(id){
 document.getElementById('show-modal-quickview').innerHTML=` 
  <div class="container d-flex justify-content-center align-items-center">
    <div class="spinner"></div>
  </div>`;

 setTimeout(() =>
      $.ajax({
        url: `/quickview/${id}`,
        type: 'GET',
      }).done(function (response) {
        $("#show-modal-quickview").empty();
        $("#show-modal-quickview").html(response); 
      })
 ,550)

}

setTimeout(function () {
  $("#dislike").hide();
}, 3000);