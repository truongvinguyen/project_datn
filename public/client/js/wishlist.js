$(document).ready(function () {

    $('#th-delate a').on('click', function () {
      $.ajax({
        url: `/wishlist/add/${id}`,
        type: 'GET',
        success: function (response){
          console.log(response)
          // $(`#product-g`).html(response)   
   
        },
        error: function( error){
          console.log(error.message)
        }
      })
    });
  
  });