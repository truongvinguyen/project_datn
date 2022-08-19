@extends('layouts.client-1')

@section('title')
    Đăng ký
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home text-uppercase"> <a title="Go to Home Page" href="index.html">trang chủ</a><span>&raquo;</span></li>
            <li class="text-uppercase"><strong>đăng ký tài khoản</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content">
        <div class="account-login">
          <div class="box-authentication new-customer-box Account Page ">
            @if (Session::has('msgErr'))
              <div class="alert alert-danger"><p>{{Session::get('msgErr')}}</p></div>
            @endif
            {{-- @if (Session::has('msg'))
              <div class="alert alert-success"><p>{{Session::get('msg')}}</p></div>
            @endif --}}
          <form action="{{route('submit-dang-ky')}}" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="check-title">
                      <h4>đăng ký tài khoản</h4>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <label>Họ Và Tên:</label>
                    <div class="input-text">
                      <input type="text" name="fullname" value="{{old('fullname')}}" class="form-control">
                    </div>
                    @error('fullname')
                      <span style="color:red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="col-xs-12">
                    <label>Địa chỉ:</label>
                    <div class="input-text">
                      <input type="text" name="address" value="{{old('address')}}" class="form-control">
                    </div>
                    @error('address')
                      <span style="color:red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="col-xs-12">
                    <label>Điện thoại:</label>
                    <div class="input-text">
                      <input type="number" name="phone" value="{{old('phone')}}" class="form-control">
                    </div>
                    @error('phone')
                      <span style="color:red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="col-xs-12">
                    <label>Email:</label>
                    <div class="input-text">
                      <input type="text" name="email" value="{{old('email')}}" class="form-control">
                    </div>
                    @error('email')
                      <span style="color:red">{{$message}}</span>
                   @enderror
                  </div>
                  <div class="col-xs-12">
                    <label>Mật khẩu:</label>
                    <div class="input-text">
                      <input type="password" name="password" value="{{old('password')}}" class="form-control">
                    </div>
                    @error('password')
                      <span style="color:red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="col-xs-12">
                    <label>Xác thực mật khẩu:</label>
                    <div class="input-text">
                      <input type="password" name="cf_password" value="{{old('cf_password')}}" class="form-control">
                    </div>
                    @error('cf_password')
                      <span style="color:red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="col-xs-12">
                    <label>Ảnh đại diện</label>
                    <div class="input-text">
                      <input type="file" name="file" value="{{old('file')}}" class="form-control">
                    </div>
                    @error('file')
                      <span style="color:red">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="col-xs-12">
                    <div class="">
                      <button name="submit-dk" class="button"><i class="fa fa-user"></i>&nbsp; <span>Đăng ký</span></button>
                    </div>
                  </div>
                </div>
                @csrf
              </form>
              
         
       
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 
  <!-- our clients Slider -->
  

  
@endsection