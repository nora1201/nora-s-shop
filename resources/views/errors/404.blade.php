@extends('layouts.error')
@section('content')
    <div class="title">
        {{$exception->getMessage()}}
        <br>
        <br>
        Back to Login Page <a href="{{url('/login')}}"><i class="fa fa-arrow-alt-circle-right"></i></a>
    </div>
@endsection
