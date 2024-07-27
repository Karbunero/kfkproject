<!DOCTYPE html>
<!-- This is a starter template page. Use this page to start your new project
from scratch. This page gets rid of all links and provides the needed markup
only. -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Flobamora Film Festival</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin') }}/dist/css/adminlte.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin') }}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin') }}/dist/js/demo.js"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset('admin') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- leftlet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.css">

    <!-- Tambahkan library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    {{-- <script>
                window.select2_06aec143 = {
                "allowClear": true,
                "theme": "krajee-bs3",
                "width": "100%",
                "placeholder": "Pilih Tempat Terbit",
                "language": "en-US"
            };
</script> --}}

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
                <a href="#" class="nav-link">

                    <h4>Flobamora Film Festival</h4>

                </a>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/logout">
                        <i class="fa fa-sign"></i>
                        logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/admin/index" class="nav-link {{ Request::is('admin/index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                {{-- <img src="{{ asset('admin') }}/dist/img/logo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
                <span class="brand-text font-weight-light">
                    Flobamora Film Festival</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    {{-- <div class="image">
                            <img
                                src="{{ asset('admin') }}/dist/img/logo.png"
                                class="img-circle elevation-2"
                                alt="User Image">
                        </div> --}}
                    <div class="info">
                        <a href="#" class="d-block">
                            <h2>
                                @php $user = auth()->guard('admin')->user(); @endphp

                                {{ $user->name ?? '' }}
                            </h2>
                        </a>
                    </div>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any
                            other icon font library -->
                        <li class="nav-item">
                            <a href="/admin/beranda" class="nav-link {{ Request::is('admin/beranda') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/program" class="nav-link {{ Request::is('admin/program') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Program
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/film" class="nav-link {{ Request::is('admin/film') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-film"></i>
                                <p>
                                    Film
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/penghargaan"
                                class="nav-link {{ Request::is('admin/penghargaan') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-trophy"></i>
                                <p>
                                    Penghargaan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/jadwal" class="nav-link {{ Request::is('admin/jadwal') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Jadwal
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/admin" class="nav-link {{ Request::is('admin/admin*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Admin
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item"> <a href="/admin/user" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}"> <i class="nav-icon fas
                            fa-users"></i> <p> User </p> </a> </li> -->
                        {{-- <li class="nav-item">
                                <a
                                    href="/admin/bakumpul"
                                    class="nav-link {{ Request::is('admin/bakumpul*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>
                                        Bakumpul
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    href="/admin/formulir2"
                                    class="nav-link {{ Request::is('admin/formulir2*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>
                                        Formulir 2
                                    </p>
                                </a>
                            </li> --}}
                        <li class="nav-item">
                            <a href="/admin/banner"
                                class="nav-link {{ Request::is('admin/banner*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Banner
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/artikel"
                                class="nav-link {{ Request::is('admin/artikel*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Artikel
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">{{ $title }}</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6"></div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">

                @yield('content')

                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->
    <!-- Summernote -->
    <script src="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(function() {
            // Inisialisasi Summernote dengan konfigurasi
            $('.textarea').summernote({
                toolbar: [
                    [
                        'style',
                        [
                            'bold', 'italic', 'underline', 'clear'
                        ]
                    ],
                    [
                        'para',
                        [
                            'ul', 'ol'
                        ]
                    ],
                    [
                        'insert', ['link']
                    ],
                    [
                        'view', ['fullscreen']
                    ]
                ],
                buttons: {
                    picture: function(context) {
                        return false;
                    },
                    video: function(context) {
                        return false;
                    }
                }
            });
        });
    </script>
    <script>
        window.setTimeout(function() {
            $(".alert")
                .fadeTo(500, 0)
                .slideUp(500, function() {
                    $(this).remove();
                });
        }, 3000)
    </script>
    <script>
        // $(function() {    $('#example1').DataTable({     responsive: false,
        // autoWidth: false,     scrollX: true,     paging: false,     info: false,
        // scrollY: '300px'  Ganti dengan tinggi yang diinginkan, seperti '300px' atau
        // '50vh'             });             $('#example2').DataTable({ "paging": true,
        // "lengthChange": false, "searching": false,                 "ordering": true,
        // "info": true,                 "autoWidth": false, "responsive": true }); });

        $(function() {
            $('#example1').DataTable({
                responsive: true,
                autoWidth: false
            });
        });
    </script>
    {{--
        <script>
            {
                        "id": "monografi-tempat_terbit",
                        "name": "tempat_terbit",
                        "container": ".field-monografi-tempat_terbit",
                        "input": "#monografi-tempat_terbit",
                        "error": ".help-block.help-block-error",
                        "validate": function (attribute, value, messages, deferred, $form) {
                            yii
                                .validation
                                .required(value, messages, {"message": "Tempat Terbit cannot be blank."});
                            yii
                                .validation
                                .string(value, messages, {
                                    "message": "Tempat Terbit must be a string.",
                                    "skipOnEmpty": 1
                                });
                        }
                    }
        </script> --}}

</body>

</html>
