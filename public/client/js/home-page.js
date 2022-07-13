$(document).ready(function () {
  $('#pagination li').on('click', function (e) {
    let offset = e.target.dataset.offset;
    // console.log(e.target.dataset.offset)
    $.ajax({
      url: `/api/product-grid/${offset}`,
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
});

$.ajax({
  url: `/api/product-grid`,
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
  
