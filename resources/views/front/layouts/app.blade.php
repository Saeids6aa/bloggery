<!DOCTYPE html>
<html lang="en">

<head>
@include('front.layouts.header-meta')
@yield('style')
</head>

<body>

    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Header -->
    <header class="">
        @include('front.layouts.header')
    </header>

    <!-- Page Content -->
    @yield('content')
    <!-- Banner Starts Here -->
  
    <footer>
     @include('front.layouts.footer')
    </footer>
 @include('front.layouts.footer-meta')
  
</body>

</html>
