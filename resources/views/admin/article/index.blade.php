@extends('layouts.layout')
@section('title')
Bài viết
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/modal.css')}}"> -->

<script>
	const routesJS = {
		'create': '{{ route('articles.create') }}',
	}
</script>
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
                <h4>Quản lý bài viết
                    <a href="">
                        <button type="button" class="btn btn-xl btn-outline-primary"><i class="icon-copy fi-plus"></i>Thêm</button>
                    </a>
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('articles.index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('articles.index')}}">Quản lý bài viết<colgroup></colgroup></a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div id="data-list-table" class="card-box mb-30">
    <div class="pd-20">
        <h4 class="" style="font-size:20px ;">Tất cả bài viết</h4>
    </div>
    <div class="pd-20">
        <table class="table table-bordered table-small hover nowrap w-100" id="data-table-export-2" data-order="[]">
            <thead>
                <tr>
                    <th class="col-1">Id</th>
                    <th class="col-4">Tiêu đề</th>
                    <th class="col-2">Hình ảnh</th>
                    <!-- <th>Mô tả</th> -->
                    <th class="col-2">Ngày thêm</th>
                    <th class="col-2">Cập nhật lần cuối</th>
                    <th class="col-1">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($articles as $article)
                <tr>
                    <th scope="row">{{$article->id}}</th>
                    <td >{{strlen($article->article_title) > 50 ? mb_strimwidth($article->article_title, 0, 50, '...') : $article->article_title}}</td>
                    <td class="table-plus">
                        <img src="/upload/article/{{ $article->article_thumbnail }}" width="45px" height="45px" alt="">
                    </td>
                    <!-- <td>{{$article->article_content}}</td> -->
                    <td>{{$article->created_at != null ? $article->created_at : '...'}}</td>
                    <td>{{$article->updated_at != null ? $article->updated_at : '...'}}</td>
                    <td>
                        <a href="{{ route('articles.edit', ['id' => $article->id]) }}" class="btn btn-default" ><span class="micon dw dw-edit1"></span></a>
                        <a href="{{ route('articles.delete', ['id' => $article->id]) }}" class="btn btn-danger "><span class="micon dw dw-delete-1"></span></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection