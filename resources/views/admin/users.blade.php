@extends('layouts.layout')
@section('title')
Thành viên
@endsection
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Thành viên  <a href="/add-new-user"><button type="button" class="btn btn-xl btn-outline-primary"><i class="icon-copy fi-plus"></i>Thêm</button></a></h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/add-new-user">Danh sách thành
                            viên</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div class="card-box pb-10 ">
    <div class="pd-20">
    <div class="h5 pd-20 mb-0">Recent Patient</div>
    <table class=" table hover nowrap w-100" id="data-table-export-2" data-create-route="{{ route('users.create') }}"
        data-order="[]">
        <thead>
            <tr>
                <th class="table-plus">Tên</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Quyền</th>
                <th>Trạng thái tài khoản</th>
                <th class="datatable-nosort">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $item)
            <tr>
                <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                        <div class="avatar mr-2 flex-shrink-0">
                            <img src="/upload/user/{{$item->user_img}}" class="border-radius-100 shadow" width="40"
                                height="40" alt="">
                        </div>
                        <div class="txt">
                            <div class="weight-600">{{$item->name}}</div>
                        </div>
                    </div>
                </td>
                <td>{{$item->email}}</td>
                @if($item->gender==0)
                <td>Mập mờ</td>
                @elseif($item->gender==1)
                <td>Nam</td>
                @else
                <td>Nữ</td>
                @endif
                @if($item->user_rule==1)
                <td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Nhóm quyền cơ bản</span></td>
                @else
                <td><span class="badge badge-pill" data-bgcolor="rgb(231 245 233)" data-color="rgb(76 147 72)">Nhóm quyền cấp cao</span></td>
                @endif
                <td><span class="badge badge-pill" data-bgcolor="#e7ebf5" data-color="#265ed7">Hoạt động</span></td>
                <td>
                    <div class="table-actions">
                        <a href="{{ route('users.edit', ['id'=>$item->id]) }}" data-color="#265ed7"><i class="icon-copy dw dw-edit2"></i></a>
                        <a href="#" data-color="#e95959"><i class="icon-copy dw dw-delete-3"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>


@endsection