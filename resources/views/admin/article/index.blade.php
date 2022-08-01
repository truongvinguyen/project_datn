@extends('layouts.layout')
@section('title')
Bài viết
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
<!-- <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/styles/modal.css')}}"> -->

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
                <h4><strong>Quản lý bài viết</strong></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active text-muted" aria-current="page"><span>Bài viết</span></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div id="data-list-table" class="card-box mb-30">
    <div class="pd-20 pb-0 d-none">
        <h5 id="table-title" class=""><strong>Danh sách bài viết</strong></h5>
    </div>
    <div class="pd-20">
        <table class="table table-bordered table-small hover nowrap w-100" id="data-table-export-2" data-create-route="{{ route('articles.create') }}" data-order="[]">
            <thead>
                <tr class="thead-light">
                    <th class="col-4">Tiêu đề</th>
                    <th class="col-2">Hình ảnh</th>
                    <th class="col-2">Ngày thêm</th>
                    <th class="col-2">Cập nhật lần cuối</th>
                    <th class="col-1 datatable-nosort" style="width: 12.5%;">Tuỳ chọn</th>
                </tr>
            </thead>
            <tbody id="data-table-tbody">
                @foreach($articles as $article)
                    <tr>
                        <td>{{strlen($article->article_title) > 50 ? mb_strimwidth($article->article_title, 0, 50, '...') : $article->article_title}}</td>
                        <td class="table-plus">
                            <img src="{{ _IMAGE::ARTICLE . $article->article_thumbnail }}" width="45px" height="45px" alt="">
                        </td>
                        <!-- <td>{{$article->article_content}}</td> -->
                        <td>{{$article->created_at != null ? $article->created_at : '...'}}</td>
                        <td>{{$article->updated_at != null ? $article->updated_at : '...'}}</td>
                        <td style="width: 12.5%;">
                            {{-- <a href="#" data-target="#exampleModalCenter" class="droupdow-item btn btn-dark" data-toggle="modal">
                                <span class="dw dw-eye"></span>
                            </a> --}}
                            <a href="{{ route('articles.edit', ['id' => $article->id]) }}" class="btn btn-dark">
                                <span class="dw dw-edit2"></span>
                            </a>
                            <a href="{{ route('articles.delete', ['id' => $article->id]) }}" class="btn btn-danger">
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