
@extends('front.layouts.app')

@section('content')
    <div class="main-banner header-text">
        <div class="container-fluid">
            @if ($q)
                <br>
                <br>
                <div class="heading-page header-text ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-content">
                                    <h4 class="">The Results :<span style="color: #f48840"> {{ $q }}</span>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="owl-banner owl-carousel owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-2834px, 0px, 0px); transition: all; width: 5669px;">
                            @foreach ($posts->take(6) as $post)
                                @php
                                    $post_comment_count = $post->comments->count();
                                @endphp
                                <div class="owl-item ">
                                    <div class="item "
                                        style="width: 520px; height: 450px; overflow: hidden; padding:0 13px 0 13px;">
                                        <img src="{{ asset('images/posts/image/' . $post->image) }}" alt=""
                                            style="width: 100%; height: 100%; object-fit: cover; filter: brightness(60%);">

                                        <div class="item-content ">
                                            <div class="main-content">
                                                <div class="meta-category">
                                                    <span>{{ $post->category_name }}</span>
                                                </div>
                                                <a href="{{ route('post_details', $post->id) }}">
                                                    <h4>{{ $post->title }}</h4>
                                                </a>
                                                <ul class="post-info">
                                                    <li><a href="#">{{ $post->admin_name }}</a></li>
                                                    <li>
                                                        <a>
                                                            {{ $post->Date }}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{route('post_details',$post->id)}}#comments">{{  $post_comment_count }} Comments</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            @endif


            <section class="blog-posts">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8">
                            <div class="all-blog-posts">
                                <div class="row">

                                    @foreach ($posts->take(3) as $post)
                                        @php
                                            $post_comment_count = $post->comments->count() ?? 0;

                                        @endphp
                                        <div class="col-lg-12">
                                            <div class="blog-post">
                                                <div class="blog-thumb">
                                                    <img src="{{ asset('images/posts/image/' . $post->image) }}"
                                                        alt=""
                                                        style="width: 720px; height: 340px; object-fit: cover;">
                                                </div>
                                                <div class="down-content">
                                                    <span>{{ $post->category_name }}</span>
                                                    <a href="{{ route('post_details', $post->id) }}">
                                                        <h4>{{ $post->title }}</h4>
                                                    </a>
                                                    <ul class="post-info">
                                                        <li><a href="#">{{ $post->admin_name }}</a></li>
                                                        <li><a href="#">{{ $post->Date }}</a></li>
                                                        <li><a href="#">{{ $post_comment_count }} Comments</a>
                                                        </li>
                                                    </ul>
                                                    <p>{{ Str::limit($post->description, 100) }}</p>
                                                    <div class="post-options">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <ul class="post-tags">
                                                                    <li><i class="fa fa-tags"></i></li>
                                                                    <li>
                                                                        <a>
                                                                            @include('front.layouts.tags_lebels')
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-lg-12">
                                        <div class="main-button">
                                            <a href="{{ route('all_posts') }}">View All Posts</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @include('front.layouts.side-posts')

                    </div>
                </div>
        </div>

        </section>
    @endsection
