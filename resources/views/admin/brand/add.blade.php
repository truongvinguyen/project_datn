@extends('layouts.layout')
@section('title')
Thêm thương hiệu mới
@endsection
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4><strong>Quản lý thương hiệu</strong></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('brands.index') }}">Thương hiệu</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page"><span>Thêm mới</span></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
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
                        <input value="" class="form-control @error('brand_name') field-danger @enderror" type="text" placeholder="Nhập tên danh mục" name="brand_name">
                        @error('brand_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Slug</label>
                    <div class="col-sm-12 col-md-12">
                        <input value="" class="form-control" type="text" placeholder="Nhập slug" name="brand_slug">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Mô tả</label>
                    <div class="col-sm-12 col-md-12">
                        <div class="html-editor card-box">
                            <textarea name="brand_description" class="textarea_editor form-control border-radius-0" placeholder="nhập mô tả ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Hình ảnh<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        {{-- <label class="form-control">Chọn hình ảnh</label> --}}
                        <input type="file" class="form-control" name="brand_image">
                    </div>
                </div>
                <input type="hidden" value="{{ Auth::user()->id }}" name="employee_id">
                
            </div>
        </div>
</div>
</form>
</div>
@endsection