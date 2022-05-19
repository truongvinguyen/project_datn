@extends('layouts.layout')
@section('title')
Sản phẩm
@endsection
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/modal.css')}}"> -->





<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Quản lý sản phẩm <a href="/add-new-product"><button type="button"
                            class="btn btn-xl btn-outline-primary"><i class="icon-copy fi-plus"></i>Thêm</button></a>
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">quản lý sản phẩm</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="" style="font-size:20px ;">Tất cả sản phẩm</h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export  nowrap" id="myTable">
            <thead>
                <tr>
                    <th></th>
                    <th class="table-plus datatable-nosort">Product</th>
                    <th>Name</th>
                    <th>Thêm bởi</th>
                    <th>Giá gốc</th>
                    <th>Giá KM<span class="text-danger">(Giá bán)</span></th>
                    <th>Ẩn/Hiện</th>
                    <th>Loại</th>

                    <th class="datatable-nosort">Tùy chọn</th>
                </tr>
            </thead>
            <tbody>

                @foreach($product as $item)
                <tr>
                    <td></td>
                    <td class="table-plus">
                        <img src="/upload/product/{{ $item->product_image }}" width="45px" height="45px" alt="">
                    </td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">
                            {{$item->product_name}}</a>

                    </td>
                    <td>{{$item->product_user}}</td>
                    <td>{{number_format($item->product_price_sale)}}</td>
                    <td class="text-danger">{{number_format($item->product_price)}}</td>
                    @if ($item->product_status ==1)
                    <td><span class="badge badge-pill"  style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);">Hiện</span></td>
                    @else
                    <td><span class="badge badge-pill"  style="color: red; background-color: rgb(231, 235, 245);">Ẩn</span></td>
                    @endif
                    <td>{{$item->category_name}}</td>
                    <td class=" text-right">
                        <div class="dropdown">
                            <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a> -->
                            <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                            <a class="droupdow-item product-item btn btn-dark " data-toggle="modal"
                                data-target="#exampleModalCenter{{$item->id}}" href="#"><i class="dw dw-eye"></i>
                                Xem chi
                                tiết 1</a>
                                <a class="droupdow-item product-item btn btn-dark"  href="product-detail/{{$item->id}}"><i class="dw dw-eye"></i>
                                Xem chi
                                tiết 2</a>
                            <a class="item product-item btn btn-dark" href="/view-inventory/{{$item->id}}/{{$item->product_name}}"><i class="dw dw-eye"></i> Xem
                                kho</a>
                            <a class="item product-item btn btn-dark" href="/edit/{{$item->id}}"><i
                                    class="dw dw-edit2"></i> Chỉnh
                                sửa</a>
                            <a class="item product-item btn btn-dark" href="#" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}"><i class="dw dw-delete-3" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}"></i> Xóa</a>
                            <a class="item product-item btn btn-dark"
                                href="/add-image-product/{{$item->id}}/for={{$item->product_name}}"><i
                                    class="dw dw-image" aria-hidden="true"></i>
                                </i>Thêm hình ảnh</a>
                            <!-- </div> -->
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach($product as $item)
<div class="modal fade" id="confirmation-modal{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">Sản phẩm sẽ được xóa khỏi hệ thống (bao gồm kho)</h4>
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal"><i class="fa fa-times"></i></button>
                            Hủy
                        </div>
                        <div class="col-6">
                            <a href="/delete-product/{{$item->id}}" type="button" 
                                class="delete-image btn btn-primary border-radius-100 btn-block confirmation-btn"
                                ><i class="fa fa-check"></i></a>
                            Có
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach

@foreach($product as $item)
<div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close d-flex align-items-center justify-content-center"
                    data-dismiss="modal" aria-label="Close">
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

@endforeach
@endsection


