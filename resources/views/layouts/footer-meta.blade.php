<script src="{{ asset('back_end/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('back_end/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('back_end/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('back_end/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('back_end/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('back_end/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('back_end/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('back_end/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('back_end/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('back_end/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('back_end/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('back_end/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('back_end/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back_end/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('back_end/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('back_end/dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('back_end/dist/js/pages/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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



<script>
    //image input show image by abed
    $(document).ready(function() {
        $('#file-image').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                $('#thumb-output').html(''); //clear html of output element
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img />').addClass('thumb').attr('src',
                                    e.target.result); //create image element
                                $('#thumb-output').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>
