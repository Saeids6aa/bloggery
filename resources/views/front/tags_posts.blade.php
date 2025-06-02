@extends('front.layouts.app')
@section('style')
    <style>
        .btn-custom:hover {
            color: white
        }
    </style>
@endsection
@section('content')
    <div class="container" style="padding-top: 130px">
        <div class="bg-light py-5">
            <div class="container text-center">
                <h4 class="display-4 mb-3">{{ $tagName }}</h4>
                <p class="lead text-muted">Show All Posts With This Tag</p>
            </div>
        </div>
        <div class="row g-4">
            @forelse($posts as $post)
                <div class="col-md-4 d-flex p-2">
                    <div class="card h-100 d-flex flex-column">
                        <img src="{{ asset('images/posts/image/' . $post->image) }}" class="card-img-top"
                            alt="{{ $post->title }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text flex-grow-1">
                                {{ Str::limit($post->description, 50) }}
                            </p>
                            <a href="{{ route('post_details', $post->id) }}" class="btn btn-custom w-100">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No posts in this Tag.</p>
                </div>
            @endforelse
        </div>
        <br>
        <br>
        @include('front.layouts.paginator')

    </div>
@endsection
