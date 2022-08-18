<div class="modal-header text-center">
    <h4 class="modal-title w-100 font-weight-bold">Cập nhật</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body mx-3" >
    <form action="">
        <div class="md-form mb-5">
        <input type="number"  class="form-control validate" value="{{$dataedit->inventory}}" id="inventoryup">
        <label data-error="wrong" data-success="right" for="form3">Tồn kho</label>
        </div>
    
        <div class="md-form mb-4">
        <input type="number"  class="form-control validate" value="{{$dataedit->sold}}" id="soldup">
        <label data-error="wrong" data-success="right" for="form2">Đã bán</label>
        </div>
        <input type="hidden" value="{{$dataedit->product_id}}" id="product_idup">
    </form>

  </div>
  <div class="modal-footer d-flex justify-content-center">
    <button data-dismiss="modal" aria-label="Close" onclick="update({{$dataedit->id}})" class="btn btn-indigo">Lưu <i class="fas fa-paper-plane-o ml-1"></i></button>
  </div>