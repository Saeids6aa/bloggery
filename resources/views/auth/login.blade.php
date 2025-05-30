<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | Log in</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href = "{{ asset('back_end/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_end/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_end/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back_end/toastr.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('back_end/toastr.min.css') }}" />

</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card">
            <div class="login-logo">
                <img src="{{ asset('back_end/dist/img/logo-color_rides.png') }}" width="150px" alt="Logo Color Rides"
                    class="img-fluid pt-4" />
                <p>Login to Dashboard</p>

            </div>
            <div class="card-body login-card-body">
                <form action="{{ route('admin.login.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary btn-block">
                                Sign In
                            </button>
                        </div>
                    </div>
            </div>
            </form>



        </div>
    </div>

    <script src="{{ asset('back_end/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('back_end/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('back_end/dist/js/adminlte.min.js') }}"></script>


    <script src="{{ asset('back_end/toastr.min.js') }}"></script>
    <script>
        $(function() {
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}");
                @endforeach
            @endif
        });
    </script>

</body>

</html>
