<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Dashboard')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/templates/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/templates/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/templates/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/templates/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/templates/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/templates/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/templates/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/templates/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/templates/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/templates/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        @include('components.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('components.sidebar')

        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/templates/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/templates/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/templates/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/templates/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/templates/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/templates/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/templates/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/templates/plugins/moment/moment.min.js"></script>
    <script src="/templates/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/templates/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/templates/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/templates/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/templates/dist/js/adminlte.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="/templates/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/templates/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/templates/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/templates/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="/templates/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/templates/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="/templates/plugins/jszip/jszip.min.js"></script>
    <script src="/templates/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="/templates/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="/templates/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="/templates/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="/templates/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        // penghilang alert
                document.addEventListener("DOMContentLoaded", function () {
                  const alertNode = document.querySelector('.alert-dismissible');
                  if (alertNode) {
                    // Set timer 3 detik
                    setTimeout(() => {
                      alertNode.classList.remove('show');
                      alertNode.classList.add('hide');
                      setTimeout(() => alertNode.remove(), 500);
                    }, 3000);
                  }
                });
    </script>
    @stack('scripts')
</body>

</html>