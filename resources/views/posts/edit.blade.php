@extends('layouts.app')
{{--@dd($post)--}}
@section('content')
    <form method="post" action="{{ route('posts.update', ['post'=>$post]) }}">
{{--        //action="{{route('posts.update')}}"--}}
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea rows="3" class="form-control" name="description" value="{{$post->description}}">{{$post->description}}</textarea>
        </div>
        {{--    <div>--}}
        {{--        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">--}}
        {{--            <option selected>Select Creator</option>--}}
        {{--            @foreach($posts ?? '' as $post)--}}
        {{--            <option value="{{$post['id']}}">{{$post['posted_by']}}</option>--}}
        {{--            @endforeach--}}
        {{--        </select>--}}
        {{--    </div>--}}
        <div>
            <label for="post_creator" class="form-label">Post creator</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="user_id">
                @foreach($users ?? '' as $user)
                    <option value="{{$user->id}}" @if($post->user_id == $user->id) aria-selected=""  @endif>{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success"><i data-feather="edit-3" class="mr-3"></i>Edit</button>
    </form>

@endsection
