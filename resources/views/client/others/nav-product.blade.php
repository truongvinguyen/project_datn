@foreach($nav as $n)
    <li> <a href="/product-grid/{{$n->id}}">{{$n->category_name}}</a></li>
@endforeach