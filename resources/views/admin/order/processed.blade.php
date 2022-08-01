@extends('layouts.layout')
@section('title')
Đơn hàng đang xử lý
@endsection
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/modal.css')}}"> -->


<style>
    /* From uiverse.io by @mrhyddenn */
    .cssbuttons-io-button {
        border: none;
        outline: 1px dotted rgb(37, 37, 37);
        outline-offset: -4px;
        background: hsl(0deg 0% 75%);
        box-shadow: inset -1px -1px #292929, inset 1px 1px #fff, inset -2px -2px rgb(158, 158, 158), inset 2px 2px #ffffff;
        text-transform: uppercase;
        letter-spacing: 2px;
        padding: 5px 30px;
        background-color: rgb(207, 51, 65);
        color: white
        }

.cssbuttons-io-button:active {
  box-shadow: inset -1px -1px #fff, inset 1px 1px #292929, inset -2px -2px #ffffff, inset 2px 2px rgb(158, 158, 158);
}
#btn-add-2{
    display: none !important;
}
.company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
       /* From uiverse.io by @satyamchaudharydev */

</style>
<link rel="stylesheet" type="text/css" href="{{asset('admin/src/styles/category/category.css')}}">

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Quản lý đơn hàng
                    
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home-admin">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">Đơn hàng đang xử lý</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>
<div id="show">
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
                        @if($item->status==2)
                        <td>
                            <button  class="button btn-primary">
                                Đánh dấu hoàn thành
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
                                    <a  onclick="deleteOrder({{$item->id}})" href="javascript:" data-color="#e95959" style="color: rgb(233, 89, 89);margin-left: 10px;"><i style="font-size: 20px" class="icon-copy dw dw-delete-3"></i></a>
                                {{-- <a class="droupdow-item product-item " href=""><i class="dw dw-eye"></i>Xem chi tiết </a> --}}
                            
                            </div>
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-lg show" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" style="" aria-modal="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #3b4348;">
                <div class="invoice-header">
                    <div class="logo text-center">
                        <img src="vendors/images/deskapp-logo.png" alt="">
                    </div>
                </div>
                <h4 class="text-center mb-30 weight-600 text-white">Hóa đơn</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="invoice-wrap">
                <div class="invoice-box" id="show-bill">
                    <div class="container">
                        <div class="brand-section">
                            <div class="row">
                            </div>
                        </div>
                    
                        <div class="body-section">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="heading">Số hóa đơn : 001</h2>
                                    <p class="sub-heading">Ngày đặt hàng: 20-20-2021 </p>
                                    <p class="sub-heading">Email: customer@gfmail.com </p>
                                </div>
                                <div class="col-6">
                                    <p class="sub-heading">Tên khách hàng:  </p>
                                    <p class="sub-heading">Địa chỉ giao hàng:  </p>
                                    <p class="sub-heading">Số điện thoại:  </p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="body-section">
                            <h3 class="heading">Sản phẩm</h3>
                            <br>
                            <table class="table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Tên</th>
                                        <th class="w-20 text-center">Kích thước</th>
                                        <th class="w-20 text-center">Số lượng x giá</th>
                                        <th class="w-20 text-center">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Product Name</td>
                                        <td>10</td>
                                        <td>1</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">Sub Total</td>
                                        <td> 10.XX</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">Tax Total %1X</td>
                                        <td> 2</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-right">Grand Total</td>
                                        <td> 12.XX</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h3 class="heading">Payment Status: Paid</h3>
                            <h3 class="heading">Payment Mode: Cash on Delivery</h3>
                        </div> 
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showBill(id){
        document.getElementById('show-bill').innerHTML=` 
            <div class="container d-flex justify-content-center align-items-center">
                <div class="spinner"></div>
            </div>`;

        setTimeout(() =>
            $.ajax({
                url: `/show-bill/${id}`,
                type: 'GET',
            }).done(function (response) {
                $("#show-bill").empty();
                $("#show-bill").html(response); 
            })
        ,550)
    }
    function confirmOder(id){
        $.ajax({
                url: `/confirm-order/${id}`,
                type: 'GET',
            }).done(function (response) {
                $("#show").empty();
                $("#show").html(response); 
            })
    }
    function deleteOrder(id){
        if(confirm("Bạn có chắc muốn xóa đơn hàng")){
            $.ajax({
                    url: `/delete-order/${id}`,
                    type: 'GET',
                }).done(function (response) {
                    alertify.message('Xóa thành công đơn hàng', 'custom', 2,
                    function() {
                        console.log('dismissed');
                    });
                    $("#show").empty();
                    $("#show").html(response); 
                
                })}
        
    }
</script>
@endsection