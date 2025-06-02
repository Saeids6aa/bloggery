    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="{{ asset('front_end/fonts.css') }}" rel="stylesheet">
    <title>

        @if (!empty($setting->title))
            {{ $setting->title }}
        @endif


    </title>
    <link href="{{ asset('front_end/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front_end/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front_end/assets/css/templatemo-stand-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('front_end/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('back_end/toastr.min.css') }}" />


    <style>
        input.form-control:focus {
            border-color: rgb(244, 136, 64);
            box-shadow: 0 0 0 0.2rem rgba(240, 140, 78, 0.682);
        }

        .btn-custom {
            background-color: rgb(244, 136, 64);
            border-radius: 10px;
            border-color: rgb(244, 136, 64);
            color: white;
        }

        .btn-custom:hover {
            background-color: rgb(220, 100, 30);
            border-color: rgb(220, 100, 30);
        }
    </style>

    <style>
        textarea#message:focus {
            border: 2px solid orange;
            outline: none;
        }

        textarea#message:hover {
            border: 2px solid orange;
        }
    </style>
