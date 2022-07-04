//set kích thước

function setsize(id, qty) {
    document.getElementById('showqty').innerHTML = qty;
    document.getElementById('showinventory').setAttribute('value', qty);
    document.querySelector('.addtocart').setAttribute('id', id);
    console.log(id, qty);
}
//xóa item trong view cart
function deleteitemlist(id){
    console.log(id);
    $.ajax({
        url: `/delete-list-cart/${id}`,
        type: 'GET',
    }).done(function (response) {
        renderListCart(response);
      
    });
}
//xóa toàn bộ giỏ hàng
function deleteAllCart(){
    $.ajax({
        url: `/delete-all-cart/`,
        type: 'GET',
    }).done(function (response) {
        renderListCart(response);
      
    });
}
function upDateCart(id){

    quantity= $("#quanty-item-"+id).val()
    if(quantity>0){
        $.ajax({
            url: `/save-cart-item/${id}/${quantity}`,
            type: 'GET',
        }).done(function (response) {
            renderListCart(response);
        });
    }else{
        deleteitemlist(id);
    }
   
}

//render trong view cart
function renderListCart(response) {
    renderCart()
    $("#show-list-cart").empty();
    $("#show-list-cart").html(response);
    let qtyshow = $("#totalqtyshow").val();
    $("#showcart").html("Giỏ hàng của bạn trống");
    if(qtyshow){
        document.getElementById("showqtycart").innerHTML = qtyshow;
    }else{
        document.getElementById("showqtycart").innerHTML = 0;
    }
  
}
//them vào giỏ hàng
function addtocart(id) {
    let quantity = $("#quantity").val();
    let inventory = $(".inventory").val();
    if (quantity > inventory) {
        alert("sản phẩm vượt quá hàng tồn kho");
    } else {
        $.ajax({
            url:`/add-to-cart/${id}/${$("#quantity").val()}`,
                type: 'get',		
            }).done(function (response) {
                    renderCart(response);
                });
$('.js-panel-cart').addClass('show-header-cart')
let showinventory = inventory - quantity;
console.log(showinventory)
document.getElementById('showqty').innerHTML = showinventory;
document.getElementById('showinventory').setAttribute('value', showinventory);
        }
}

//xóa item trong modal
function deleteCart(id) {
    $.ajax({
        url: `/delete-item-cart/${id}`,
            type: 'GET',
}).done(function (response) {
                renderCart(response);
            });
};
//render trong modal
function renderCart(response) {
    $("#showcart").empty();
    $("#showcart").html(response);
    let qtyshow = $("#totalqtyshow").val();
    if(qtyshow){
        document.getElementById("showqtycart").innerHTML = qtyshow;
    }else{
        document.getElementById("showqtycart").innerHTML = 0;
    }
}
