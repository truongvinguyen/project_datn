@extends('layouts.client-1')
@section('title')
Trang Liên Hệ
@endsection
@section('content')
<section class="main-container col1-layout">
    <div class="main container">
  
      <div class="row">
        @if(Session::has('success'))
          <div id="dislike" class="bg-success">
                <h4 class="text-light m-auto">{{Session::get('success')}}</h4>
            </div>
          </div>
        @endif
        <section class="col-main col-sm-12">
          
          <div id="contact" class="page-content page-contact">
            <div class="row">
              <div class="col-xs-12 col-sm-7" id="contact_form_map">
                <h3 class="page-subheading">liên hệ chúng tôi</h3>
                <p>Mọi thắt mắc vui lòng gởi mail về cho chúng tôi. Chúng tôi sẽ liên hệ cho Quý Khách sớm nhất có thể</p>
                <ul class="store_info">
                  <li><i class="fa fa-home"></i>QTSC, Innovation lô 24, Quang Trung, Q12, Tp.HCM</li>
                  <li><i class="fa fa-phone"></i><span>(028) 6252 3434</span></li>
                  <!-- <li><i class="fa fa-fax"></i><span>+39 0035 356 765</span></li> -->
                  <li><i class="fa fa-envelope"></i>Email:  caodang@fpt.edu.vn<span><a href="https://htmlgenius.justthemevalley.com/cdn-cgi/l/email-protection#a9dadcd9d9c6dbdde9c3dcdaddddc1ccc4cc87cac6c4"><span class="__cf_email__" data-cfemail="bccfc9ccccd3cec8fcd6c9cfc8c8d4d9d1d9caddd0d0d9c592dfd3d1"></span></a></span></li>
                  <li><i class="fa fa-map"></i><span>Bản đồ:</span></li>
                </ul>
                <div id="map" style="width:500px;height:500px;">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.455157251163!2d106.62735611428762!3d10.852944360745598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752945d2a9971b%3A0x93c222131170b3f5!2sInnovation%20Building!5e0!3m2!1sen!2s!4v1658778064976!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>

              <div class="col-sm-5">
                <h3 class="page-subheading">Liên lạc</h3>
                <div class="contact-form-box">
                  <form action="/feedback" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-selector"> 
                      <label>Họ và tên</label>
                      <input type="text"  value="{{old('name')}}" class="form-control input-sm" id="name" name="name"/>
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-selector">
                      <label>Email</label>
                      <input type="text"  value="{{old('email')}}" class="form-control input-sm" id="email" name="email"/>
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-selector">
                      <label>Điện thoại</label>
                      <input type="text" value="{{old('phone')}}" class="form-control input-sm" id="phone" name="phone"/>
                      @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-selector">
                      <label>Nội dung</label>
                      <textarea class="form-control input-sm" value="{{old('comment')}}" rows="30" id="comment" name="comment"></textarea>
                      @error('comment')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-selector">
                      <button class="button"><i class="fa fa-send"></i>&nbsp; <span>Gởi</span></button>
                    </div>
                  </form>

                  <!-- <form method="post" enctype="multipart/form-data">
                    <input type="hidden" value="{{csrf_token()}}" class="token_saveall">
                    <div class="form-selector"> 
                      <label>Họ và tên</label>
                      <input type="text" value="{{old('name')}}" class="form-control input-sm" id="name" name="name"/>
                   
                    </div>
                    <div class="form-selector">
                      <label>Email</label>
                      <input type="text"  value="{{old('email')}}" class="form-control input-sm" id="email" name="email"/>
                    
                    </div>
                    <div class="form-selector">
                      <label>Điện thoại</label>
                      <input type="text" value="{{old('phone')}}" class="form-control input-sm" id="phone" name="phone"/>
                  
                    </div>
                    <div class="form-selector">
                      <label>Nội dung</label>
                      <textarea class="form-control input-sm" value="{{old('comment')}}" rows="30" id="comment" name="comment"></textarea>
              
                    </div>
                    <div class="form-selector">
                      <button type="button" onclick="contact()" class="button"><i class="fa fa-send"></i>&nbsp; <span>Gởi</span></button>
                    </div>
                  </form> -->
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    
  </section>
@endsection