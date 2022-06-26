@extends('layouts.layout')
@section('title')
Thêm bài viết mới
@endsection
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Thêm bài viết </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('articles.create') }}">Thêm bài viết
                            mới</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <form action="{{route('articles.update', ['id' => $articles->id])}}" method="post" enctype="multipart/form-data">
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
                    <input value="{{$articles->article_title}}" class="form-control" type="text" placeholder="Nhập tên danh mục" name="article_title">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Slug<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                    <input value="{{$articles->article_slug}}" class="form-control" type="text" placeholder="Nhập tên danh mục" name="article_slug">
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Chọn hình ảnh bài viết <span class="text-danger">*</span></label>
                    <div class="custom-file col-md-12">
                        <input type="file" class="custom-file-input" name="article_thumbnail">
                        <label class="custom-file-label">Choose file</label>
                        <div class="row imageedit">
                            <img src="/upload/article/{{$articles->article_thumbnail}}" alt="" width="100%" height="100px" object-fix: cover>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{ Auth::user()->id }}" name="employee_id">

            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Nội dung</label>
                    <div class="col-sm-12 col-md-12">
                        <div class="html-editor pd-20 card-box mb-30">
                            <textarea name="article_content" class="textarea_editor form-control border-radius-0" placeholder="nhập mô tả ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
</div>
@endsection