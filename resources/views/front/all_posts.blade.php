@extends('front.layouts.app')

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
                                <div class="col-lg-6">
                                    <div class="blog-post">
                                        <div class="blog-thumb">
                                            <img src="{{ asset('/images/posts/image/' . $post->image) }}" alt=""
                                                style="width: 370px;height: 330px;">
                                        </div>
                                        <div class="down-content">
                                            <span>{{ $post->category->name }}</span>
                                            <a href="{{ route('post_details', $post->id) }}">
                                                <h4>{{ $post->title }}</h4>
                                            </a>
                                            <ul class="post-info">
                                                <li><a href="#">{{ $post->admin->admin_name }}</a></li>
                                                <li><a href="#">{{ $post->created_at->format('F d, Y') }}</a></li>
                                                <li><a href="#">12 Comments</a></li>
                                            </ul>
                                            <p>{{ $post->description }}.</p>
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
