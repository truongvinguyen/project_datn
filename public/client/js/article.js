$(document).ready(function () {
  $('#pagination li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    console.log(e.target.dataset)
    $.ajax({
      url: `/api/articles/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        // console.log(response)
        $(`#blog-posts`).html(response)   
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

})


$.ajax({
    url: `/api/articles`,
    type: 'GET',
    dataType: 'text',
    success: function (response){
      // console.log(response)
      $(`#blog-posts`).html(response)   
    },
    error: function( error){
      console.log(error.message)
    }
})