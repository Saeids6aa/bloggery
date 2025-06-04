@extends('layouts.app')

@section('page_title')
    Edit Admin
@endsection

@section('page_sup_title')
    Edit
@endsection
@section('style')
    <style>
        .edit-container {
            max-width: 750px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #dee2e6;
            margin-bottom: 15px;
        }

        .form-section {
            padding-left: 30px;
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
        <div class="edit-container d-flex align-items-start">
            <div class="text-center">
                @if ($admin->admin_image)
                    <img src="{{ asset('images/admin/admin_image/' . $admin->admin_image) }}" class="profile-img"
                        alt="Admin Image">
                @else
                    <img src="{{ asset('images/admin/admin_image/avatar.png') }}" class="profile-img" alt="Default Image">
                @endif
            </div>

            <div class="form-section flex-grow-1">
                <form action="{{ route('profile.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="admin_name">Admin Name</label>
                        <input type="text" name="admin_name" class="form-control" id="admin_name"
                            value="{{ $admin->admin_name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ $admin->email }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label fw-bold">New Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Leave blank to keep current">
                    </div>

                    <div class="form-group mb-3">
                        <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                            placeholder="Confirm new password">
                    </div>


                    <div class="form-group">
                        <label for="admin_image">Upload Image</label>
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
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
