<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
//        $posts = [
//            ['id' => 1, 'title' => 'Laravel','posted_by' => 'Ahmed', 'created_at' => '2021-03-13','email' => 'aaa@bb.com'],
//            ['id' => 2, 'title' => 'JS','posted_by' => 'Mohamed', 'created_at' => '2021-03-25','email' => 'aaa@bb.com']
//        ];

        return view('posts.index',[
            'posts' => $posts
        ]);

    }

    public function show($post_id)
    {
        $post_id = Post::find($post_id);
//        $post_id = ['id' => 1, 'title' => 'Laravel','posted_by' => 'Ahmed','description' => 'This is Description', 'created_at' => '2021-03-13','email' => 'aaa@bb.com'];
//        dd($post_id);
        return view('posts.show',[
            'post' => $post_id
        ]);
//        dd($id);
//        return 'done';

    }
    public function create()
    {
//        $posts = [
//            ['id' => 1, 'title' => 'Laravel','posted_by' => 'Ahmed', 'created_at' => '2021-03-13','email' => 'aaa@bb.com'],
//            ['id' => 2, 'title' => 'JS','posted_by' => 'Mohamed', 'created_at' => '2021-03-25','email' => 'aaa@bb.com']
//        ];
        return view('posts.create',['users'=>User::all()]);
    }

    public function store(Request $myReqObj)
    {
        $data = $myReqObj->all();

        //insert into db
        Post::create($data);
        return redirect()->route('posts.index');
    }

    public function edit($post)
    {
        return view('posts.edit',['post'=>Post::find($post),'users'=>User::all()]);
    }

    public function update(Request $myReqObj, Post $post)
    {
        $post->update($myReqObj->all());
        return redirect()->route('posts.edit');
    }

    public function destroy($id) //Request $myReqObj, Post not to initialize new instance
    {
//        $post->delete($myReqObj->all());
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('message','Post Deleted Successfully');
    }
}
