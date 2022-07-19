@extends('layouts.layout')
@section('title')
Đơn hàng mới
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">quản lý đơn hàng</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div id="data-list-table" class="card-box mb-30">
    <div class="pd-20 d-none">
        <h4 class="" style="font-size:20px ;">Tất cả sản phẩm</h4>
    </div>
    <div class="pd-20">
        <table class="table hover nowrap w-100" id="data-table-export-2"  data-order="[]">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort">Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại </th>
                    <th>Địa chỉ giao hàng</th>
                    {{-- <th>Email</th> --}}
                    <th>Tổng thanh toán</th>
                    <th>Trạng thái</th>
                    <th>PTTT</th>
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
                    <td>{{$item->customer_address}}</td>
                    {{-- <td>{{$item->customer_email}}</td> --}}
                    <td>{{number_format($item->total_price)}}</td>
                    @if($item->status==0)
                    <td>Khách hàng chưa xác nhận</td>
                    @else
                    <td>
                        <button class="cssbuttons-io-button"> Xác nhận
                            
                        </button>
                    </td>
                    @endif
                    @if($item->payment_methods==1)
                    <td>COD</td>
                    @else
                    <td>Đã thanh toán</td>
                    @endif

                    <td class=" text-right">
                    
                        <div class="dropdown">
                            <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a> -->
                            <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                            <a class="droupdow-item product-item btn btn-dark " data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="dw dw-eye"></i> Xem nhanh</a>
                            <a class="droupdow-item product-item btn btn-dark" href=""><i class="dw dw-eye"></i>Xem chi tiết </a>
                           
                        </div>
                    </td>
                </tr>
              @endforeach
              
            </tbody>
        </table>
    </div>
</div>

{{-- @foreach($product as $item)
<div class="modal fade" id="confirmation-modal{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">Sản phẩm sẽ được xóa khỏi hệ thống (bao gồm
                        kho)</h4>
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            Hủy
                        </div>
                        <div class="col-6">
                            <a href="{{ route('products.delete', ['id'=>$item->id]) }}" type="button" class="delete-image btn btn-primary border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></a>
                            Có
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach --}}

{{-- @foreach($product as $item)
<div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="fa fa-times text-dark"></span>
                </button>
            </div>
            <div class="row no-gutters">
                <section class="py-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="/upload/product/{{$item->product_image}}" class="d-block w-100" alt="...">
                                    </div>
                                    @foreach($image as $item2)
                                    @if($item2->product_id == $item->id)
                                    <div class="carousel-item">
                                        <img src="/upload/product/{{$item2->image}}" class="d-block w-100" alt="...">
                                    </div>
                                    @endif
                                    @endforeach

                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>

                </section>


            </div>
        </div>
    </div>
</div>

@endforeach --}}
@endsection