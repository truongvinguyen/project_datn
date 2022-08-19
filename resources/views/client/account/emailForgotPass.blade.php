@extends('layouts.client-1')

@section('title')
    Quên mật khẩu
@endsection

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                  <div id="form">
                    <div class="col-xs-12">
                      <label>Email:</label>
                      <div class="input-text" style="display: flex;">
                        <input type="text" name="email" value="{{old('email')}}" class="form-control">
                        <button type="button" class="button btn" name="getCode" style="margin-top:0px">Lấy mã bảo mật <span id="countDown" style="display: none">60</span> </button>
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
                          <button type="button" name="submit" class="button btn"><i class="fa fa-user"></i>&nbsp; <span>Đồng ý</span></button>
                        </div>
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
  

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>
  jQuery(document).ready(function(){
    jQuery('button[name=getCode]').on('click', function(e){
      e.preventDefault();
      const validateEmail = (email) => {
      return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      )};
      let email = $('input[name=email]').val();
      if(!validateEmail(email)){
        jQuery("#emailErr").text('Vui lòng kiểm tra lại email.');
      }else{
        jQuery("#emailErr").text('');
        jQuery.ajax({
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
              jQuery('#alert').removeClass('alert alert-danger');
              jQuery('#alert').addClass('alert alert-success').text('Mã xác thực đã được gửi về email.');
              jQuery('#forgot-bottom').css('display', 'block');
              $("button[name=getCode]").attr('disabled',true);
              let time = 60;
              interval = setInterval(function(timeout){
                  $("#countDown").css('display', 'inline');
                  $("#countDown").text(time);
                  time--;
                }, 1000);
              setTimeout(() => {
                clearInterval(interval);
                $('#countDown').css('display', 'none');
                $("button[name=getCode]").attr('disabled',false);
              }, 60000);
            }else{
              let msg = resp['msg']
              jQuery('#alert').addClass('alert alert-danger').text(msg);
              jQuery('#forgot-bottom').css('display', 'none');
            }
          },
          err: function(data){
            // var error = data.responseJSON;
            // console.log(error);
          }
        });
      }
    }); 
    jQuery('button[name=submit]').click(function(e){
      e.preventDefault();
      let email = jQuery("input[name=email]").val();
      let code = jQuery("input[name=code]").val();
      let password = jQuery("input[name=password]").val();
      let cfPass = jQuery("input[name=cf_password]").val();
      const validateEmail = (email) => {
      return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
      )};
      let isValid = true;
      if(!validateEmail(email) || (email.length <=8 || email.length >=255)){
        jQuery('#emailErr').text('Email không hợp lệ.');
        isValid = false;
      }
      if(code.length == 0 || code.length >= 7){
        jQuery('#codeErr').text('Vui lòng kiểm tra lại mã xác thực.');
        isValid = false;
      }
      if(password.length == 0 || password.length >= 255){
        jQuery('#passErr').text('Vui lòng kiểm tra lại mật khẩu');
        isValid = false;
      }
      if(cfPass.length == 0 || cfPass.length >= 255){
        jQuery('#cfpassErr').text('Vui lòng kiểm tra lại xác thực mật khẩu');
        isValid = false;
      }
      if (cfPass != password){
        jQuery('#cfpassErr').text('Xác thực mật khẩu phải giống mật khẩu.');
        isValid = false;
      }
      if(isValid){

        jQuery.ajax({
        type: "POST",
        url : "{{route('postForgotPass')}}",
        data: {
          email: email,
          code: code,
          password:  password,
          _token: $("input[name='_token']").val()
        },
        dataType: 'json',
        success: function(resp){
          console.log((resp));
          if (resp['codeErr'] == 0){
            jQuery('#alert').removeClass('alert alert-danger');
            $('#form').css('display', 'none');
            jQuery('#alert').addClass('alert alert-success').text('Cập nhật mật khẩu thành công.');
          }else{
            let msg = resp['msg'];
            jQuery('#alert').removeClass('alert alert-success');
            jQuery('#alert').addClass('alert alert-danger').text(msg);
          }
        },
        err: function(err){
          console.log(err);
          jQuery("#msgErr").text(err.err[0]);
        }
      });
      }
    })
  });
</script>
@endsection


