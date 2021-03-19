@extends('layouts.app')
@section('main')
<div style="text-align: center" class="text-container">
<a href="{{route('posts.create')}}" class="btn btn-success mt-5">Create Post</a>

    <table class="table mt-5 container">
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
        <td>{{$post->user_id ? $post->user->name: 'User doesn\'t Exist'}}</td>
        <td>{{$post->created_at_formated}}</td>
        <td class="col">
            <a href="{{route('posts.show',['post_id' => $post['id']])}}" class="btn btn-info">View</a>
            <a href="{{route('posts.edit',['post' => $post['id']])}}" class="btn btn-primary">Edit</a>
{{--            <form class="confirmEdit d-inline-block" action="{{route('posts.edit',['post' => $post->id])}}" method="POST">--}}
{{--                <a href="" class="btn btn-primary">Edit</a>    --}}
{{--                @csrf--}}
{{--                @method('EDIT')--}}
{{--                <button type="submit" class="btn btn-primary btn-sm d-inline-block mx-3 px-4 text-white">Edit</button>--}}
{{--            </form>--}}

{{--            <a href="{{route('posts.show',['post_id' => $post['id']])}}" class="btn btn-danger">Delete</a>--}}
            <form class="confirmDelete d-inline-block" action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete Post?')" title="delete" class="btn btn-danger btn-sm d-inline-block  text-white">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
<div style="text-align: center" class="text-container">
    {!!$posts->links()!!}
</div>


@endsection
