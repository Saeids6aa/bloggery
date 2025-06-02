@extends('front.layouts.app')

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
                            <div class="col-lg-12">
                                <div class="sidebar-item comments">
                                    <div class="sidebar-heading">
                                        <h2>4 comments</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <div class="author-thumb">
                                                    <img src="{{ asset('front_end/assets/images/comment-author-01.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h4>Charles Kate<span>May 16, 2020</span></h4>
                                                    <p>Fusce ornare mollis eros. Duis et diam vitae justo fringilla
                                                        condimentum eu quis leo. Vestibulum id turpis porttitor sapien
                                                        facilisis scelerisque. Curabitur a nisl eu lacus convallis eleifend
                                                        posuere id tellus.</p>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="author-thumb">
                                                    <img src="{{ asset('front_end/assets/images/comment-author-03.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="right-content">
                                                    <h4>Belisimo Mama<span>May 16, 2020</span></h4>
                                                    <p>Nullam nec pharetra nibh. Cras tortor nulla, faucibus id tincidunt
                                                        in, ultrices eget ligula. Sed vitae suscipit ligula. Vestibulum id
                                                        turpis volutpat, lobortis turpis ac, molestie nibh.</p>
                                                </div>
                                            </li>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @if (auth()->check())
                                <div class="col-lg-12">
                                    <div class="sidebar-item submit-comment">
                                        <div class="sidebar-heading">
                                            <h2>Your comment</h2>
                                        </div>
                                        <div class="content">
                                            <form id="comment" action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-12">
                                                        <fieldset>
                                                            <input type="name" name="name" class="form-control"
                                                                placeholder="Your Name">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <fieldset>
                                                            <input name="email" type="text" id="email"
                                                                placeholder="Your email" required=""
                                                                class="form-control">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <fieldset>
                                                            <input name="subject" type="text" id="subject"
                                                                placeholder="Subject" class="form-control">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <textarea name="message" rows="6" id="message" placeholder="Type your comment" ></textarea>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <fieldset>
                                                            <button type="submit" id="form-submit"
                                                                class="main-button">Submit</button>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12 text-center mt-4">
                                    <div class="alert alert-warning d-inline-block" role="alert"
                                        style="font-weight: 500;">
                                        Please <a href="" class="alert-link">log in</a> to comment.
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
