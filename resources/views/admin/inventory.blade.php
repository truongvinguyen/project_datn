@extends('layouts.layout')
@section('title')
Sản phẩm tồn kho
@endsection
@section('content')
<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Chi tiết tồn kho
                    <button class="btn btn-xl btn-outline-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="icon-copy fi-plus"></i>
                        Thêm
                        kích
                        thước
                    </button>
                </h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a href="/product">Sản phẩm</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/product">quản lý tồn kho</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 col-sm-12 text-right">

        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="" style="font-size:20px ;">Chi tiết tồn kho thuộc ( <?php echo str_replace("-"," ",$product_name); ?> )</h4>
    </div>
    <div class="pd-20">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:170px;" class="text-center" scope="col" class="table-plus datatable-nosort">stt
                        </th>
                        <th style="width:170px;" class="text-center" scope="col">Kích Thước</th>
                        <th style="width:170px;" class="text-center" scope="col">Giá nhập</th>
                        <th style="width:170px;" class="text-center" scope="col">Giá bán</th>
                        <th style="width:170px;" class="text-center" scope="col">Tồn kho</th>
                        <th style="width:170px;" class="text-center" scope="col">Đã bán</th>
                        <th style="width:170px;" class="text-right" class="datatable-nosort">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody id="show-inventory">
                    @foreach($data as $item)
                    <tr data-bs-toggle="collapse" data-bs-target="#collapseExample{{$item->id}}" aria-expanded="false"
                        aria-controls="collapseExample{{$item->id}}">
                        <td style="width:170px;" class="text-center">{{$loop->index}}</td>
                        <td style="width:170px;" class="text-center">{{$item->product_size}}</td>
                        <td style="width:170px;" class="text-center">{{number_format( $item->import_price)}}</td>
                        <td style="width:170px;" class="text-center">{{number_format( $item->price)}}</td>
                        <td style="width:170px;" class="text-center">{{$item->inventory}}</td>
                        <td style="width:170px;" class="text-center">{{$item->sold}}</td>
                        <td style="width:170px;" class="text-right">

                            <a data-bs-toggle="collapse" data-bs-target="#collapseExample{{$item->id}}"
                                aria-expanded="false" aria-controls="collapseExample{{$item->id}}" data-color="#265ed7"
                                style="color: rgb(38, 94, 215);"><i class="icon-copy dw dw-edit2"></i></a>
                            <a data-toggle="modal" data-target="#confirmation-modal{{$item->id}}" href="#"
                                data-color="#e95959" style="color: rgb(233, 89, 89);"><i
                                    class="icon-copy dw dw-delete-3"></i></a>

                        </td>
                    </tr>
<!-- cập nhật thuộc tính sản phẩm -->
                    <tr class="collapse table" id="collapseExample{{$item->id}}">
                        <form action="/update-inventory/{{$item->id}}" id="create" method="post">
                            @csrf

                            <td style="width:170px;" class="text-center"><i class="icon-copy fa fa-openid"
                                    style="font-size: 30px;color: blue;" aria-hidden="true"></i></td>
                            <td class="text-center" style="width:170px;">
                                <select class="form-control" name="size" id="product_size">
                                    <option value="S" {{($item->product_size=="S")?'selected':''}}>S</option>
                                    <option value="M" {{($item->product_size=="M")?'selected':''}}>M</option>
                                    <option value="L" {{($item->product_size=="L")?'selected':''}}>L</option>
                                    <option value="XL" {{($item->product_size=="XL")?'selected':''}}>XL</option>
                                    <option value="XXL" {{($item->product_size=="XXL")?'selected':''}}>XXL</option>
                                </select>

                            </td>
                            <td class="text-center" style="width:170px;"><input type="text" name="import_price"
                                    id="import_price" class="form-control" value="{{ $item->import_price}}"></td>
                            @error('import_price')
                            <div class="text-danger">{{ $message }}</div>
                            <style>
                                #import_price {
                                    border: 1px solid red;
                                }
                            </style>
                            @enderror
                            <td class="text-center" style="width:170px;"><input type="text" name="price" id="price"
                                    class="form-control" value="{{$item->price}}"></td>
                            <td class="text-center" style="width:170px;"><input class="form-control" name="inventory"
                                    id="inventory" type="number" value="{{$item->inventory}}"></td>
                            <td class="text-center" style="width:170px;"><input class="form-control" name="sold"
                                    id="sold" type="number" value="{{$item->sold}}">
                            </td>
                            <input type="hidden" id="product_id" name="product_id" value="{{$product_id}}">
                            <td style="width:170px;" class=" text-right">
                                <input type="submit" name="submit" class="btn btn-primary" value="Lưu lại">
                            </td>
                        </form>
                    </tr>

                    @endforeach

                </tbody>
            </table>
<!-- Thêm thuộc tính sản phẩm -->
            <table class="table">
                <tr class="collapse" id="collapseExample"
                    style="height:150px;margin-top: 50px;background-color: white;">
                    <form action="/add-new-inventory" id="create" method="post">
                        @csrf
                        <td class="text-center">Thêm</td>
                        <td class="text-center">
                            <select class="form-control" name="size" id="product_size">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </td>
                        <td class="text-center" style="width:200px;"><input type="text" name="import_price"
                                id="import_price" class="form-control" value=""></td>
                        <td class="text-center" style="width:200px;"><input type="text" name="price" id="price"
                                class="form-control" value="{{$price->product_price}}"></td>
                        <td class="text-center" style="width: 170px;"><input class="form-control" name="inventory" id="inventory" type="number"></td>
                        <td class="text-center" style="width: 170px;"><input class="form-control" name="sold" id="sold"
                                type="number" value="0">
                        </td>
                        <input type="hidden" id="product_id" name="product_id" value="{{$product_id}}">
                        <td class=" text-right">
                            <input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
                        </td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
</div>
@foreach($data as $item)
<div class="modal fade" id="confirmation-modal{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">Xin hãy hạn chế xóa dữ liệu</h4>
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal"><i class="fa fa-times"></i></button>
                            Hủy
                        </div>
                        <div class="col-6">
                            <a href="/delete-inventory/{{$item->id}}" type="button"
                                class="delete-image btn btn-primary border-radius-100 btn-block confirmation-btn"><i
                                    class="fa fa-check"></i></a>
                            Xóa
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endforeach


@endsection