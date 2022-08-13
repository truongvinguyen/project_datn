@extends('layouts.client-1')
@section('title')
Trang Bài Viết
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home text-uppercase"> <a title="Go to Home Page" href="index.html">trang chủ</a><span>&raquo;</span></li>
            <li class="text-uppercase"><strong>chi tiết bài viết</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container -->
  <section class="blog_post">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-9">
          <div class="entry-detail">
            <div class="page-title">
              <h1>{{$articleOne->article_title}}</h1>
            </div>
            <!-- <div class="entry-photo">
              <figure><img src="/upload/article/{{$articleOne->article_thumbnail}}" alt="Blog"></figure>
            </div> -->
            <div class="entry-meta-data"> <span class="author"> <i class="fa fa-user"></i>&nbsp; by: <a href="#">{{$articleOne->name}}</a></span> <span class="cat"> <i class="fa fa-folder"></i>&nbsp; <a href="#">{{$articleOne->brand}} </a> </span> <span class="comment-count"> <i class="fa fa-comment"></i>&nbsp; 3 </span> <span class="date"><i class="fa fa-calendar">&nbsp;</i>&nbsp;{{date('d-m-y', strtotime($articleOne->created_at))}}</span>
              <!-- <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>&nbsp; <span>(5 votes)</span></div> -->
            </div>
            <div class="content-text clearfix">
              <p class="post">{!!$articleOne->article_content!!}</p>
            </div>
            <div class="entry-tags"> <span>Thẻ:</span></a> <a href="#">{{$articleOne->slug}}</a> <a href="#">{{$articleOne->brand_name}}</a> </div>
          </div>
          <!-- Related Posts -->
          <div class="single-box">
            <div class="title_block">
              <h2>Bài đăng liên quan</h2>
            </div>
            <div class="slider-items-products">
              <div id="related-posts" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 fadeInUp">
                  @foreach($articleByCategory as $article)  
                    <div class="product-item">
                      <article class="entry">
                        <div class="entry-thumb"> <a href="/article-detail/{{$article->id}}"> <img src="/upload/article/{{$article->article_thumbnail}}" alt="Blog"> </a> </div>
                        <div class="entry-info">
                          <h3 class="entry-title"><a href="/article-detail/{{$article->id}}" style="width: 300px;">{{$article->article_title}}</a></h3>
                          <ul class="meta-post" style="display: inline-flex;list-style-type:none;font-size: 12px;">
                            <li class="day"> <a href="#">{{date('d-m-y', strtotime($article->created_at))}}/</a> </li>
                            <li class="author"> <a href="#">{{$article->name}} /</a> </li>
                            <li class="travel"> <a href="#">{{$article->brand_name}}</a> </li>
                          </ul>
                          <div class="entry-more" style="display:block"> <a href="/article-detail/{{$article->id}}">Xem thêm</a> </div>
                        </div>
                      </article>
                    </div>
                  @endforeach

                </div>
              </div>
            </div>
          </div>
          <!-- ./Related Posts --> 
          <!-- Comment -->
          <!-- <div class="single-box">
            <div class="title_block">
              <h2 class="">Bình luận</h2>
            </div>
            <div class="comment-list">
              <ul>
                <li>
                  <div class="avartar"> <img src="images/avatar.png" alt="Avatar"> </div>
                  <div class="comment-body">
                    <div class="comment-meta"> <span class="author"><a href="#">Admin</a></span> <span class="date">2015-04-01</span> </div>
                    <div class="comment"> Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="single-box comment-box">
            <div class="title_block">
              <h2>Để lại bình luận</h2>
            </div>
            <div class="coment-form">
              <p>Đảm bảo rằng bạn nhập () thông tin bắt buộc khi được chỉ định.</p>
              <div class="row">
                <div class="col-sm-6">
                  <label for="name">Tên</label>
                  <input id="name" type="text" class="form-control">
                </div>
                <div class="col-sm-6">
                  <label for="email">Email</label>
                  <input id="email" type="text" class="form-control">
                </div>
                <div class="col-sm-12">
                  <label for="website">Website URL</label>
                  <input id="website" type="text" class="form-control">
                </div>
                <div class="col-sm-12">
                  <label for="message">Nội dung</label>
                  <textarea name="message" id="message" rows="8" class="form-control"></textarea>
                </div>
              </div>
              <button class="button"><span>Đăng</span></button>
            </div>
          </div> -->
          <!-- ./Comment --> 
        </div>
        <!-- right colunm -->
        <aside class="sidebar col-xs-12 col-sm-3"> 
          <!-- Popular Posts -->
          <div class="block blog-module">
            <div class="sidebar-bar-title">
              <h3>bài viết phổ biến</h3>
            </div>
            <div class="block_content"> 
              <!-- layered -->
              <div class="layered">
                <div class="layered-content">
                  <ul class="blog-list-sidebar">
                  @foreach($articles as $article)
                    <li>
                      <div class="post-thumb"> <a href="/article-detail/{{$article->id}}"><img src="/upload/article/{{$article->article_thumbnail}}" alt="Blog"></a> </div>
                      <div class="post-info">
                        <h5 class="entry_title"><a href="/article-detail/{{$article->id}}">{{$article->article_title}}</a></h5>
                      </div>
                      <div class="post-meta" style="font-size: 11px;"> 
                        <span class="author"> <i class="fa fa-user"></i>&nbsp; Tác giả: <a href="#">{{$article->name}}</a></span> 
                        <span class="cat"> <i class="fa fa-folder"></i>&nbsp; <a href="#">{{$article->brand_name}}</a> </span> 
                        <!-- <span class="comment-count"> <i class="fa fa-comment"></i>&nbsp; 3 </span>  -->
                        <span class="date"><i class="fa fa-calendar"></i>&nbsp;{{date('d-m-y', strtotime($article->created_at))}}</span> 
                      </div>
                      </div>
                    </li>
                  @endforeach
                  </ul>
                </div>
              </div>
              <!-- ./layered --> 
            </div>
          </div>
          <!-- ./Popular Posts --> 
          
          <!-- Recent Comments -->


          <!-- <div class="block blog-module">
            <div class="sidebar-bar-title">
              <h3>bình luận gần đây</h3>
            </div>
            <div class="block_content"> 
              <div class="layered">
                <div class="layered-content">
                  <ul class="recent-comment-list">

                    <li>
                      <h5><a href="#">Lorem ipsum dolor sit amet</a></h5>
                      <div class="comment"> "Consectetuer adipis. Mauris accumsan nulla vel diam. Sed in..." </div>
                      <div class="author">Được đăng bởi <a href="#">Admin</a></div>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
          </div> -->


          <!-- ./Recent Comments --> 
          <!-- tags -->
          <!-- <div class="popular-tags-area block">
            <div class="sidebar-bar-title">
              <h3>thẻ được tìm kiếm nhiều</h3>
            </div>
            <div class="tag">
              <ul>
                <li><a href="#">Boys</a></li>
              </ul>
            </div>
          </div> -->
          
          <!-- ./tags --> 
          <!-- Banner -->
          <div class="single-img-add sidebar-add-slider">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              </ol>
              
              <!-- Wrapper for slides -->


              <!-- <div class="carousel-inner" role="listbox">
                <div class="item active"> <img src="images/add-slide1.jpg" alt="slide1">
                  <div class="carousel-caption">
                    <h3><a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">shopping Now</a> </div>
                </div>
                <div class="item"> <img src="client/images/add-slide2.jpg" alt="slide2">
                  <div class="carousel-caption">
                    <h3><a href="single_product.html" title=" Sample Product">Geniuswatch Collection</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">All Collection</a> </div>
                </div>
              </div> -->
              
              <!-- Controls --> 
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
          </div>
          <!-- ./Banner --> 
        </aside>
        <!-- ./right colunm --> 
      </div>
    </div>
  </section>
  <!-- Main Container End --> 
  <!-- our clients Slider -->
  <div class="container"> 
    <div class="jtv-service-area">
      <div class="row">
        <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
          <div class="block-wrapper ship">
            <div class="text-des"> <i class="icon-rocket"></i>
              <h3>miễn phí vận chuyển</h3>
              <p>cho hóa đơn ₫500.000 trở lên</p>
            </div>
          </div>
        </div>
        <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
          <div class="block-wrapper return">
            <div class="text-des"> <i class="fa fa-dollar"></i>
              <h3>hoàn tiền nếu lỗi từ sản phẩm</h3>
              <p>quay video khi mở hàng</p>
            </div>
          </div>
        </div>
        <div class="col col-md-4 col-sm-4 col-xs-12 no-padding">
          <div class="block-wrapper support">
            <div class="text-des"> <i class="fa fa-headphones"></i>
              <h3>hỗ trợ trực tuyến</h3>
              <p>vào giờ hành chính (thứ 2 - thứ 6)</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- our clients Slider -->
  

@endsection