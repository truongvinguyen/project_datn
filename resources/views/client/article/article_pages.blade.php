@foreach($artByBrand as $article)
    <li class="post-item">
        <article class="entry">
            <div class="row">
                <div class="col-sm-5">
                    <div class="entry-thumb"> <a href="single_post.html"><figure><img src="public/upload/article/{{$article->article_thumbnail}}" alt="Blog"></figure></a> </div>
                </div>
                <div class="col-sm-7">
                    <h3 class="entry-title"><a href="/article-detail/{{$article->id}}">{{$article->article_title}}</a></h3>
                    <div class="entry-meta-data"> 
                        <span class="author"> <i class="fa fa-user"></i>&nbsp; Tác giả: <a href="#">{{$article->name}}</a></span> 
                        <span class="cat"> <i class="fa fa-folder"></i>&nbsp; <a href="#" onclick="artByBrand({{$article->brand_id}})">{{$article->brand_name}}</a> </span> 
                        <!-- <span class="comment-count"> <i class="fa fa-comment"></i>&nbsp; 3 </span>  -->
                        <span class="date"><i class="fa fa-calendar"></i>&nbsp;{{date('d-m-y', strtotime($article->created_at))}}</span> 
                    </div>
                    <div class="entry-excerpt">{!! substr( $article->article_content, 0, 300 )!!} ...<a href="/article-detail/{{$article->id}}">  Xem thêm</a></div>
                </div>
            </div>
        </article>
    </li>
@endforeach