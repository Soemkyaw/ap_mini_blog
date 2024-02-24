@extends('layout')

@section('content')
    {{-- <p>{{ $data }}</p> --}}
    <div class="container">
        <a href="/post/create" class="btn btn-success my-3">New Post</a>
        <div class="card">
            <div class="card-header text-center">
              Contents
            </div>
            <div class="card-body">
              @foreach ($data as $post)
                <div class="">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <a href="{{ route('post.show',[$post->id]) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-warning">Edit</a>
                    <form
                        method="POST"
                        action="{{ route('post.destory',[$post->id]) }}"
                        class=" d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    {{-- <a href="{{ route('post.destory',[$post->id]) }}" class="btn btn-danger">Delete</a> --}}
                    <hr>
                </div>
              @endforeach
            </div>
        </div>
    </div>

@endsection
