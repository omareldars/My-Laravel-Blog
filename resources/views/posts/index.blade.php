@extends('layouts.app')
@section('main')
    <a href="{{route('posts.create')}}" class="mx-auto btn btn-success">Create Post</a>
<table class="table mt-5">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col" colspan="3">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
{{--        <td>{{$post['posted_by']}}</td>--}}
        <td>{{$post->user_id}}</td>
        <td>{{$post->created_at}}</td>
        <td class="col">
            <a href="{{route('posts.show',['post_id' => $post['id']])}}" class="btn btn-info">View</a>
            <a href="{{route('posts.edit',['post' => $post['id']])}}" class="btn btn-primary">Edit</a>
{{--            <a href="{{route('posts.show',['post_id' => $post['id']])}}" class="btn btn-danger">Delete</a>--}}
            <form class="confirmDelete d-inline-block" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm d-inline-block mx-2 px-4 text-white"></button>
            </form>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>
@endsection
