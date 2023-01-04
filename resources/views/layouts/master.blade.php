<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">

<!-- Toastr -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/css/select2.min.css">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- Ekko Lightbox -->
<link rel="stylesheet" href="{{ asset('assets') }}/plugins/ekko-lightbox/ekko-lightbox.css">

<style>
    .borad {
        border-radius: 0px !important;
    }

    .hr-title {
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid #918383;
    }

    .box-invalid {
        border: 1px solid #dc3545;
        color: #dc3545;
    }

    .input-group:not(.has-validation)>.form-control:not(:last-child) {
        border-top-right-radius: 4px !important;
        border-bottom-right-radius: 4px !important;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #2a2a2a !important;
        border: 1px solid #aaa !important;
        padding-left: 5px;
        padding-right: 5px;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 38px !important;
    }

    .invalid-border {
        border: 1px solid #dc3545 !important;
        border-radius: 0.3rem !important;
    }

    .nav-tabs {
        border-bottom: 1px solid #4a4a4a75 !important;
    }

    .nav-tabs .nav-link {
        border: 1px solid #0000001f !important;
        border-radius: 0px !important;
        background-color: #fff !important;
    }

    .small-nav-link {
        padding: 6px 10px !important;
        font-size: 15px !important;
    }
</style>

    <script>
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode != 46 && charCode > 31  && (charCode < 48 || charCode > 57)) {
        return false;
        }
        return true;
    }
    </script>

    <script type="text/javascript">
    function formatRupiah(evt){
        var angka = evt.target.value;
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
        }

        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return evt.target.value = rupiah;
    }
    </script>

    @livewireStyles

    @yield('css')
    @stack('css')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
            @include('layouts.navbar')
        <!-- /navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid py-2">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /content -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
            Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>
