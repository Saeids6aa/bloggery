@extends('front.layouts.app')

@section('content')
     <section class="d-flex align-items-start justify-content-center" style="min-height: 100vh; padding-top: 80px;">
        <div class="container pt-4 mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow p-4">
                        <h3 class="text-center mb-4">Create an Account</h3>
                        <form method="POST" action="{{ route('store_user') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            
                            <div class="mb-3">
                                <label for="avatar">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file-image" name="user_image">
                                    <label class="custom-file-label" for="user_image">Choose file</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-custom w-100">Register</button>

                            <div class="text-center mt-3">
                                Already have an account? <a href="{{route('show_login')}}" style="color: rgb(244, 136, 64);">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection