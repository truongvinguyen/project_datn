@extends('layouts.client-1')
@section('title')
Trang Liên Hệ
@endsection
@section('content')
<section class="main-container col1-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-12">
          
          <div id="contact" class="page-content page-contact">
            <!-- <div id="message-box-conact">We're available for new projects</div> -->
            <div class="row">
              <div class="col-xs-12 col-sm-6" id="contact_form_map">
                <h3 class="page-subheading">liên hệ chúng tôi</h3>
                <p>Mọi thắt mắc vui lòng gởi mail về cho chúng tôi. Chúng tôi sẽ liên hệ cho Quý Khách sớm nhất có thể</p>
                <br/>
                <!-- <ul>
                  <li>Praesent nec tincidunt turpis.</li>
                  <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                  <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                </ul> -->
                <br/>
                <ul class="store_info">
                  <li><i class="fa fa-home"></i>QTSC, Innovation lô 24, Quang Trung, Q12, Tp.HCM</li>
                  <li><i class="fa fa-phone"></i><span>(028) 6252 3434</span></li>
                  <!-- <li><i class="fa fa-fax"></i><span>+39 0035 356 765</span></li> -->
                  <li><i class="fa fa-envelope"></i>Email:  caodang@fpt.edu.vn<span><a href="https://htmlgenius.justthemevalley.com/cdn-cgi/l/email-protection#a9dadcd9d9c6dbdde9c3dcdaddddc1ccc4cc87cac6c4"><span class="__cf_email__" data-cfemail="bccfc9ccccd3cec8fcd6c9cfc8c8d4d9d1d9caddd0d0d9c592dfd3d1"></span></a></span></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <h3 class="page-subheading">Liên lạc</h3>
                <div class="contact-form-box">
                  <div class="form-selector">
                    <label>Họ và tên</label>
                    <input type="text" class="form-control input-sm" id="name" />
                  </div>
                  <div class="form-selector">
                    <label>Email</label>
                    <input type="text" class="form-control input-sm" id="email" />
                  </div>
                  <div class="form-selector">
                    <label>Điện thoại</label>
                    <input type="text" class="form-control input-sm" id="phone" />
                  </div>
                  <div class="form-selector">
                    <label>Nội dung</label>
                    <textarea class="form-control input-sm" rows="10" id="message"></textarea>
                  </div>
                  <div class="form-selector">
                    <button class="button"><i class="fa fa-send"></i>&nbsp; <span>Gởi</span></button>
                    &nbsp; <a href="#" class="button">Xóa</a> </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="container">
      <div class="slider-items-products">
        <div id="our-clients-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col6"> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="client/images/brand1.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="client/images/brand2.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="client/images/brand3.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
            <!-- Item -->
            <div class="item"> <a href="#"><img src="client/images/brand4.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="client/images/brand5.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="client/images/brand6.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            <!-- Item -->
            <div class="item"> <a href="#"><img src="client/images/brand7.png" alt="Image" class="grayscale"></a> </div>
            <!-- End Item --> 
            
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection