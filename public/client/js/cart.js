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
        toast({
            title: "Thành công!",
            message: "Bạn đã xóa sản phẩm trong giỏ hàng thành công",
            type: "success",
            duration: 5000
          });
      
    });
}
//xóa toàn bộ giỏ hàng
function deleteAllCart(){
    $.ajax({
        url: `/delete-all-cart/`,
        type: 'GET',
    }).done(function (response) {
        toast({
            title: "Thành công!",
            message: "Bạn đã xóa giỏ hàng thành công",
            type: "success",
            duration: 5000
          });
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
            toast({
                title: "Thành công!",
                message: "Bạn đã cập nhật số lượng thành công",
                type: "success",
                duration: 5000
              });
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
    let name =$("#name").val();
   
    if(!inventory){
        toast({
            title: "Thất bại!",
            message: "xin hãy chọn kích thước trước khi thêm sản phẩm vào giỏ",
            type: "error",
            duration: 5000
          });
    }

    // console.log(typeof inventory);
    // console.log(typeof quantity);
    if (inventory && parseInt(inventory) < parseInt(quantity)) {
        toast({
            title: "Thất bại!",
            message: "sản phẩm vượt quá số lượng hàng tồn kho",
            type: "error",
            duration: 5000
          });
    } else {
        $.ajax({
            url:`/add-to-cart/${id}/${$("#quantity").val()}`,
                type: 'get',		
            }).done(function (response) {
                toastAddToCart({
                      image:$("#image").val(),
                      title: "Thành công!",
                      message: `sản phẩm đã được thêm vào giỏ hàng <h5>${name} x ${quantity}</h5> <a href="/cart/view-cart" class="btn btn-outline-success viewCart" >xem giỏ hàng</a>`,
                      type: "success",
                      duration: 5000
                    });
                  
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
                toast({
                    title: "Thành công!",
                    message: "Bạn đã xóa sản phẩm trong giỏ hàng thành công",
                    type: "success",
                    duration: 5000
                  });
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


//toast message
// Toast function
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
      const toast = document.createElement("div");
  
      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);
  
      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
  
      const icons = {
        success: "fas fa-check-circle",
        info: "fas fa-info-circle",
        warning: "fas fa-exclamation-circle",
        error: "fas fa-exclamation-circle"
      };
      const icon = icons[type];
      const delay = (duration / 1000).toFixed(2);
  
      toast.classList.add("toast", `toast--${type}`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
      toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
      main.appendChild(toast);
    }
  }
  
  function toastAddToCart({ name="", image="", title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
      const toast = document.createElement("div");
  
      // Auto remove toast
      const autoRemoveId = setTimeout(function () {
        main.removeChild(toast);
      }, duration + 1000);
  
      // Remove toast when clicked
      toast.onclick = function (e) {
        if (e.target.closest(".toast__close")) {
          main.removeChild(toast);
          clearTimeout(autoRemoveId);
        }
      };
  
      const icons = {
        success: "fas fa-check-circle",
        info: "fas fa-info-circle",
        warning: "fas fa-exclamation-circle",
        error: "fas fa-exclamation-circle"
      };
      const icon = icons[type];
      const delay = (duration / 1000).toFixed(2);
  
      toast.classList.add("toast", `toast--${type}`);
      toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
  
      toast.innerHTML = `
                      <div class="toast__icon">
                          <img class="img-toast" src="/upload/product/${image}">
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
      main.appendChild(toast);
    }
  }
