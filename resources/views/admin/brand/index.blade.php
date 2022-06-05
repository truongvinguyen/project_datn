@extends('layouts.layout')
@section('title')
Sản phẩm
@endsection
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/modal.css')}}"> -->


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


<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Quản lý sản phẩm
                    <a href="">">
                        <button type="button" class="btn btn-xl btn-outline-primary"><i class="icon-copy fi-plus"></i>Thêm</button>

                    </a>
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">Quản lý thương hiệu</a></li>
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
                    <th>Id</th>
                    <th>Tên danh mục</th>
                    <th>Hình ảnh</th>
                    <!-- <th>Trạng thái</th> -->
                    <th>Danh mục cha</th>
                    <th>Ngày thêm</th>
                    <th>Cập nhật lần cuối</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($brands as $brand)
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td>{{$brand->brand_name}}</td>
                    <td class="table-plus">
                        <img src="/upload/brand/{{ $brand->brand_image }}" width="45px" height="45px" alt="">
                    </td>
                    
                    <td>{{$brand->parent_id != null ? $brand->parent_id : '...'}}</td>
                    <td>{{$brand->created_at != null ? $brand->created_at : '...'}}</td>
                    <td>{{$brand->updated_at != null ? $brand->updated_at : '...'}}</td>
                    <td>
                        <a href="" class="btn btn-default">Edit</a>
                        <a href=""   class="btn btn-danger action_delete">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
