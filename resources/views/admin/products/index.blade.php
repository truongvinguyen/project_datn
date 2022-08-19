@extends('layouts.layout')
@section('title')
Sản phẩm
@endsection
@section('content')



<style>
    /* From uiverse.io by @mrhyddenn */
    .icon-btn {
        width: 50px;
        height: 50px;
        border: 1px solid #cdcdcd;
        background: white;
        border-radius: 25px;
        overflow: hidden;
        position: relative;
        transition: width 0.2s ease-in-out;
        font-weight: 500;
        font-family: inherit;
    }

    .add-btn:hover {
        width: 120px;
    }

    .add-btn::before,
    .add-btn::after {
        transition: width 0.2s ease-in-out, border-radius 0.2s ease-in-out;
        content: "";
        position: absolute;
        height: 4px;
        width: 10px;
        top: calc(50% - 2px);
        background: seagreen;
    }

    .add-btn::after {
        right: 14px;
        overflow: hidden;
        border-top-right-radius: 2px;
        border-bottom-right-radius: 2px;
    }

    .add-btn::before {
        left: 14px;
        border-top-left-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    .icon-btn:focus {
        outline: none;
    }

    .btn-txt {
        opacity: 0;
        transition: opacity 0.2s;
    }

    .add-btn:hover::before,
    .add-btn:hover::after {
        width: 4px;
        border-radius: 2px;
    }

    .add-btn:hover .btn-txt {
        opacity: 1;
    }

    .add-icon::after,
    .add-icon::before {
        transition: all 0.2s ease-in-out;
        content: "";
        position: absolute;
        height: 20px;
        width: 2px;
        top: calc(50% - 10px);
        background: seagreen;
        overflow: hidden;
    }

    .add-icon::before {
        left: 22px;
        border-top-left-radius: 2px;
        border-bottom-left-radius: 2px;
    }

    .add-icon::after {
        right: 22px;
        border-top-right-radius: 2px;
        border-bottom-right-radius: 2px;
    }

    .add-btn:hover .add-icon::before {
        left: 15px;
        height: 4px;
        top: calc(50% - 2px);
    }

    .add-btn:hover .add-icon::after {
        right: 15px;

        height: 4px;
        top: calc(50% - 2px);
    }
</style>
<link rel="stylesheet" type="text/css" href="{{asset('admin/src/styles/category/category.css')}}">

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Quản lý sản phẩm
                    <a href="/add-new-product">
                        <button type="button" class="btn btn-xl btn-outline-primary"><i class="icon-copy fi-plus"></i>Thêm</button>

                    </a>
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">quản lý sản phẩm</a></li>
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
        <table class="table hover nowrap w-100" id="data-table-export-2" data-create-route="{{ route('products.create') }}" data-order="[]">
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
                        <img src="public/upload/product/{{ $item->product_image }}" width="45px" height="45px" alt="">
                    </td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">
                            {{$item->product_name}}</a>

                    </td>
                    <td>{{$item->product_user}}</td>
                    <td>{{number_format($item->product_price_sale)}}</td>
                    <td class="text-danger">{{number_format($item->product_price)}}</td>
                    @if ($item->product_status ==1)
                    <td><span class="badge badge-pill" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);">Hiện</span></td>
                    @else
                    <td><span class="badge badge-pill" style="color: red; background-color: rgb(231, 235, 245);">Ẩn</span></td>
                    @endif
                    <td>{{$item->category_name}}</td>
                    <td class=" text-right">
                        <div class="dropdown">
                            <!-- <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#"
                                role="button" data-toggle="dropdown">
                                <i class="dw dw-more"></i>
                            </a> -->
                            <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"> -->
                            <a class="droupdow-item product-item btn btn-dark " data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}" href="#"><i class="dw dw-eye"></i>
                                Xem chi
                                tiết 1</a>
                            <a class="droupdow-item product-item btn btn-dark" href="{{ route('products.show', ['id'=>$item->id]) }}"><i class="dw dw-eye"></i>
                                Xem chi
                                tiết 2</a>
                            <a class="item product-item btn btn-dark" href="/view-inventory/{{$item->id}}-<?php echo str_replace(" ", "-", $item->product_name); ?>"><i class="dw dw-eye"></i> Xem
                                kho</a>
                            <a class="item product-item btn btn-dark" href="{{ route('products.edit', ['id'=>$item->id]) }}"><i class="dw dw-edit2"></i> Chỉnh
                                sửa</a>
                            <a class="item product-item btn btn-dark" href="#" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}"><i class="dw dw-delete-3" data-toggle="modal" data-target="#confirmation-modal{{$item->id}}"></i> Xóa</a>
                            <a class="item product-item btn btn-dark" href="/add-image-product/{{$item->id}}/for={{$item->product_name}}"><i class="dw dw-image" aria-hidden="true"></i>
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
@endforeach

@endsection