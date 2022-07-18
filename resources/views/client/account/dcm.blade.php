@extends('layouts.client-1')

@section('title')
    Xác thực
@endsection

@section('content')
  <p>{{Session::get('userId');}}</p>
  <p>{{Session::get('userEmail');}}</p>
  <p>{{Session::get('userFullname');}}</p>
  <p>{{Session::get('userImage');}}</p>
  <p>{{Session::get('userPhone');}}</p>
  <p>{{Session::get('userAddress');}}</p>
@endsection