@extends('layouts.layout')
@section('title')
Thêm sản phẩm mới
@endsection

@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Thêm danh mục </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('brands.create') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('categories.create') }}">Thêm danh mục
                            mới</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <form action="{{route('categories.update', ['id' => $categories->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="clearfix">
        </div>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" name="sunmit" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse" role="button"><i class="icon-copy dw dw-enter"></i> Đăng</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Tên danh mục<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{ $categories->category_name}}" class="form-control" type="text" placeholder="Nhập tên danh mục" name="category_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Slug<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{ $categories->category_slug}}" class="form-control" type="text" placeholder="Nhập slug" name="category_slug">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Mô tả</label>
                    <div class="col-sm-12 col-md-12">
                        <div class="html-editor pd-20 card-box mb-30">
                            <textarea name="category_description" class="textarea_editor form-control border-radius-0" placeholder="nhập mô tả ...">{{ $categories->category_description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Chọn danh mục<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <select class=" form-control " value="{{ $categories->parent_id}}" name="parent_id" style="width: 100%; height: 38px;">
                            <option value="">Chọn danh mục</option>
                            @foreach($category as $category )
                                @if($category->parent_id == null )
                                
                                <option value="{{$category->id}}" {{$category->id == $categories->parent_id ? 'selected' : ''}}>{{$category->category_name}}</option>

                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Chọn hình ảnh sản phẩm <span class="text-danger">*</span></label>
                    <div class="custom-file col-md-12">
                        <input type="file" class="custom-file-input" name="category_image">
                        <label class="custom-file-label">Choose file</label>
                        <div class="row imageedit">
                            <img src="/upload/category/{{$categories->category_image}}" alt="" width="100%" height="300px" object-fix: cover>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{ Auth::user()->id }}" name="employee_id">

            </div>
        </div>
</div>
</form>
</div>
@endsection