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
{{-- error masage --}}
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


{{-- image _name --}}
<script>
    document.getElementById('file-image').addEventListener('change', function(e) {
        const out = document.getElementById('thumb-output');
        out.innerHTML = '';
        if (!e.target.files.length) return;

        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = ev => {
            out.innerHTML = `<img 
      src="${ev.target.result}" 
      class="img-thumbnail" 
      style="max-width:150px; height:auto; margin:5px;"
    >`;
        };
        reader.readAsDataURL(file);
    });
</script>
