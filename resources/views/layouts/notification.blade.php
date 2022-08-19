@if($notification)
@foreach ($notification as $item)
@if($item->notification_status==1)
<li>
    <a href="#">
        <img src="public/upload/user/{{$item->notification_image}}" alt="">
        <h3>{{$item->notification_name}} *</h3>
        <p>{{$item->notification_content}}</p>
    </a>
</li>
@else
<li style="opacity:0.6 ;">
    <a href="#">
        <img src="public/upload/user/{{$item->notification_image}}" alt="">
        <h3>{{$item->notification_name}}</h3>
        <p>{{$item->notification_content}}</p>
    </a>
</li>
@endif
@endforeach
@else
//
@endif