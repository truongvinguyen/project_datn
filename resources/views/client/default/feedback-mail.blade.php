@extends('layouts.client-1')
@section('title')
Trang Liên Hệ
@endsection
@section('content')
<div class="main" style="margin: 10px 0;">
    <div class="container">
        <div class="policy row">
            <div class="about-page">
                <div class="col-xs-12 col-sm-12"> 
                    
                    <h3>{{$name}}</h3>
                    <p>{{$address}}</p>
                    <p>{{$email}}</p>
                    <p>{{$phone}}</p>
                    <br>
                    <p>{{$comment}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection