@extends('front.layouts.app')
@section('style')
    <style>
        .btn-custom:hover {
            color: white
        }
    </style>
@endsection
@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Recent Posts</h4>
                            <h2>Our Recent Blog Entries</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">

                            @foreach ($posts as $post)
                               @php
                                    $post_comment_count = $post->comments->count();
                                @endphp
                                <div class="col-lg-6 d-flex align-items-stretch">
                                    <div class="blog-post w-100 d-flex flex-column"
                                        style="#eee;padding: 15px;background: #fff;">
                                        <div class="blog-thumb" style="height: 250px; overflow: hidden;">
                                            <img src="{{ asset('/images/posts/image/' . $post->image) }}" alt=""
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <div class="down-content">
                                            <span>{{ $post->category->name }}</span><br>
                                            <a href="{{ route('post_details', $post->id) }}">
                                                <h4 style="display: inline-block; max-width: 370px;">
                                                    {{ $post->title }}
                                                </h4>

                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#">{{ $post->admin->admin_name }}</a></li>
                                                <li><a href="#">{{ $post->created_at->format('F d, Y') }}</a></li>
                                                <li><a href="{{route('post_details',$post->id)}}#comments">{{$post_comment_count}} Comment</a></li>
                                            </ul>

                                            <p>{{ Str::limit($post->description, 50) }}</p>
                                            <a href="{{ route('post_details', $post->id) }}" class="btn btn-custom w-100">
                                                Read More
                                            </a>
                                            <hr>

                                            <div class="post-options">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <ul class="post-tags">
                                                            <li><i class="fa fa-tags"></i></li>
                                                            <li><a>
                                                                    @include('front.layouts.tags_lebels')
                                                                </a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @include('front.layouts.paginator')
                        </div>
                    </div>
                </div>
                @include('front.layouts.side-posts')

            </div>
        </div>
    </section>
@endsection
