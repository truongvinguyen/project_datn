<ul id="nav-ul">
    @foreach($size as $item3)
      <?php
      if(Session()->get('cart')){
         if( array_key_exists($item3->id,Session::get('cart')->products)){
      ?>
        <li class="nav-item"><a onclick="setsize({{$item3->id}},{{$item3->inventory - Session()->get('cart')->products[$item3->id]['quanty'] }})" href="javascript:">{{$item3->product_size}}</a></li>
      <?php   
        }else{
      ?>
    <li class="nav-item"><a onclick="setsize({{$item3->id}},{{$item3->inventory}})" href="javascript:">{{$item3->product_size}}</a></li>
     <?php } 
     }else{
      ?>
       <li class="nav-item"><a onclick="setsize({{$item3->id}},{{$item3->inventory}})" href="javascript:">{{$item3->product_size}}</a></li>
       <?php } ?>
    @endforeach
  </ul>