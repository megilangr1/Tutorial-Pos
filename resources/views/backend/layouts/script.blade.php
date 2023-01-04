<!-- jQuery -->
<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>

<!-- Ekko Lightbox -->
<script src="{{ asset('assets') }}/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<!-- AdminLTE App -->
<script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>


{{-- <script>
  toastr.options.onShown = function() { console.log('hello'); }
</script> --}}

<script>
  $(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      alwaysShowClose: true
    });
  });
</script>

@if (session()->has('success'))
  <script>
    toastr.success("{!! session('success') !!}", "Berhasil", {timeOut: 10000});
  </script>
@endif

@if (session()->has('info'))
  <script>
    toastr.info("{!! session('info') !!}", "Pemberitahuan", {timeOut: 10000});
  </script>
@endif

@if (session()->has('warning'))
  <script>
    toastr.warning("{!! session('warning') !!}", "Peringatan", {timeOut: 10000});
  </script>
@endif

@if (session()->has('error'))
  <script>
    toastr.error("{!! session('error') !!}", "Kesalahan", {timeOut: 10000});
  </script>
@endif

@livewireScripts
<script>
  Livewire.on('success', data => {
    toastr.success(data, "Berhasil");
  });

  Livewire.on('info', data => {
    toastr.info(data, "Pemberitahuan");
  });

  Livewire.on('warning', data => {
    toastr.warning(data, "Peringatan !");
  });

  Livewire.on('error', data => {
    toastr.error(data, "Kesalahan !!");
  });
</script>



@yield('script')
@stack('script')