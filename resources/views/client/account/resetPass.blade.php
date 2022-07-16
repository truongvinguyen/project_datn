@extends('layouts.client-1')

@section('title')
    Quên mật khẩu
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home text-uppercase"> <a title="Go to Home Page" href="index.html">trang chủ</a><span>&raquo;</span></li>
            <li class="text-uppercase"><strong>Quên mật khẩu</strong></li>
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
            @if (isset($msgErr))
              <div class="alert alert-danger"><p>{{$msgErr}}</p></div>
            @endif
            {{-- @if (Session::has('msg'))
              <div class="alert alert-success"><p>{{Session::get('msg')}}</p></div>
            @endif --}}
          <form action="" method="post">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="check-title">
                      <h4>Quên mật khẩu</h4>
                    </div>
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
                    <label>Mã xác thực:</label>
                    <div class="input-text">
                      <input type="text" name="code" value="{{old('code')}}" class="form-control">
                    </div>
                    @error('code')
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
                  <div class="col-xs-12 m-2">
                    <div class="">
                      <button name="submit-dk" class="button"><i class="fa fa-user"></i>&nbsp; <span>Đồng ý</span></button>
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
  
  <div class="our-clients">
    <div class="container">
      <div class="slider-items-products">
        <div id="our-clients-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6"> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="/client/images/brand1.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="/client/images/brand2.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="/client/images/brand3.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="/client/images/brand4.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="/client/images/brand5.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="/client/images/brand6.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="/client/images/brand7.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection