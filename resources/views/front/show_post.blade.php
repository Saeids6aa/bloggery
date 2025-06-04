@extends('front.layouts.app')
@section('style')
    <style>
        .page-item.active .page-link {
            background-color: #fb9857;
            border-color: #fb9857;
        }

        .page-link {
            color: #fb9857;
        }

        .page-link:hover {
            color: #fb9857;
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
                            <h4>Post Details</h4>
                            <h2>{{ $post->title }}</h2>
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
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <img src="{{ asset('/images/posts/image/' . $post->image) }}" alt="">
                                    </div>
                                    <div class="down-content">
                                        <span>{{ $post->category->name }}</span>
                                        <a>
                                            <h4>{{ $post->title }}</h4>
                                        </a>
                                        <ul class="post-info">
                                            <li><a href="#">{{ $post->admin->admin_name }}</a></li>
                                            <li><a href="#">{{ $post->created_at->format('F d, Y') }}</a></li>
                                            <li><a href="#">10 Comments</a></li>
                                        </ul>
                                        <p>{{ $post->description }}</p>
                                        </p>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
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
                            <div class="col-lg-12" id="comments">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>{{ $post->comments->count() }} Comments</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($comments as $item)
                                                <li>
                                                    <div class="author-thumb">
                                                        <img src="{{ asset('/images/user/user_image/' . $item->user->user_image) }}"
                                                            alt="" style="border-radius: 10px">
                                                    </div>
                                                    <div class="right-content">
                                                        <h4>{{ $item->user->name }}<span>{{ $item->created_at->format('F d, Y') }}</span>
                                                        </h4>
                                                        <p class="pt-1">{{ $item->comment }}</p>
                                                    </div>
                                                </li>
                                            @endforeach


                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center mt-4" style="color: red">
                                    {{ $comments->links('pagination::bootstrap-4') }}
                                </div>
                            </div>

                            @if (auth()->check())
                                <div class="col-lg-12">
                                    <div class="sidebar-item submit-comment">
                                        <div class="sidebar-heading">
                                            <h2>Your comment</h2>
                                        </div>
                                        <div class="content">
                                            <form id="comment" action="{{ route('add_comment') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <textarea name="comment" rows="6" id="comment" placeholder="Type your comment"></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <button type="submit" id="form-submit"
                                                                class="main-button">Comment</button>
                                                        </fieldset>
                                                    </div>

                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-8 justify-content-center pt-4 logj">
                                    <div class="main-button">
                                        <a href="{{ route('show_login') }}"> Please login to comment.</a>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
                @include('front.layouts.side-posts')

            </div>
        </div>
    </section>
@endsection
