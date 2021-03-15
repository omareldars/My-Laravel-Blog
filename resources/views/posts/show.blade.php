@extends('layouts.app')


@section('main')
<div class="card">
    <div class="card-header">
        Post Info
    </div>
    <div class="card-body">
        <h5 class="card-title">Title:- {{$post->title}}</h5>
        <p class="card-text">Description:-<br>{{$post->description}}</p>
{{--        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
    </div>
</div>

{{--<div class="card">--}}
{{--    <div class="card-header">--}}
{{--        Post Creator Info--}}
{{--    </div>--}}
{{--    <div class="card-body">--}}
{{--        <h5 class="card-title">Name:- {{$user->name}}</h5>--}}
{{--        <h5 class="card-title">Email:- {{$user->email}}</h5>--}}
{{--        <p class="card-text">Created At:- {{$post->created_at}}</p>--}}
{{--        --}}{{--        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--    </div>--}}
{{--</div>--}}

@endsection

