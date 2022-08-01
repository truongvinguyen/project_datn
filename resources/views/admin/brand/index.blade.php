@extends('layouts.layout')
@section('title')
Thương hiệu
@endsection
@section('content')

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{Session::get('success')}}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4><strong>Quản lý thương hiệu</strong></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page"><span>Thương hiệu</span></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div id="data-list-table" class="card-box mb-30">
    <div class="pd-20 pb-0 d-none">
        <h5 id="table-title" class=""><strong>Danh sách thương hiệu</strong></h5>
    </div>
    <div class="pd-20">
        <table class="table table-bordered table-small hover nowrap w-100" id="data-table-export-2" data-create-route="{{ route('brands.create') }}" data-order="[]">
            <thead>
                <tr class="thead-light">
                    <th>Tên danh mục</th>
                    <th>Hình ảnh</th>
                    <!-- <th>Trạng thái</th> -->
                    <th>Ngày thêm</th>
                    <th>Cập nhật lần cuối</th>
                    <th class="datatable-nosort" style="width: 12.5%;">Tuỳ chọn</th>
                </tr>
            </thead>
            <tbody id="data-table-tbody">
                @foreach($brands as $brand)
                <tr>
                    <td>{{$brand->brand_name}}</td>
                    <td class="table-plus">
                        <img src="{{ _IMAGE::BRAND . $brand->brand_image }}" width="45px" height="45px" alt="">
                    </td>
                    <td>{{$brand->created_at != null ? $brand->created_at : '...'}}</td>
                    <td>{{$brand->updated_at != null ? $brand->updated_at : '...'}}</td>
                    <td style="width: 12.5%;">
                        {{-- <a href="#" data-target="#exampleModalCenter" class="droupdow-item btn btn-dark" data-toggle="modal">
                            <span class="dw dw-eye"></span>
                        </a> --}}
                        <a href="{{ route('brands.edit', ['id' => $brand->id]) }}" class="btn btn-dark">
                            <span class="dw dw-edit2"></span>
                        </a>
                        <a href="{{ route('brands.delete', ['id' => $brand->id]) }}" class="btn btn-danger">
                            <span class="dw dw-delete-3"></span>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết thương hiệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless table-small">
                    <tbody>
                        <tr>
                            <td rowspan="11" style="width: 50%" class="pl-20"><img src="/upload/category/2.jpg" alt="hình ảnh danh mục" class="w-100"></td>
                        </tr>
                        <tr>
                            <td scope="row" style="width: 25%"><strong>Tên danh mục</strong></td>
                            <td style="width: 25%">abc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Tên nhân viên</strong></td>
                            <td>abc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Danh mục cha</strong></td>
                            <td>adc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Slug</strong></td>
                            <td>adc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Hình ảnh</strong></td>
                            <td>adc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Tên danh mục cha</strong></td>
                            <td>abc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Mô tả</strong></td>
                            <td>abc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Trạng thái</strong></td>
                            <td>abc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Ngày thêm</strong></td>
                            <td>abc</td>
                        </tr>
                        <tr>
                            <td scope="row"><strong>Ngày cập nhật</strong></td>
                            <td>abc</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-dark" data-dismiss="modal">
                    <i class="dw dw-edit2"></i>&ensp;Chỉnh sửa
                </a>
                <button type="button" class="btn btn-danger">
                    <i class="dw dw-delete-3"></i>&ensp;Xóa
                </button>
            </div>
        </div>
    </div>
</div>

@endsection