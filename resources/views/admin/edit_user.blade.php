@extends('layouts.layout')
@section('title')
 {{$data->name}}
@endsection
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Cập nhật thông tin</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/add-new-user">Cập nhật thông tin
                            </a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <form action="/update-user/{{$data->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="clearfix">

        </div>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" name="sunmit" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                    data-toggle="collapse" role="button"><i class="icon-copy ion-person-add"></i></i> Cập nhật</button>
            </div>

        </div>


        <div class="row">
            <div class="col-md-8">
                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Họ và tên<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{$data->name}}" class="form-control name" type="text"
                            placeholder="Nhập họ và tên" name="name">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .name {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </div>
                </div>

                {{-- <div class="form-group row">
                    <label class="col-sm-12 col-md-3 col-form-label">Email<span class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{old('email')}}" class="form-control email" placeholder="Nhập Email" type="email"
                            name="email">
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .email {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </div>
                </div> --}}
                {{-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-12 col-form-label">Mật khẩu<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-12">
                                <input value="{{old('password')}}" class="form-control password"
                                    placeholder="Nhập mật khẩu" type="password" name="password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .password {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-12 col-form-label">Xác nhận mật khẩu<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-12 col-md-12">
                                <input value="{{old('password_confirmation')}}" class="form-control password_cf"
                                    placeholder="Nhập lại mật khẩu" type="password" name="password_confirmation">
                                @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .password_cf {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-12 col-form-label">Chọn ảnh đại diện <span
                                    class="text-danger">*</span></label>
                                    <img width="50px" style="margin-left: 20px" src="/upload/user/{{$data->user_img}}" alt="">
                            <div class="custom-file col-md-12">
                               
                                <input type="file" class="custom-file-input form-control user_img" name="user_img">
                                <label class="custom-file-label">Choose file</label>
                                @error('user_img')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .user_img {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                   
                </div>

                





            </div>
            <div class="col-md-4">

           
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Giới tính<span class="text-danger">*</span>
                        @error('user_rule')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .user_rule {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </label>
                    <div class="col-sm-12 col-md-12">
                        <div class="custom-control custom-radio mb-5">
                            <input {{($data->gender==1)?'checked ':''}} type="radio" id="gender1" value="1" name="gender"
                                class="custom-control-input">
                            <label class="custom-control-label" for="gender1">Nam</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input {{($data->gender==2)?'checked ':''}} type="radio" id="gender2" value="2" name="gender"
                                class="custom-control-input">
                            <label class="custom-control-label" for="gender2">Nữ</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input {{($data->gender==0)?'checked ':''}} type="radio" id="gender3" value="0" name="gender"
                                class="custom-control-input">
                            <label class="custom-control-label" for="gender3">Không Tiết lộ</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Quyền truy cập<span class="text-danger">*</span>
                        @error('user_rule')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .user_rule {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </label>
                    <div class="col-sm-12 col-md-12">
                        <div class="custom-control custom-radio mb-5">
                            <input {{($data->user_rule==1)?'checked ':''}} type="radio" id="customRadio1" value="1" name="user_rule"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio1">Nhóm quyền cơ bản</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input {{($data->user_rule==2)?'checked ':''}} type="radio" id="customRadio2" value="2" name="user_rule"
                                class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2">Nhóm quyền cấp cao</label>
                        </div>
                    </div>
                </div>
                <hr>

                <input type="hidden" value="{{ Auth::user()->name }}" name="add_member">
            </div>



        </div>
</div>


</form>

</div>
@endsection