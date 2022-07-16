@extends('layouts.layout')
@section('title')
Danh mục
@endsection
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('admin/vendors/styles/modal.css') }}"> -->

<style>
</style>
<link rel="stylesheet" type="text/css" href="{{ asset('admin/src/styles/category/category.css') }}">


@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4><strong>Quản lý danh mục</strong>
                    {{-- <button type="button" data-api="{{ route('api.categories.paginate', [1, 3]) }}" onclick="getCategories(this)" class="btn btn-outline-info">
                        Test API {{Auth::user()}}
                        Test API
                    </button>
                    <input type="text" name="searching" id="test-search-api" data-api="{{ route('categories.search', []) }}" data-token="{{ csrf_token() }}" oninput="getSearchedRecords(this)"> --}}
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Trang chủ</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page"><span>Danh mục</span></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div id="data-list-table" class="card-box mb-30">
    <div class="pd-20 pb-0 d-none">
        <h5 id="table-title" class=""><strong>Danh sách danh mục</strong></h5>
    </div>
    <div class="pd-20">
        <table class="table table-bordered table-small hover nowrap w-100" id="data-table-export-2" data-create-route="{{ route('categories.create') }}" data-order="[]">
            <thead>
                <tr class="thead-light">
                    <th scope="col">#</th>
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Hình ảnh</th>
                    <!-- <th scope="col">Trạng thái</th> -->
                    <th scope="col">Danh mục cha</th>
                    <th scope="col">Ngày thêm</th>
                    <th scope="col">Cập nhật lần cuối</th>
                    <th scope="col" class="datatable-nosort" style="width: 15%;">Tuỳ chọn</th>
                </tr>
            </thead>
            <tbody id="data-table-tbody">
                @foreach ($categories as $category)
                <tr>
                    <td scope="row"><strong>{{ $category->id }}</strong></td>
                    <td>{{ $category->category_name }}</td>
                    <td class="table-plus">
                        <img src="{{ _IMAGE::CATEGORY . $category->category_image }}" width="45px" height="45px" alt="">
                    </td>
                    <!-- @if ($category->category_status == 1)
    <td><span class="badge badge-pill" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);">Hiện</span></td>
@elseif($category->category_status == 2)
    <td><span class="badge badge-pill" style="color: #6e1212; background-color: rgb(231, 235, 245);">Chờ phê duyệt </span></td>
@else
    <td><span class="badge badge-pill" style="color: red; background-color: rgb(231, 235, 245);">Ẩn</span></td>
    @endif
                                <td>{{ $category->category_status }}</td> -->
                    <td>{{ $category->parent_id != null ? $category->parent_id : '...' }}</td>
                    <td>{{ $category->created_at != null ? $category->created_at : '...' }}</td>
                    <td>{{ $category->updated_at != null ? $category->updated_at : '...' }}</td>
                    <td style="width: 15%;">
                        <a href="#" data-target="#exampleModalCenter" class="droupdow-item btn btn-dark" data-toggle="modal">
                            <span class="dw dw-eye"></span>
                        </a>
                        <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-dark">
                            <span class="dw dw-edit2"></span>
                        </a>
                        <a href="{{ route('categories.delete', ['id' => $category->id]) }}" class="btn btn-danger">
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
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên danh mục: abc</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Danh mục cha: adc</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Slug: adc</label>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Hình ảnh: adc</label>
                        </div>               
                    </form> --}}
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

<script src="{{ asset('admin/src/js/category.js') }}"></script>
@endsection