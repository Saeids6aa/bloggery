@extends('front.layouts.app')

@section('content')
    <section class="d-flex align-items-start justify-content-center" style="min-height: 100vh; padding-top: 80px;">
        <div class="container pt-4"><br><br><br>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow p-4">
                        <h3 class="text-center mb-4">Login To Your Account</h3>
                        <form method="POST" action="{{ route('user_login.login.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    >
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

                            <button type="submit" class="btn btn-custom w-100">Login</button>

                            <div class="text-center mt-3">
                                Join Us?
                                <a href="{{ route('register') }}" style="color: rgb(244, 136, 64);">
                                    Register
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
