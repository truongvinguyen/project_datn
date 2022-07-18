@extends('layouts.client-1')
@section('title')
Trang Bài Viết
@endsection
@section('content')
    <section class="blog_post">
        <div class="container"> 
            <div class="row"> 
                <div class="col-xs-12 col-sm-9" id="center_column">
                    <div class="center_column">
                        <div class="page-title">
                            <h2>Bài viết</h2>
                        </div>
                        <ul class="blog-posts" id="blog-posts">
                        
                        </ul>
                        <div class="pagination-area ">
                            <ul id="pagination">
                                @for($i = 1; $i <= ceil($length/6); $i++ )
                                    <li data-offset="{{$i}}" class="{{$i == 1 ? 'active': '' }}">{{$i}}</li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ./ Center colunm --> 
                <!-- Right colunm -->
                <aside class="sidebar col-xs-12 col-sm-3"> 
                <!-- Blog category -->
                <div class="block blog-module">
                    <div class="sidebar-bar-title">
                    <h3>danh mục bài viết</h3>
                    </div>
                    <div class="block_content"> 
                    <!-- layered -->
                    <div class="layered layered-category">
                        <div class="layered-content">
                        <ul class="tree-menu">
                            @foreach($brands as $brand)
                                <li data-offset="{{$brand->id}}"><i class="fa fa-angle-right"></i>&nbsp;{{$brand->brand_name}}</li>
                            @endforeach
                        
                        </ul>
                        </div>
                    </div>
                    <!-- ./layered --> 
                    </div>
                </div>
                <!-- ./blog category  --> 
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
                                        <div class="post-meta"> <span class="date"><i class="fa fa-calendar"></i> {{$article->created_at}}</span> <span class="comment-count"> <i class="fa fa-comment-o"></i> 3 </span> </div>
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
                <div class="block blog-module">
                    <div class="sidebar-bar-title">
                        <h3>bình luận gần đây</h3>
                    </div>
                    <div class="block_content"> 
                    <!-- layered -->
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
                    <!-- ./layered --> 
                    </div>
                </div>
                <!-- ./Recent Comments --> 
                <!-- tags -->
                <div class="popular-tags-area block">
                    <div class="sidebar-bar-title">
                        <h3>thẻ được tìm kiếm nhiều</h3>
                    </div>
                    <div class="tag">
                        <ul>
                            <li><a href="#">Boys</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- ./tags --> 
                <!-- Banner -->
                <div class="single-img-add sidebar-add-slider">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>
                    
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active"> <img src="images/add-slide1.jpg" alt="slide1">
                        <div class="carousel-caption">
                            <h3><a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="info">shopping Now</a> </div>
                        </div>
                        <div class="item"> <img src="images/add-slide2.jpg" alt="slide2">
                        <div class="carousel-caption">
                            <h3><a href="single_product.html" title=" Sample Product">Geniuswatch Collection</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="info">All Collection</a> </div>
                        </div>
                        <div class="item"> <img src="images/add-slide3.jpg" alt="slide3">
                        <div class="carousel-caption">
                            <h3><a href="single_product.html" title=" Sample Product">Summer Sale</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        </div>
                    </div>
                    
                    <!-- Controls --> 
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
                </div>
                <!-- ./Banner --> 
                </aside>
                <!-- ./right colunm --> 
            </div>
        </div>
    </section>
@endsection