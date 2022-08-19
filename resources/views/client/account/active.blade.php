@extends('layouts.client-1')

@section('title')
    Xác thực
@endsection
@section('content')
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <ul>
          <li class="home text-uppercase"> <a title="Go to Home Page" href="index.html">trang chủ</a><span>&raquo;</span></li>
          <li class="text-uppercase"><strong>Xác thực tài khoản</strong></li>
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
          @if (Session::has('msg'))
            <div class="alert alert-{{Session::get('type')}}"><p>{{Session::get('msg')}}</p></div>
          @endif
          @if (isset($errActive))
            <div class="alert alert-danger"><p>{{$errActive}}</p></div>
          @endif
          {{-- @if (Session::has('msg'))
            <div class="alert alert-success"><p>{{Session::get('msg')}}</p></div>
          @endif --}}
        <form action="{{route('active')}}" method="post">
              <div class="row">
                <div class="col-xs-12">
                  <div class="check-title">
                    <h4>Xác thực tài khoản</h4>
                  </div>
                </div>
                <div class="col-xs-12">
                    {{-- @if (isset($email))
                    <label for="">Email:</label>
                    <div class="input-text">
                      <input type="email" name="email" value="{{$email}}" class="form-control">
                    </div>
                    @else
                    <label>Email</label>
                    <div class="input-text">
                      <input type="email" name="email" value="{{old('email')}}" class="form-control">
                    </div>
                    @endif --}}
                    <label for="">Email:</label>
                    <div class="input-text">
                      @if (Session::has('emailActive'))
                        <input type="email" name="emailActive" value="{{Session::get('emailActive')}}" class="form-control">
                      @else
                      <input type="email" name="emailActive" value="{{old('emaiActive')}}" class="form-control">
                      @endif
                    </div>
                    @if (isset($errEmail))
                      <span style="color:red">{{$errEmail}}</span>
                    @endif
                    @error('err')
                      <span style="color:red">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-xs-12">
                  <label>Mã Code</label>
                  <div class="input-text">
                    <input type="number" name="code" value="{{old('code')}}" class="form-control">
                  </div>
                  @error('code')
                    <span style="color:red">{{$message}}</span>
                  @enderror
                  @if (isset($errCode))
                    <span style="color:red">{{$errCode}}</span>
                  @endif
                </div>
                <div class="col-xs-12">
                  <button class="button"><i class="fa fa-user"></i>&nbsp; <span>Kích hoạt</span></button>
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