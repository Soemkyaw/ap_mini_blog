<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // show all post page
    public function index()
    {
        $data = Post::where('user_id',auth()->id())->orderBy('id','desc')->get();
        return view('home',compact('data'));
    }

    // show single post page
    public function show(Post $post)
    {
        $this->authorize('view',$post);
        return view('show',compact('post'));
    }

    // direct post create page
    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    // new post create
    public function store(Request $request)
    {
        $this->ValidateFormData($request);
        $data = $this->FormData($request);
        Post::create($data);
        return redirect()->route('post#list');
    }

    // direct post edit page
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('edit',compact('post','categories'));
    }

    // update post data
    public function update(Post $post,Request $request)
    {
        $this->ValidateFormData($request);
        $data = $this->FormData($request);
        $post->update($data);
        return redirect()->route('post#list');
    }

    // delete post
    public function destory(Post $post)
    {
        $post->delete();
        return redirect()->route('post#list');
    }

    // validate form data
    private function ValidateFormData($request)
    {
        return $request->validate([
            'title' => ['required','max:100','unique:posts,title'],
            'description' => 'required',
            'category_id' => 'required',
        ]);
    }

    // Form data
    private function FormData($request)
    {
        return [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id'   => auth()->id()
        ];
    }
}
