@extends('layout')

@section('content')
    {{-- <p>{{ $data }}</p> --}}
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
              Featured
            </div>
            <div class="card-body">
              @foreach ($data as $post)
                <div class="">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <a href="#" class="btn btn-primary">View</a>
                    <hr>
                </div>
              @endforeach
            </div>
        </div>
    </div>

@endsection
