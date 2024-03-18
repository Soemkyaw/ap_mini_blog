@extends('layout')

@section('content')
    {{-- <p>{{ $data }}</p> --}}
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
              Contents
            </div>
            <div class="card-body">
                <div class="">
                    <h3 class="card-title">{{ $post->title }} <span class="card-text rounded-pill bg-secondary text-white px-2 fs-6">{{ $post->category->name }}</span></h3>
                    <p class="card-text">{{ $post->description }}</p>
                    <div class="mt-3">
                        <a href="{{ route('post#list') }}" class="btn btn-dark">Back</a>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

@endsection
