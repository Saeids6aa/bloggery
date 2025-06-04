@extends('layouts.app')

@section('page_title')
    Admin Profile
@endsection

@section('page_sup_title')
    Profile
@endsection

@section('style')
    <style>
        .profile-container {
            max-width: 700px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            padding: 30px;
        }

        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #dee2e6;
        }

        .profile-info {
            padding-left: 30px;
        }

        .info-label {
            font-weight: 600;
            color: #495057;
        }

        .info-value {
            margin-bottom: 15px;
            color: #6c757d;
        }

        .btn-edit {
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="profile-container d-flex align-items-center">
            <div class="text-center">
                @if($admin->admin_image)
                    <img src="{{ asset('images/admin/admin_image/' . $admin->admin_image) }}" class="profile-img" alt="Admin Image">
                @else
                    <img src="{{ asset('images/admin/admin_image/avatar.png') }}" class="profile-img" alt="Default Image">
                @endif
            </div>

            <div class="profile-info flex-grow-1">
                <div>
                    <div class="info-label">Admin Name:</div>
                    <div class="info-value">{{ $admin->admin_name }}</div>
                </div>

                <div>
                    <div class="info-label">Email:</div>
                    <div class="info-value">{{ $admin->email }}</div>
                </div>

                <div>
                    <div class="info-label">Role:</div>
                    <div class="info-value text-capitalize">{{ $admin->role }}</div>
                </div>

                <a href="{{ route('profile.edit', $admin->id) }}" class="btn btn-success btn-edit">Edit Profile</a>
            </div>
        </div>
    </div>
@endsection
