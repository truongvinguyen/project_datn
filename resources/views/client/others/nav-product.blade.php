<li><a href="/all-product">Tất cả sản phẩm</a></li>
@foreach($nav as $n)
    <li> <a href="/product-grid/category_id/{{$n->id}}" >{{$n->category_name}}</a></li>
@endforeach