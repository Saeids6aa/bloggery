@extends('layouts.app')

@section('page_title')
    Show Post Comments
@endsection

@section('page_sup_title')
    Show Post Comments
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
            <div class="card card-primary shadow-lg mx-auto" style="max-width: 900px; width: 90%;">
                <div class="card-header bg-gradient-primary text-center">
                    <h3 class="card-title w-100">Post Comments</h3>
                </div>
                <div class="card-body p-4 text-center mb-4">
                    <div class="form-group text-center mb-4">
                        <h2 class="font-weight-bold">{{ $post->title }}</h2>
                    </div>
                    @if ($post->image)
                        <div class="form-group text-center mt-4">
                            <img src="{{ asset('images/posts/image/' . $post->image) }}"
                                class="img-fluid img-thumbnail mx-auto d-block" style="max-width: 400px;" alt="Post Image">
                        </div>
                    @endif


                    @if ($post->comments->count())
                        <div class="mt-4 text-left" id="comment">
                            <h4 class="mb-3">Comments ({{ $post->comments->count() }})</h4>
                            <ul class="list-group">
                                @foreach ($post->comments as $comment)
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div>
                                            <strong>{{ $comment->user->name}}:</strong>
                                            <p class="mb-1">{{ $comment->comment }}</p>
                                            <small
                                                class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                            </div>

                                        <form action="{{route('posts.delete_comment',$comment->id)}}" method="POST"
                                            style="margin-left: 10px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this comment?')"
                                                style="border: none; background: none;">
                                                <i class="fa fa-trash" style="color: red;"></i>
                                                </button>
                                            </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="alert alert-info mt-4">
                            No comments yet.
                        </div>
                    @endif



                    <div class="card-tools pt-4">
                        <a href="{{ route('posts') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
