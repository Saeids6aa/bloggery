@extends('layouts.app')

@section('page_title')
    posts Section
@endsection
@section('page_sup_title')
    posts
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">posts Data</h3>
                    <div class="text-right">
                        <a href="{{ route('add_posts') }}" class="btn btn-primary">add post</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>id</th>
                                <th>Title</th>
                                <th>image</th>
                                <th>created By</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr style="text-align: center ">
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td><img src="{{ asset('images/posts/image/' . $post->image) }}" width="50px"
                                            style="border-radius: 5px"></td>
                                    <td>{{ $post->admin->admin_name }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>

                                        <form action="{{ route('posts.delete', $post->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure you want to delete this Post?')"
                                                style="border: none; background: none; padding: 0; margin-right: 10px;">
                                                <i class="fa fa-trash" style="color: red;"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="fa fa-edit"
                                            style="color: darkcyan;"></a>
                                        <a href="{{ route('posts.show', $post->id) }}"
                                            title="View">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                         <a href="{{ route('posts.comment', $post->id) }}"
                                            title="View Comment">
                                            <i class="fas fa-list p-2"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-flex justify-content-right">
                        {{ $posts->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    </div>
    </div>
    </section>
@endsection
