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
    
    <td class="text-center" style="width: 170px;"><input class="form-control" name="inventory" id="inventoryadd" type="number"></td>
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