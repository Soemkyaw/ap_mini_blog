@extends('layout')

@section('content')

    <div class="container">
        <div class="card p-3">
            <h3 class="text-center text-primary my-3">Create Post</h3>
            <form method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Post Title</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Title ...">
                  @error('title')
                      <div class=" alert alert-danger my-2">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="example99" class="form-label">Post Description</label>
                  <textarea name="description"  class="form-control" id="example99" cols="30" rows="10" placeholder="Enter Post Description ...">{{ old('description') }}</textarea>
                  @error('description')
                      <div class=" alert alert-danger my-2">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="example99" class="form-label">Select Category</label>
                  <select name="category_id" class="form-select">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ Str::ucfirst($category->name) }}</option>
                    @endforeach
                  </select>
                  @error('description')
                      <div class=" alert alert-danger my-2">{{ $message }}</div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('post#list') }}" class="btn btn-dark">Back</a>
            </form>
        </div>
    </div>

@endsection
