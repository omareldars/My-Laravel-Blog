@extends('layouts.app')

@section('main')
<form method="post" action="{{route('posts.store')}}" class="mt-5 container">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label><br>
        <input type="text" class="form-label" id="title" name="title" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
{{--    <div>--}}
{{--        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">--}}
{{--            <option selected>Select Creator</option>--}}
{{--            @foreach($posts ?? '' as $post)--}}
{{--            <option value="{{$post['id']}}">{{$post['posted_by']}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
    <div class="mb-3">
        <label for="post_creator" class="form-label">Post creator</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="user_id">
            <option selected>Select Creator</option>
            @foreach($users ?? '' as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div style="text-align: center" class="text-container">
        <button type="submit" class="btn btn-success mt-5">Create</button>
    </div>

</form>

@endsection
