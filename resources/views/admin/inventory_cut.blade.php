@foreach($data as $item)
<tr>
    <td></td>
    <td class="table-plus">{{$loop->index}}</td>
    <td>{{$item->product_size}}</td>
    <td>{{number_format( $item->import_price)}}</td>
    <td>{{number_format( $item->price)}}</td>
    <td>{{$item->inventory}}</td>
    <td>{{$item->sold}}</td>
    <td class=" text-right">
        <a class="item product-item btn btn-dark" href="#"><i class="dw dw-delete-3"></i></a>
        <a class="item product-item btn btn-dark" href="#"><i class="dw dw-delete-3"></i>
        </a>
    </td>
</tr>
@endforeach

<tr class="collapse" id="collapseExample" style="height:150px;margin-top: 50px;background-color: white;">

    <form action="/add-new-inventory/{{$product_id}}">
        @csrf
        <td></td>
        <td class="table-plus">Thêm kích thước mới</td>
        <td style="width: 150px;">
            <select class="form-control" name="size" id="">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </td>
      
        <td style="width: 191px;"><input type="text" name="import_price" class="form-control"
                value=""></td>
      
        
        <td style="width: 200px;"><input type="text" name="price" class="form-control"
                value="{{$price->product_price}}"></td>
        <td style="width: 100px; "><input class="form-control" name="inventory" type="number"></td>
        <td style="width: 100px;"><input class="form-control" name="sold" type="number" value="0">
        </td>
        <td class=" text-right">
            <input type="submit" class="btn btn-primary" value="Thêm">
        </td>
    </form>
</tr>