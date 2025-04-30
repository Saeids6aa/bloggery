@extends('layouts.app')

@section('page_title')
    Add_Admin
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
                        <h3 class="card-title">Add New Admin</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="email">Admin Name</label>
                                <input type="text" name="admin_name" class="form-control" id="admin_name"
                                    placeholder="Enter admin name">
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
                            
                            <div class="form-group mb-4">
                                <label for="role" class="form-label fw-bold">Select Role</label>
                                <select class="form-control select2" id="role" name="role" style="width: 100%;">
                                    <option selected>Choose Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="super_admin">Super Admin</option>
                                    <option value="editor">Editor</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-image" name="admin_image">
                                    <label class="custom-file-label" for="admin_image">Choose file</label>
                                </div>
                            </div>
                            <div id="thumb-output"></div>  <!-- for show the image in footer meta -->

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
