@foreach($articles as $article)
    <li style="border-bottom: 1px solid #c1c1c1; margin-bottom: 20px;">
        <div class="post-thumb"> 
            <a href="/article-detail/{{$article->id}}">
                <img src="/upload/article/{{$article->article_thumbnail}}" alt="Blog">
            </a> 
        </div>
        <div class="post-info">
            <p class="entry_title"><a href="/article-detail/{{$article->id}}">{{$article->article_title}}</a></p>
        </div>
        <div class="post-meta" style="font-size: 13px;"> 
            <span class="author"> <i class="fa fa-user"></i>&nbsp;{{$article->name}}</span> 
            <span class="cat"> <i class="fa fa-folder"></i>&nbsp;{{$article->brand_name}}</span> 
            <span class="date"><i class="fa fa-calendar"></i>&nbsp;{{date('d-m-y', strtotime($article->created_at))}}</span> 
        </div>
    </li>
@endforeach