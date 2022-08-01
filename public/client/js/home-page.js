$(document).ready(function () {
  $('#pagination li').on('click', function (e) {
    let offset = e.target.dataset.offset;
     console.log(e.target.dataset.offset)
    $.ajax({
      url: `/api/products/grid/${offset}`,
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

  $('#search').on('keyup', (function(){ 
    var txt = $(this).val();
    console.log(txt)
    // $('#search_result').addClass('search_result_active');
    if(txt != '')
    {
        $.ajax({
            url: `/api/search/${value}`,
            method: "post",
            data: {search : txt},
            dataType: "text",
            success: function(data)
            {
                $('#search_result').html(data);
            }
        });
    }
    else
    {
        $('#search_result').removeClass('search_result_active');
        $('#search_result').html('');
    }
}));

  $('#productByCate li').on('click', function (e) {
    console.log(e.target)
    let offset = e.target.dataset.offset;
    // console.log(e.target)
    $.ajax({
      url: `/api/products/gridProduct/category_id/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        // console.log(response)
        $(`#product-g`).html(response)   
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
    // console.log(e.target)
    $.ajax({
      url: `/api/products/gridProduct/brand_id/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        // console.log(response)
        $(`#product-g`).html(response)   
        $(`#productByBrand li.active`).toggleClass(`active`);
        $(e.target).toggleClass('active');
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
      url: `/api/products/price/grid/product_price/${price}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        console.log(response)
        $(`#product-g`).html(response)    
        $(`#data_price li.active`).toggleClass(`active`);
        $(e.target).toggleClass('active');
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
      url: `/api/products/discount/grid/product_price/${price}`,
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
  url: `/api/products/grid`,
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
  
