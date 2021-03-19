<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.index',['posts' => $posts]);
//        $posts = [
//            ['id' => 1, 'title' => 'Laravel','posted_by' => 'Ahmed', 'created_at' => '2021-03-13','email' => 'aaa@bb.com'],
//            ['id' => 2, 'title' => 'JS','posted_by' => 'Mohamed', 'created_at' => '2021-03-25','email' => 'aaa@bb.com']
//        ];
    }

    public function show($post_id)
    {
        $post_id = Post::find($post_id);
        return view('posts.show',['post' => $post_id]);
//        $post_id = ['id' => 1, 'title' => 'Laravel','posted_by' => 'Ahmed','description' => 'This is Description', 'created_at' => '2021-03-13','email' => 'aaa@bb.com'];
//        dd($post_id);
//        dd($id);
//        return 'done';
    }

    public function create()
    {
        return view('posts.create',['users'=>User::all()]);
//        $posts = [
//            ['id' => 1, 'title' => 'Laravel','posted_by' => 'Ahmed', 'created_at' => '2021-03-13','email' => 'aaa@bb.com'],
//            ['id' => 2, 'title' => 'JS','posted_by' => 'Mohamed', 'created_at' => '2021-03-25','email' => 'aaa@bb.com']
//        ];
    }

    public function store(Request $myReqObj)
    {
        $data = $myReqObj->all();
        //insert into db
        Post::create($data);
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit',['post'=>$post,'users'=>User::all()]);
    }

//    public function update($id)
//    {
//        $post = Post::find($id);
//        $post->update();
//        return redirect()->route('posts.edit');
//    }
public function update(Request $myReqObj, $post)
    {
        $post = Post::findorFail($post);
//        $post->update($myReqObj->all());
    $post->update([
        'title' => $myReqObj['title'],
        'description' =>$myReqObj['description'],
        'user_id' =>$myReqObj['user_id'],
    ]);
        return redirect()->route('posts.index');
    }

    public function destroy($id) //Request $myReqObj, Post not to initialize new instance
    {
//        $post->delete($myReqObj->all());
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')->with('message','Post Deleted Successfully');
    }

    public function run()
    {
        User::factory()->count(50)->create();
    }
}
