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
          <form>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="check-title">
                      <h4>Quên mật khẩu</h4>
                    </div>
                    <div id="alert">

                    </div>
                  </div>
                  <div class="col-xs-12">
                    <label>Email:</label>
                    <div class="input-text" style="display: flex;">
                      <input type="text" name="email" value="{{old('email')}}" class="form-control">
                      <button class="button" name="getCode" style="margin-top:0px">Lấy mã bảo mật</button>
                    </div>
                    @error('email')
                      <span style="color:red">{{$message}}</span>
                   @enderror
                   <p id="emailErr" class="text-danger"></p>
                  </div>
                  <div id="forgot-bottom" style="display: none;">
                    <div class="col-xs-12">
                      <label>Mã bảo mật:</label>
                      <div class="input-text">
                        <input type="number" name="code" value="{{old('code')}}" class="form-control">
                      </div>
                     <p id="codeErr" class="text-danger"></p>
                    </div>
                    <div class="col-xs-12">
                      <label>Mật khẩu:</label>
                      <div class="input-text">
                        <input type="password" name="password" value="{{old('password')}}" class="form-control">
                      </div>
                     <p id="passErr" class="text-danger"></p>
                    </div>
                    <div class="col-xs-12">
                      <label>Xác thực mật khẩu:</label>
                      <div class="input-text">
                        <input type="password" name="cf_password" value="{{old('cf_password')}}" class="form-control">
                      </div>
                     <p id="cfpassErr" class="text-danger"></p>
                    </div>
                    <div class="col-xs-12 m-2">
                      <div class="">
                        <button type="button" name="submit" class="button"><i class="fa fa-user"></i>&nbsp; <span>Đồng ý</span></button>
                      </div>
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

@section('js')
<script>
  $(document).ready(function(){
    $('button[name=getCode]').on('click', function(e){
      e.preventDefault();
      const validateEmail = (email) => {
      return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      )};
      let email = $('input[name=email]').val();
      if(!validateEmail(email)){
        $("#emailErr").text('Vui lòng kiểm tra lại email.');
      }else{
        $("#emailErr").text('');
        $.ajax({
          type: "POST",
          url: "{{route('postGetCodeForgotPass')}}",
          data:{
            email: email,
            _token: $("input[name='_token']").val()
          },
          dataType: "json",
          success: function(resp){
            console.log(resp);
            if(resp['codeErr']==0){
              $('#alert').removeClass('alert alert-danger');
              $('#alert').addClass('alert alert-success').text('Mã xác thực đã được gửi về email.');
              $('#forgot-bottom').css('display', 'block');
            }else{
              let msg = resp['msg']
              $('#alert').addClass('alert alert-danger').text(msg);
              $('#forgot-bottom').css('display', 'none');
            }
          },
          err: function(data){
            // var error = data.responseJSON;
            // console.log(error);
          }
        });
      }
    }); 
    $('button[name=submit]').click(function(e){
      e.preventDefault();
      let email = $("input[name=email]").val();
      let code = $("input[name=code]").val();
      let password = $("input[name=password]").val();
      let cfPass = $("input[name=cf_password]").val();
      const validateEmail = (email) => {
      return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      )};
      let isValid = true;
      if(!validateEmail(email) || (email.length <=8 || email.length >=255)){
        $('#emailErr').text('Email không hợp lệ.');
        isValid = false;
      }
      if(code.length == 0 || code.length >= 7){
        $('#codeErr').text('Vui lòng kiểm tra lại mã xác thực.');
        isValid = false;
      }
      if(password.length == 0 || password.length >= 255){
        $('#passErr').text('Vui lòng kiểm tra lại mật khẩu');
        isValid = false;
      }
      if(cfPass.length == 0 || cfPass.length >= 255){
        $('#cfpassErr').text('Vui lòng kiểm tra lại xác thực mật khẩu');
        isValid = false;
      }
      if (cfPass != password){
        $('#cfpassErr').text('Xác thực mật khẩu phải giống mật khẩu.');
        isValid = false;
      }
      if(isValid){
        $.ajax({
        type: "POST",
        url : "{{route('postForgotPass')}}",
        data: {
          email: $("input[name=email]").val(),
          _token: $("input[name='_token']").val()
        },
        dataType: 'json',
        success: function(resp){
          console.log(typeof(resp));
          for (const key in resp) {
            if (Object.hasOwnProperty.call(resp, key)) {
              let element = resp[key];
              $("#msgErr").text(element);
            }else{
              $("#msgErr").text("");
            }
          }
        },
        err: function(err){
          console.log(err);
          $("#msgErr").text(err.err[0]);
        }
      });
      }
    })
  });
</script>
@endsection