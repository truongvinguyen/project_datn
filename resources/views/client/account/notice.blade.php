@extends('layouts.client-1')

@section('content')
    @if(isset($msg))

        <div class="alert alert-success" style="height: 50vh; vertical-align: middle">
            <h3 class="text-center">{{$msg}}</h3>
        </div>
    @endif
@endsection