@extends('layouts.layout')
@section('title')
Sửa thương hiệu 
@endsection
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Sửa thương hiệu </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('brands.create') }}">Thêm danh mục
                            mới</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <form action="{{ route('brands.update', ['id' => $brands->id]) }}" method="post" enctype="multipart/form-data">
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
                    <label class="col-sm-6 col-md-3 col-form-label">Tên thương hiệu<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{$brands->brand_name}}" class="form-control" type="text" placeholder="Nhập tên danh mục" name="brand_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Slug<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{$brands->brand_slug}}" class="form-control" type="text" placeholder="Nhập slug" name="brand_slug">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Mô tả</label>
                    <div class="col-sm-12 col-md-12">
                        <div class="html-editor pd-20 card-box mb-30">
                            <textarea name="brand_description" class="textarea_editor form-control border-radius-0" placeholder="nhập mô tả ...">{{$brands->brand_description}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                
                
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Chọn hình ảnh sản phẩm <span class="text-danger">*</span></label>
                    <div class="custom-file col-md-12">
                        <input type="file" class="custom-file-input" name="brand_image">
                        <label class="custom-file-label">Choose file</label>
                        <div class="row imageedit">
                            <img src="/upload/brand/{{$brands->brand_image}}" alt="" width="100%" height="300px" object-fix: cover>
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