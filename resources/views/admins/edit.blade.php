@extends('layouts.app')

@section('page_title')
    edit_Admin
@endsection

@section('page_sup_title')
    edit admin
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
                        <h3 class="card-title">edit Admin</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="email">Admin Name</label>
                                <input type="text" name="admin_name" class="form-control" id="admin_name"
                                    value="{{ $admin->admin_name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $admin->email }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="role" class="form-label fw-bold">Select Role</label>
                                <select class="form-control select2" id="role" name="role" style="width: 100%;">
                                    <option disabled>Choose Role
                                    </option>

                                    <option value="admin" @php if($admin->role == "admin"){ echo 'selected'; } @endphp>
                                        Admin</option>
                                    <option value="super_admin"
                                        @php if($admin->role == "super_admin"){ echo 'selected'; } @endphp>Super Admin
                                    </option>
                                    <option value="editor" {{ $admin->role == 'editor' ? 'selected' : '' }}>Editor</option>


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="avatar">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-image" name="admin_image">
                                    <label class="custom-file-label" for="admin_image">Choose file</label>
                                </div>
                            </div>
                            <div id="thumb-output">
                            </div>
                           
                            @if ($admin->admin_image)
                                <img src="{{ asset('images/admin/admin_image/' . $admin->admin_image) }}" width="200px"
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
