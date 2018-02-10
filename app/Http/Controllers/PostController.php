<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
        return view("post.index", compact('posts'));
    }

    public function show(Post $post)
    {
        return view("post.show", compact('post'));
    }

    public function create()
    {
        return view("post.add");
    }

    public function store(Request $request)
    {
        //验证
        $this->validate($request,[
            'title' => 'required|string|max:20|min:4',
            'content' => 'required|string|min:10',
        ]);

        //添加用户id
        $user_id = \Auth::id();
        $params = array_merge(request(['title','content']), compact('user_id'));

        $post = Post::create($params);

        return redirect("/posts");
    }

    public function edit(Post $post)
    {
        return view("post.edit", compact('post'));
    }

    public function update(Post $post)
    {
        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:20|min:4',
            'content' => 'required|string|min:10',
        ]);

        $this->authorize('update', $post);

        //逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        //渲染
        return redirect("/posts/{$post->id}");
    }

    public function delete(Post $post)
    {
        //验证权限
        $this->authorize('delete', $post);

        $post->delete();
        return redirect('/posts');
    }

    public function imageUpload(Request $request)
    {
        //获取到文件为wangEditorH5File的文件,存储到/public/storage下
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        //到该文件下,找此文件
        return asset('storage/' . $path);
    }
}
