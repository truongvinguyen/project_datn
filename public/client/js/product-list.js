$(document).ready(function ($id) {
  $('#pagination li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    // console.log(e.target)
    
    $.ajax({
      url: `/api/product-list/${offset}`,
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

  $('#bestsell p').on('click', function () {
  
    $.ajax({
      url: `/api/product-best/`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        $(`#product-l`).html(response)   
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

  $('#bestsell p').on('click', function () {
  
    $.ajax({
      url: `/api/product-best/`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        
        $(`#product-l`).html(response)   
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

});

$.ajax({
  url: `/api/product-list`,
  type: 'GET',
  dataType: 'text',
  success: function (response){
    console.log()
    $(`#product-l`).html(response)
  },
  error: function( error){
    console.log(error.message)
  }
})

$.ajax({
  url: `/api/product-best`,
  type: 'GET',
  dataType: 'text',
  success: function (response){
    $(`#product-l`).html(response)   
    
  },
  error: function( error){
    console.log(error.message)
  }
})