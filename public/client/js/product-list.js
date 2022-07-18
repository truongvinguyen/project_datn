$(document).ready(function ($id) {
  $('#pagination li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    // console.log(e.target)
    
    $.ajax({
      url: `/api/products/list/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        $(`#product-l`).html(response) 
        $(`#pagination li.active`).toggleClass(`active`);
        $(e.target).toggleClass('active');
        
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

  $('#listByCate li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    console.log(e.target)
    $.ajax({
      url: `/api/products/listProduct/category_id/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        // console.log(response)
        $(`#product-g`).html(response)   
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

  $('#listByBrand li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    // console.log(e.target)
    $.ajax({
      url: `/api/products/listProduct/brand_id/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        // console.log(response)
        $(`#product-g`).html(response)   
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

  $('#data_price ').on('click', function (e) {
    let price = e.target.dataset.price;
    console.log(e.target.dataset)
    $.ajax({
      url: `/api/products/price/list/product_price/${price}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        console.log(response)
        $(`#product-g`).html(response)   
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

  $('#data_price ').on('click', function (e) {
    let price = e.target.dataset.price;
    console.log(e.target.dataset)
    $.ajax({
      url: `/api/products/discount/list/product_price/${price}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        console.log(response)
        $(`#product-g`).html(response)   
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

});

$.ajax({
  url: `/api/products/list/`,
  type: 'GET',
  dataType: 'text',
  success: function (response){
    // console.log(response)
    $(`#product-l`).html(response)
  },
  error: function( error){
    console.log(error.message)
  }
})

function productByCate(cate_id){
 
  $.ajax({
    url: `/api/products/list/${cate_id}`,
    type: 'GET',
    dataType: 'text',
    success: function (response){
      // console.log(response)
      $(`#product-l`).html(response)
    },
    error: function( error){
      console.log(error.message)
    }
  })
 
 }