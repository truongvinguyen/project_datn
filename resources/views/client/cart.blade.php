@if(Session::has('cart') != null)
<div class="header-cart-content flex-w js-pscroll">
	<ul class="header-cart-wrapitem w-full text-capitalize">
		@foreach(Session::get('cart')->products as $item)
		<li class="header-cart-item flex-w flex-t m-b-12">
			<div class="header-cart-item-img delete_cart" data-id="{{$item['productInfo']->id}}">
				<img src="/upload/product/{{$item['productInfo']->product_image}}" alt="IMG">
			</div>

			<div class="header-cart-item-txt p-t-8">
				<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
					{{$item['productInfo']->product_name}}
				</a>

				<span class="header-cart-item-info">
					{{number_format($item['productInfo']->price)}} x {{$item['quanty']}} size
					{{$item['productInfo']->product_size}}
				</span>
				<button onclick="deleteCart({{$item['productInfo']->id}})">Xóa</button>
			</div>
		</li>
		@endforeach
	</ul>
	<div class="w-full">
		<div class="header-cart-total w-full p-tb-40 text-capitalize">
			tổng cộng:{{number_format(Session::get('cart')->totalPrice)}} VNĐ
		</div>
		<div class="header-cart-total w-full p-tb-40 text-capitalize">
			tổng cộng:{{number_format(Session::get('cart')->totalQty)}}
		</div>

		<div class="header-cart-buttons flex-w w-full">
			<a href="shoping-cart.html"
				class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
				vào giỏ hàng
			</a>

			<a href="shoping-cart.html"
				class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
				thanh toán
			</a>
		</div>
	</div>
</div>
@else
<span>giỏ hàng của bạn đang trống</span>
@endif