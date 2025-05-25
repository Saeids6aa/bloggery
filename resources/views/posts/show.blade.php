@extends('layouts.app')

@section('page_title')
    Show Post
@endsection

@section('page_sup_title')
    Show Post
@endsection

@section('style')
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
            padding: 6px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
    </style>
@endsection


@section('content')
   <section class="content">
  <div class="container-fluid">
    <div 
      class="card card-primary shadow-lg mx-auto" 
      style="max-width: 900px; width: 90%;"
    >
      <div class="card-header bg-gradient-primary text-center">
        <h3 class="card-title w-100">Post Details</h3>
      </div>
      <div class="card-body p-4 text-center mb-4">
        <div class="form-group text-center mb-4">
          <h2 class="font-weight-bold">{{ $post->title }}</h2>
        </div>

        <div class="form-group">
          <strong>Description:</strong>
          <p>{{ $post->description }}</p>
        </div>

        <div class="form-group">
          <strong>Category:</strong>
          <p class="badge badge-pill badge-primary">{{ $post->category->name }}</p>
        </div>

        <div class="form-group">
          <strong>Tags:</strong><br>
          @foreach ($post->tags as $tag)
            <span class="badge badge-pill badge-info mr-1">{{ $tag->name }}</span>
          @endforeach
        </div>

        @if ($post->image)
          <div class="form-group text-center mt-4">
            <img 
              src="{{ asset('images/posts/image/' . $post->image) }}" 
              class="img-fluid img-thumbnail mx-auto d-block" 
              style="max-width: 400px;"
              alt="Post Image"
            >
          </div>
        @endif
        <div class="card-tools">
          <a href="{{ route('posts') }}" class="btn btn-sm btn-success">
            <i class="fas fa-arrow-left"></i> Back to List
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
