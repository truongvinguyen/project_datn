@extends('layouts.client-1')

@section('title')
    Đăng nhập
@endsection

@section('content')
<style>
  /* From uiverse.io by @AqFox */
.button-logingg {
  --c: #fff;
 /* text color */
  background: linear-gradient(90deg, #0000 33%, #fff5, #0000 67%) var(--_p,100%)/300% no-repeat,
  #CF3341;
 /* background color */
  color: #0000;
  border: none;
  transform: perspective(500px) rotateY(calc(20deg*var(--_i,-1)));
  text-shadow: calc(var(--_i,-1)* 0.08em) -.01em 0   var(--c),
    calc(var(--_i,-1)*-0.08em)  .01em 2px #0004;
  outline-offset: .1em;
  transition: 0.3s;
}

.button-logingg:hover,
.button-logingg:focus-visible {
  --_p: 0%;
  --_i: 1;
}

.button-logingg:active {
  text-shadow: none;
  color: var(--c);
  box-shadow: inset 0 0 9e9q #0005;
  transition: 0s;
}

.button-logingg {
  font-size: 2rem;
  margin: 0;
  cursor: pointer;
  padding: 10px;
}
</style>
<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home text-uppercase"> <a title="Go to Home Page" href="index.html">trang chủ</a><span>&raquo;</span></li>
            <li class="text-uppercase"><strong>đăng nhập tài khoản</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  
  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="page-content container">
        <div class="account-login row">
          <div class="col-md-6" style="text-align: center;">
            <h1 class="my-5 display-3 fw-bold ls-tight">
              Thuận tiện nhanh chóng <br />
        
                  <a class="button-logingg" href="{{route('loginGG')}}"><img src="public/client/images/Google__G__Logo.png" width="35px" alt=""> Đang nhập cùng google</a>
            </h1>
            <h4>Đăng nhập và tiết kiệm thời gian!</h4>
            <p>Đăng nhập với chúng tôi để thuận tiện trong tương lai:</p>
            <p><i class="fa fa-check-circle text-primary"></i>Thanh toán nhanh chóng và dễ dàng</p>
            <p><i class="fa fa-check-circle text-primary"></i>Dễ dàng truy cập vào lịch sử và trạng thái đơn hàng của bạn</p>
          </div>
          <div class="box-authentication new-customer-box Account Page col-md-6">
            @if (isset($msgErr))
            <div class="alert alert-danger">
              <p>{{$msgErr}}</p>
            </div>
            @endif
            {{-- @if (Session::has('msg'))
            <div class="alert alert-success">
              <p>{{Session::get('msg')}}</p>
            </div>
            @endif --}}
            <form action="{{route('postLogin')}}" method="post">
              <div class="row">
                <div class="col-xs-12">
                  <div class="check-title">
                    <h4>Đăng nhập tài khoản</h4>
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
                  <label>Mật khẩu:</label>
                  <div class="input-text">
                    <input type="password" name="password" value="{{old('password')}}" class="form-control">
                  </div>
                  @error('password')
                  <span style="color:red">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-xs-12">
                  <p href="">Chưa có tài khoản ? <a href="{{ route('dang-ky') }}">Đăng ký ngay</a></p>
                  <p><a href="{{ route('getForgotPass') }}">Quên mật khẩu</a></p>
                </div>
                <div class="col-xs-12 m-2">
                  <div class="">
                    <button name="submit-dk" class="button"><i class="fa fa-user"></i>&nbsp; <span>Đăng
                        nhập</span></button>
                  </div>
                </div>
                <div class="col-xs-12 m-2" style="display: inline-flex">
                  
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

@section('js')
  {{-- <script>
    var btnGG = document.querySelector(".login-gg");
    btnGG.addEventListener("click", function(e) {
      var position = (screen.width/3)
      var popup = window.open("{{route('loginGG')}}","Login Google","width=400, height=600, top=200, left="+position);
      // $.ajax({
      //   url:"loginGGCallback",
      //   type: "get"
      //   data:{

      //   },
      //   dataType: "json",
      //   success: function(resp){
      //     console.log(resp);
      //   }
      // });
    });
  </script> --}}
@endsection