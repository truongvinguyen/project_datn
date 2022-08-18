@extends('layouts.layout')
@section('title')
Sản phẩm tồn kho
@endsection
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Chi tiết tồn kho
                    <button class="btn btn-xl btn-outline-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="icon-copy fi-plus"></i>
                        Thêm
                        kích
                        thước
                    </button>
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="/product">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">quản lý tồn kho</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="" style="font-size:20px ;">Chi tiết tồn kho thuộc ( <?php echo str_replace("-"," ",$product_name); ?> )</h4>
    </div>
    <div class="pd-20">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:170px;" class="text-center" scope="col" class="table-plus datatable-nosort">stt
                        </th>
                        <th style="width:170px;" class="text-center" scope="col">Kích Thước</th>
                        {{-- <th style="width:170px;" class="text-center" scope="col">Giá bán</th> --}}
                        <th style="width:170px;" class="text-center" scope="col">Tồn kho</th>
                        <th style="width:170px;" class="text-center" scope="col">Đã bán</th>
                        <th style="width:170px;" class="text-right" class="datatable-nosort">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody id="show-inventory">
                    @foreach($data as $item)
                    <tr >
                        <td style="width:170px;" class="text-center">{{$loop->index}}</td>
                        <td style="width:170px;" class="text-center">{{$item->product_size}}</td>
                        {{-- <td style="width:170px;" class="text-center">{{number_format( $item->price)}}</td> --}}
                        <td style="width:170px;" class="text-center">{{$item->inventory}}</td>
                        <td style="width:170px;" class="text-center">{{$item->sold}}</td>
                        <td style="width:170px;" class="text-right">
                    
                            <a onclick="showedit({{$item->id}})" data-toggle="modal" data-target="#modalSubscriptionForm"  data-color="#265ed7"
                                style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>
                            <a 
                                data-color="#e95959" style="color: rgb(233, 89, 89);"><i
                                    class="icon-copy dw dw-delete-3"></i></a>
                    
                        </td>
                    </tr>
                    <!-- cập nhật thuộc tính sản phẩm -->
                    
                    @endforeach
                    <tr class="collapse" id="collapseExample"
                    style="height:150px;margin-top: 50px;background-color: white;">
                    <form  id="create" method="post">
                        <td class="text-center">Thêm</td>
                        <td class="text-center">
                            <select class="form-control" name="size" id="product_sizeok">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </td>
                        
                        <td class="text-center" style="width: 170px;"><input class="form-control" name="inventory" id="inventory" type="number"></td>
                        <td class="text-center" style="width: 170px;"><input class="form-control" name="sold" id="sold"
                                type="number" value="0">
                        </td>
                        <input type="hidden" id="product_id" name="product_id" value="{{$product_id}}">
                        <input type="hidden"  class="token_saveall" value="{{csrf_token()}}">
                        <td class=" text-right">
                            <input onclick="addSize()" type="button"  class="btn btn-primary" value="Thêm mới">
                        </td>
                    </form>
                </tr>

                </tbody>
            </table>
<!-- Thêm thuộc tính sản phẩm -->
            <table class="table">
               
            </table>
        </div>
    </div>
</div>
<script>
    function addSize(){
       
       $('.token_saveall').val();
      var product_id= $('#product_id').val();
      var size = $('#product_sizeok').val();
      var inventory = $('#inventoryadd').val();
      var sold = $('#sold').val();
        $.ajax({
        url: `/add-new-inventory`,
        type: "post",
        data: {
            _token: $(".token_saveall").val(),
            product_id:product_id,
            size:size,
            inventory:inventory,
            sold:sold
        },
        }).done(function (response) {
           if(response == 1){
            alertify.notify('Trùng kích thước', 'custom', 2,
            function() {
                console.log('dismissed');
            });
           alertify.set('notifier', 'position', 'bottom-right');
           }else{
            $('#show-inventory').html(response);
            alertify.message('Thêm kích thước thành công', 'custom', 2,
            function() {
                console.log('dismissed');
            });
           }
        });
 
    }
    function showedit(id){
        $.ajax({
        url: `/edit-inventory/${id}`,
        type: "get",
        }).done(function (response) {
        $('#showformedit').html(response);
        });
 
    }
</script>

<div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="showformedit">
      
    </div>
  </div>
</div>
<script>
    function update(id){
     $('.token_saveall').val();
      var product_id= $('#product_idup').val();
      var inventory = $('#inventoryup').val();
      var sold = $('#soldup').val();
        $.ajax({
        url: `/update-inventory/${id}`,
        type: "post",
        data: {
            _token: $(".token_saveall").val(),
            product_id:product_id,
            inventory:inventory,
            sold:sold
        },
        }).done(function (response) {
            $('#show-inventory').html(response);
            alertify.message('Cập nhật thành công', 'custom', 2,
            function() {
                console.log('dismissed');
            });
        }); 
    }
</script>





@endsection