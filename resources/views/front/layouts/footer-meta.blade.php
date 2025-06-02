  <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('front_end/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('front_end/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('front_end/assets/js/custom.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/owl.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/slick.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('front_end/assets/js/accordions.js') }}"></script>

    <script language="text/Javascript">
        cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
        function clearField(t) { //declaring the array outside of the
            if (!cleared[t.id]) { // function makes it static and global
                cleared[t.id] = 1; // you could use true and false, but that's more typing
                t.value = ''; // with more chance of typos
                t.style.color = '#fff';
            }
        }
    </script>

    
    <script src="{{ asset('back_end/toastr.min.js') }}"></script>

    <script>
        toastr.options.positionClass = 'toast-bottom-right';

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if ($errors->any())
            let errorList = `<ul>`;
            @foreach ($errors->all() as $error)
                errorList += `<li>{{ $error }}</li>`;
            @endforeach
            errorList += `</ul>`;

            toastr.error(errorList, 'Validation Error');
        @endif
    </script>