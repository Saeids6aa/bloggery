@extends('layouts.app')

@section('page_title')
    edit_user
@endsection

@section('page_sup_title')
    edit user
@endsection
@section('style')
    <style>
        .select2-container .select2-selection--single {
            height: 38px;
            pediting: 6px 12px;
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
                        <h3 class="card-title">edit user</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="email">user Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $user->email }}">
                            </div>
                         
                            <div class="form-group">
                                <label for="avatar">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-image" name="user_image">
                                    <label class="custom-file-label" for="user_image">Choose file</label>
                                </div>
                            </div>
                            <div id="thumb-output">
                            </div>
                           
                            @if ($user->user_image)
                                <img src="{{ asset('images/user/user_image/' . $user->user_image) }}" width="200px"
                                    height="150px" style="border-radius: 5px">
                            @endif
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
