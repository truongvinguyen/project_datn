<div id="data-list-table" class="card-box mb-30">
    <div class="pd-20 d-none">
        <h4 class="" style="font-size:20px ;">Tất cả sản phẩm</h4>
    </div>
    <div class="pd-20" >
        <table class="table hover " id="data-table-export-2"  data-order="[]">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại </th>
                    {{-- <th>Địa chỉ giao hàng</th> --}}
                    {{-- <th>Email</th> --}}
                    <th>Tổng thanh toán</th>
                    <th>Trạng thái thanh toán</th>
                    <th>Trạng thái</th>
                    <th class="datatable-nosort">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>

            @foreach($order as $item)
                <tr>
                    <td>TDDH{{$item->id}}</td>
                    @if($item->customer_id>0)
                    <td>{{$item->customer_name}}(Thành viên)</td>
                    @else
                    <td>{{$item->customer_name}}</td>
                    @endif
                    <td>{{$item->customer_phone}}</td>
                    {{-- <td>{{$item->customer_address}}</td> --}}
                    {{-- <td>{{$item->customer_email}}</td> --}}
                    <td>{{number_format($item->total_price)}}</td>
                    @if($item->payment_methods==1)
                    <td>COD</td>
                    @else
                    <td>Đã thanh toán</td>
                    @endif
                    @if($item->status==0)
                    <td>Khách hàng chưa xác nhận</td>
                    @else
                    <td>
                        <button onclick="confirm({{$item->id}})" class="button btn-warning">
                            Xác nhận
                        </button>
                    </td>
                    @endif

                    <td class=" text-left">
                    
                        <div class="dropdown">
                            <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a> -->
                            <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                                <a onclick="showBill({{$item->id}})" class="droupdow-item product-item " data-toggle="modal" data-target="#bd-example-modal-lg" href="javascript:"data-color="#265ed7" style="/* color: rgb(38, 94, 215); */"><i style="font-size: 20px" class="dw dw-eye"></i></a>
                                {{-- <a class="droupdow-item product-item " href=""><i class="dw dw-eye"></i>Xem chi tiết </a> --}}
                                <a href="#" data-color="#e95959" style="color: rgb(233, 89, 89);margin-left: 10px"><i style="font-size: 20px" class="icon-copy dw dw-delete-3"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>
</div>