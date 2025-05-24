@extends('layouts.app')

@section('page_title')
    Add_user
@endsection

@section('page_sup_title')
    Add
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
                        <h3 class="card-title">Add New user</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">user Name</label>
                                <input type="text" name="name" class="form-control" id=" name"
                                    placeholder="Enter user name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter email">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation" placeholder="Enter password Confirmation">
                            </div>

                           

                            <div class="form-group">
                                <label for="avatar">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-image" name="user_image">
                                    <label class="custom-file-label" for="user_image">Choose file</label>
                                </div>
                            </div>
                            <div id="thumb-output"></div> <!-- for show the image in footer meta -->

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
