@extends('layouts.client-1')
@section('title')
Trang Về Chúng Tôi
@endsection
@section('content')
<div class="main container">
 <div class="row">
     <div class="about-page">
        <div class="col-xs-12 col-sm-6"> 
          
          <h1>Chào mừng bạn đến với <span class="text_color">Trendy fashion</span></h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacus metus, convallis ut leo nec, tincidunt eleifend justo. Ut felis orci, hendrerit a pulvinar et, gravida ac lorem. Sed vitae molestie sapien, at sollicitudin tortor.<br>
            <br>
            Duis id volutpat libero, id vestibulum purus.Donec euismod accumsan felis, <a href="#">egestas lobortis velit tempor</a> vitae. Integer eget velit fermentum, dignissim odio non, bibendum velit.</p>
          <ul>
            <li><i class="fa fa-arrow-right"></i>&nbsp; <a href="#">Suspendisse potenti. Morbi mollis tellus ac sapien.</a></li>
            <li><i class="fa fa-arrow-right"></i>&nbsp; <a href="#">Cras id dui. Nam ipsum risus, rutrum vitae, vestibulum eu.</a></li>
            <li><i class="fa fa-arrow-right"></i>&nbsp; <a href="#">Phasellus accumsan cursus velit. Pellentesque egestas.</a></li>
            <li><i class="fa fa-arrow-right"></i>&nbsp; <a href="#">Lorem Ipsum generators on the Internet tend to repeat predefined.</a></li>
          </ul>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="single-img-add sidebar-add-slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
              
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active"> <img src="client/images/jenni.jpg" alt="slide1"> </div>
                <div class="item"> <img src="client/images/jisoo.jpg" alt="slide2"> </div>
                <!-- <div class="item"> <img src="client/images/rose.jpg" alt="slide3"> </div> -->
              </div>
            </div>
          </div>
        </div>
      </div></div>

  </div>
  
  <div class="our-team"> 

    
   
      
    <div class="container"> <div class="page-header">
        <h2>Đội ngũ của chúng tôi</h2>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
          <div class="wow bounceInUp" data-wow-delay="0.2s">
            <div class="team">
              <div class="inner">
                <div class="avatar"><img src="client/images/team-img01.jpg" alt="" class="img-responsive" /></div>
                <h5>Joana Doe</h5>
                <p class="subtitle">Art-director</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
          <div class="wow bounceInUp" data-wow-delay="0.5s">
            <div class="team">
              <div class="inner">
                <div class="avatar"><img src="client/images/team-img02.jpg" alt="" class="img-responsive" /></div>
                <h5>Josefine</h5>
                <p class="subtitle">Team Leader</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
          <div class="wow bounceInUp" data-wow-delay="0.8s">
            <div class="team">
              <div class="inner">
                <div class="avatar"><img src="client/images/team-img03.jpg" alt="" class="img-responsive" /></div>
                <h5>Paulo Moreira</h5>
                <p class="subtitle">Senior Web Developer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3">
          <div class="wow bounceInUp" data-wow-delay="1s">
            <div class="team">
              <div class="inner">
                <div class="avatar"><img src="client/images/team-img04.jpg" alt="" class="img-responsive" /></div>
                <h5>Tom Joana</h5>
                <p class="subtitle">Digital Creative Director</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  

   <!-- our clients Slider -->
  
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
  </div>
@endsection