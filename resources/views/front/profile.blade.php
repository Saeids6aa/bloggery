@extends('front.layouts.app')

@section('content')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Updated Your Profile : <h3 style="color: white">{{ $user->name }}</h3>
                            </h4>

                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="d-flex align-items-start justify-content-center" style="min-height: 100vh; padding-top: 80px;">

            <div class="container pt-4 mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card shadow p-4">

                            <h3 class="text-center mb-4">Update Profile</h3>
                            <form method="POST" action="{{ route('update_profile',$user->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @if ($user->user_image)
                                    <img src="{{ asset('images/user/user_image/' . $user->user_image) }}"
                                        style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%; display: block; margin: 10px auto;">
                                @endif

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}"
                                        required autofocus>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ $user->email }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control">
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



                                <button type="submit" class="btn btn-custom w-100">Register</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
