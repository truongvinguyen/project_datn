@extends('layouts.layout')
@section('title')
Cập nhật sản phẩm
@endsection
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Cập nhật sản phẩm </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="/product">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">Cập nhật sản phẩm</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>
<div class="pd-20 card-box mb-30">
    <form action="{{ route('products.update', ['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="clearfix">

        </div>
        <div class="clearfix">
            <div class="pull-right">
                <button type="submit" name="sunmit" class="btn btn-primary btn-sm scroll-click" rel="content-y"
                    data-toggle="collapse" role="button"><i class="icon-copy dw dw-enter"></i> Cập nhật</button>
                    
            </div>

        </div>


        <div class="row">
         
            <div class="col-md-8">

                <div class="form-group row">
                    <label class="col-sm-6 col-md-3 col-form-label">Tên sản phẩm<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input value="{{$product->product_name}}" class="form-control product_name" type="text"
                            placeholder="Nhập tên sản phẩm" name="product_name">
                        @error('product_name')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .product_name {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-12 col-form-label">Giá chưa khuyến mãi</label>
                            <div class="col-sm-12 col-md-12">
                                <input value="{{$product->product_price_sale}}" class="form-control product_price_sale"
                                    placeholder="Nhập giá trước khuyến mãi" type="text" name="product_price_sale">
                                @error('product_price_sale')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .product_price_sale {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-12 col-form-label">Giá khuyến mãi<span
                                    class="text-danger">*</span> <span style="color: red;">(giá
                                    bán)(bắt buộc)</span></label>
                            <div class="col-sm-12 col-md-12">
                                <input value="{{$product->product_price}}" class="form-control product_price"
                                    placeholder="Nhập giá sau khuyến mãi (giá bán)" type="text" name="product_price">
                                @error('product_price')
                                <div class="text-danger">{{ $message }}</div>
                                <style>
                                    .product_price {
                                        border: 1px solid red;
                                    }
                                </style>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Mô tả</label>
                    <div class="col-sm-12 col-md-12">

                        <div class="html-editor pd-20 card-box mb-30">

                            <textarea name="product_content" class="textarea_editor form-control border-radius-0"
                                placeholder="nhập mô tả sản phẩm ...">{{$product->product_content}}</textarea>
                        </div>
                    </div>
                </div>





            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Chọn danh mục<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <select class=" category_id form-control s" name="category_id"
                            style="width: 100%; height: 38px;">


                            <option value="">Chọn danh mục</option>
                            @foreach($category as $category )
                            
                            <option  value="{{$category->id}}"   {{($category->id==$product->category_id)?'selected':''}} >{{$category->category_name}}</option>
                            
                            @endforeach



                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .category_id {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Chọn thương hiệu<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <select class="brand_id form-control s" name="brand_id"
                            style="width: 100%; height: 38px;">
                            <option value="">Chọn thương hiệu</option>
                          @foreach($brand as $item)
                            <option value="{{$item->id}}" {{($item->id==$product->brand_id)?'selected':''}}>{{$item->brand_name}}</option>
                          @endforeach
                        </select>
                        @error('brand_id')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .brand_id{
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-6 col-md-12 col-form-label">Trạng thái sản phẩm<span
                            class="text-danger">*</span> @error('product_status')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .product_status {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </label>
                    <div class="col-sm-12 col-md-12">
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio1" value="1" name="product_status"
                                class="custom-control-input" {{($product->product_status==1)?'checked ':''}}>
                            <label class="custom-control-label" for="customRadio1">Hiện</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="customRadio2" value="0" name="product_status"
                                class="custom-control-input" {{($product->product_status==0)?'checked ':''}}>
                            <label class="custom-control-label" for="customRadio2">Ẩn</label>
                        </div>

                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Chọn hình ảnh sản phẩm <span
                            class="text-danger">*</span></label>
                            <img src="/upload/product/{{$product->product_image}}" width="60px" height="60px" alt="">
                    <div class="custom-file col-md-12">
                       
                        <input type="file" class="custom-file-input product_image" name="product_image">
                        <label class="custom-file-label">Choose file</label>
                       
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-12 col-md-10">
                        <h5>SEO</h5>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-12 col-form-label">Nhập tag sản phẩm <span
                            class="text-danger">*</span></label>
                    <div class="col-sm-12 col-md-12">
                        <input class="form-control product_tag" type="text" value="{{$product->product_tag}}" data-role="tagsinput"
                            width="100%" name="product_tag">
                        @error('product_tag')
                        <div class="text-danger">{{ $message }}</div>
                        <style>
                            .product_tag {
                                border: 1px solid red;
                            }
                        </style>
                        @enderror
                    </div>
                </div>

                <input type="hidden" value="{{ Auth::user()->name }}" name="product_user">
            </div>



        </div>
</div>


</form>

</div>
@endsection