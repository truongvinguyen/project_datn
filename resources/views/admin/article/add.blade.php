@extends('layouts.layout')
@section('title')
Thêm bài viết mới
@endsection
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4><strong>Quản lý bài viết</strong></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('articles.index') }}">Bài viết</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page"><span>Thêm mới</span></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="pd-20 card-box mb-30">
    <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
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
                    <label class="col-sm-6 col-md-3 col-form-label">Tiêu đề bài viết<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="" class="form-control @error('article_title') field-danger @enderror" type="text" placeholder="Nhập tiêu đề" name="article_title">
                        @error('article_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Slug</label>
                    <div class="col-sm-12 col-md-12">
                        <input value="" class="form-control" type="text" placeholder="Nhập slug" name="article_slug">
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Chọn danh mục<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <select class=" form-control " name="category_id" style="width: 100%; height: 38px;">
                            <option value="">Chọn danh mục</option>
                            @foreach($category as $category )
                            @if($category->category_id == null )

                            <option value="{{$category->id}}">{{$category->category_name}}</option>

                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Chọn sản phẩm<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <select class=" form-control " name="id" style="width: 100%; height: 38px;">
                            <option value="">Chọn sản phẩm</option>
                            @foreach($product as $product )
                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Chọn thương hiệu<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <select class=" form-control " name="parent_id" style="width: 100%; height: 38px;">
                            <option value="">Chọn thương hiệu</option>
                            @foreach($brand as $brand )
                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
            </div>

            <div class="col-md-4">

                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Hình ảnh<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        {{-- <label class="form-control">Chọn hình ảnh</label> --}}
                        <input type="file" class="form-control @error('article_thumbnail') field-danger @enderror" name="article_thumbnail">
                        @error('article_thumbnail')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" value="{{ Auth::user()->id }}" name="employee_id">

            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Nội dung</label>
                    <div class="col-sm-12 col-md-12">
                        <div class="html-editor card-box">
                            <textarea name="article_content" class="textarea_editor form-control border-radius-0 @error('article_content') field-danger @enderror" placeholder="nhập mô tả ..."></textarea>
                        </div>
                        @error('article_content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
</div>
@endsection