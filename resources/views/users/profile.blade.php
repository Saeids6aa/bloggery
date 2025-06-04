@extends('layouts.app')

@section('page_title')
    Edit Admin
@endsection

@section('page_sup_title')
    Edit Profile
@endsection

@section('style')
    <style>
        .edit-profile-container {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }

        .edit-profile-img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #dee2e6;
        }

        .edit-form-area {
            padding-left: 30px;
            flex-grow: 1;
        }

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
        <div class="edit-profile-container d-flex align-items-center">
            <div class="text-center">
                <img src="{{ $admin->admin_image ? asset('images/admin/admin_image/' . $admin->admin_image) : asset('images/admin/admin_image/avatar.png') }}"
                     class="edit-profile-img mb-3" alt="Admin Image">
            </div>

            <div class="edit-form-area">
                <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group mb-3">
                        <label for="admin_name" class="form-label fw-bold">Admin Name</label>
                        <input type="text" name="admin_name" class="form-control" id="admin_name" value="{{ $admin->admin_name }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ $admin->email }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="role" class="form-label fw-bold">Role</label>
                        <select class="form-control select2" id="role" name="role">
                            <option disabled>Choose Role</option>
                            <option value="admin" {{ $admin->role == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="super_admin" {{ $admin->role == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                            <option value="editor" {{ $admin->role == 'editor' ? 'selected' : '' }}>Editor</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="admin_image" class="form-label fw-bold">Upload Image</label>
                        <input type="file" class="form-control" id="admin_image" name="admin_image">
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-success px-4">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection
