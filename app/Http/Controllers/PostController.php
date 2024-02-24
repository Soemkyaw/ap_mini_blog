<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // show all post page
    public function index()
    {
        $data = Post::orderBy('id','desc')->get();
        return view('home',compact('data'));
    }

    // show single post page
    public function show(Post $post)
    {
        return view('show',compact('post'));
    }

    // direct post create page
    public function create()
    {
        return view('create');
    }

    // new post create
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','max:100','unique:posts,title'],
            'description' => 'required',
        ],[
            'title.required' => 'You need to fill post title ...',
            'description.required' => 'You need to fill post description ...',
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        Post::create($data);
        return redirect('/');
    }

    // direct post edit page
    public function edit(Post $post)
    {
        return view('edit',compact('post'));
    }

    // update post data
    public function update(Post $post,Request $request)
    {
        $id = $post->id;
        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];
        $post->update($data);
        return redirect('/');
    }

    // delete post
    public function destory(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
