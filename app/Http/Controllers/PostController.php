<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\PostDeleted;
use App\Mail\PostUpdated;
use Illuminate\Http\Request;
use App\Events\PostCreatedEvent;
use App\Notifications\PostCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    // show all post page
    public function index()
    {
        // $user = User::find(1);
        // $user->notify(new PostCreated());
        // Notification::send($user, new PostCreated());
        // Mail::to('koko@gmail.com')->send(new PostStored());
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
        $post = Post::create($data);
        event(new PostCreatedEvent($post));
        return redirect()->route('post#list')->with('success',config('message.msg.create'));
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
        $updatePost = Post::where('id',$post->id)->first();
        // Mail::to('koko@gmail.com')->send(new PostUpdated($updatePost));
        return redirect()->route('post#list')->with('success',config('message.msg.update'));
    }

    // delete post
    public function destory(Post $post)
    {
        $post->delete();
        // Mail::to('koko@gmail.com')->send(new PostDeleted());
        return redirect()->route('post#list')->with('delete',config('message.msg.delete'));
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
