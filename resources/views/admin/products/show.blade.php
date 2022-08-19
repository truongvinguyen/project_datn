@extends('layouts.layout')
@section('title')
Sản phẩm
@endsection
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Quản lý sản phẩm <a href="/add-new-product"><button type="button"
                            class="btn btn-xl btn-outline-primary"><i class="icon-copy fi-plus"></i>Thêm</button></a>
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="/product">Sản phẩm</a></li>
                    @foreach($product as $item)
                    <li class="breadcrumb-item active" aria-current="page"><a href="">{{$item->product_name}}</a></li>
                    @endforeach
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    @foreach($product as $item)
    <section class="py-4">
        <div class="row  gx-lg-5 ">
            <div class="col-md-6">
                <img class="card-img-top mb-5 mb-md-0" src="public/upload/product/{{$item->product_image}}" alt="..."
                    id="show-img" width="412px" height="412px" />
            </div>
            <div class="col-md-6">
                <h3>Thông tin sản phẩm</h3>
                <dl class="row">
                    <dt class="col-sm-6 ">Tên sản phẩm</dt>
                    <dd class="col-sm-6 ">{{$item->product_name}}.</dd>

                    <dt class="col-sm-6 ">Giá bán</dt>
                    <dd class="col-sm-6 ">
                        <p class="">{{number_format($item->product_price)}}.</p>
                    </dd>
                    <dt class="col-sm-6 ">Giá chưa khuyến mãi</dt>
                    <dd class="col-sm-6 "> <del class="">{{number_format($item->product_price_sale)}}</del></dd>

                    <dt class="col-sm-6  text-truncate">Người thêm</dt>
                    <dd class="col-sm-6 ">{{$item->product_user}}.</dd>

                    <dt class="col-sm-6  text-truncate">Trạng thái</dt>

                    @if ($item->product_status ==1)
                    <dd class="col-sm-6 ">Hiện.</dd>
                    @else
                    <dd class="col-sm-6 ">Ẩn.</dd>
                    @endif
                    <dt class="col-sm-6  text-truncate">Ngày thêm</dt>
                    <dd class="col-sm-6 ">{{$item->created_at}}.</dd>

                    <dt class="col-sm-6  text-truncate">Cập nhật lần cuối</dt>
                    @if($item->updated_at == $item->created_at)
                    <dd class="col-sm-6 ">chưa cập nhật lần nào.</dd>
                    @else
                    <dd class="col-sm-6 ">{{$item->updated_at}}.</dd>
                    @endif

                    <dt class="col-sm-4  text-truncate">TAG</dt>
                    <dd class="col-sm-8 ">{{$item->product_tag}}.</dd>




                </dl>
                <div class="row"> </div>
            </div>
        </div>
    </section>
    @endforeach
    <div class="clearfix">
        <div class="pull-right">
            <a href="/add-image-product/{{$item->id}}/for={{$item->product_name}}">
                <button type="submit" name="sunmit" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                    data-toggle="collapse" role="button"><i class="icon-copy dw dw-enter"></i>Quản lý hình
                    ảnh</button>
            </a>
        </div>
    </div>
    @foreach($product as $item)
    <section class="py-4">
        <div class="row  gx-lg-5 ">
            <div class="col-md-2">
                <img onclick="chageImg(id)" id="anhchinh" src="public/upload/product/{{$item->product_image}}" alt="">
            </div>
            @foreach($image as $item2)
            @if($item2->product_id == $item->id)
            <div class="col-md-2">
                <img onclick="chageImg({{$item2->id}})" id="{{$item2->id}}" src="public/upload/product/{{$item2->image}}"
                    alt="">
            </div>
            @endif
            @endforeach
        </div>
    </section>
    @endforeach
</div>
<div class="pd-20 card-box mb-30">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">Mô tả</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                role="tab" aria-controls="profile" aria-selected="false">Đánh giá</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                role="tab" aria-controls="contact" aria-selected="false">Contact</button>
        </li>
    </ul>
    @foreach($product as $item)
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            {!!$item->product_content!!}</div>
        @endforeach
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
</div>
@endsection