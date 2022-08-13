$(document).ready(function () {
  $('#pagination-article li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    console.log(e.target.dataset)
    $.ajax({
      url: `/artPagePagination?page=${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        console.log(response)
        $(`#art-pages`).html(response)   
        $(`#pagination-article li.active`).toggleClass(`active`);
        $(e.target).toggleClass('active');
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });

  $('#tree-menu li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    console.log(e.target.dataset)
    $.ajax({
      url: `/article_by_brand/${offset}`,
      type: 'GET',
      dataType: 'text',
      success: function (response){
        console.log(response)
        $(`#blog-posts`).html(response)   
        $(`#tree-menu li.active`).toggleClass(`active`);
        $(e.target).toggleClass('active');
      },
      error: function( error){
        console.log(error.message)
      }
    })
  });
})


function artByBrand($id){
  let id = $id;
  $.ajax({
    url: `/article_by_brand/${id}`,
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
}

// $.ajax({
//     url: `/artPagePagination`,
//     type: 'GET',
//     dataType: 'text',
//     success: function (response){
//       // console.log(response)
//       $(`#blog-posts`).html(response)   
//     },
//     error: function( error){
//       console.log(error.message)
//     }
// })