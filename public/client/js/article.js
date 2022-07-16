$.ajax({
    url: `/api/categories/`,
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