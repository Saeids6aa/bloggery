@extends('layouts.app')

@section('page_title')
    Add_Post
@endsection

@section('page_sup_title')
    Add Post
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Add New Post</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">Post Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    placeholder="Enter admin title">


                                <div class="form-group">
                                    <label for="email">Post descrption</label>
                                    <textarea name="description" id="" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <label for="Category">Post Category</label>
                                <select name="category_id" id="category_id" class="form-control select2">
                                    <option disabled selected>Choose Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                <div class="form-group">
                                    <label for="tags">Post Tags</label>
                                    <select id="tags" name="tags[]" class="form-control select2" multiple="multiple"
                                        data-placeholder="Choose Tags">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label for="avatar">Upload Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file-image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                <div id="thumb-output"></div>

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    @endsection
