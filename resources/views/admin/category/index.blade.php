@extends('layouts.layout')
@section('title')
Danh mục
@endsection
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/modal.css')}}"> -->

<style>
</style>
<link rel="stylesheet" type="text/css" href="{{asset('admin/src/styles/category/category.css')}}">

<script>
	const routesJS = {
		'create': '{{ route('categories.create') }}',
	}
</script>

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
                <h4><strong>Quản lý danh mục</strong></h4>
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
        <table class="table table-bordered table-small hover nowrap w-100" id="data-table-export-2" data-order="[]">
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
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td scope="row"><strong>{{$category->id}}</strong></td>
                    <td>{{$category->category_name}}</td>
                    <td class="table-plus">
                        <!-- <img src="/upload/category/{{ $category->category_image }}" width="45px" height="45px" alt="">
						-->
					</td>
                    <!-- @if ($category->category_status ==1)
                    <td><span class="badge badge-pill" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);">Hiện</span></td>

                    @elseif($category->category_status ==2)
                    <td><span class="badge badge-pill" style="color: #6e1212; background-color: rgb(231, 235, 245);">Chờ phê duyệt </span></td>
                    @else
                    <td><span class="badge badge-pill" style="color: red; background-color: rgb(231, 235, 245);">Ẩn</span></td>
                    @endif
                    <td>{{$category->category_status}}</td> -->
                    <td>{{$category->parent_id != null ? $category->parent_id : '...'}}</td>
                    <td>{{$category->created_at != null ? $category->created_at : '...'}}</td>
                    <td>{{$category->updated_at != null ? $category->updated_at : '...'}}</td>
                    <td style="width: 15%;">
						<a href="#" data-target="#exampleModalCenter{{$category->id}}" class="droupdow-item btn btn-dark" data-toggle="modal">
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
@foreach($categories as $category)
                <tr>
                    <td scope="row"><strong>{{$category->id}}</strong></td>
                    <td>{{$category->category_name}}</td>
                    <td class="table-plus">
                        <!-- <img src="/upload/category/{{ $category->category_image }}" width="45px" height="45px" alt="">
						-->
					</td>
                    <!-- @if ($category->category_status ==1)
                    <td><span class="badge badge-pill" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);">Hiện</span></td>

                    @elseif($category->category_status ==2)
                    <td><span class="badge badge-pill" style="color: #6e1212; background-color: rgb(231, 235, 245);">Chờ phê duyệt </span></td>
                    @else
                    <td><span class="badge badge-pill" style="color: red; background-color: rgb(231, 235, 245);">Ẩn</span></td>
                    @endif
                    <td>{{$category->category_status}}</td> -->
                    <td>{{$category->parent_id != null ? $category->parent_id : '...'}}</td>
                    <td>{{$category->created_at != null ? $category->created_at : '...'}}</td>
                    <td>{{$category->updated_at != null ? $category->updated_at : '...'}}</td>
                    <td style="width: 15%;">
						<a href="#" data-target="#exampleModalCenter{{$category->id}}" class="droupdow-item btn btn-dark" data-toggle="modal">
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
@endsection