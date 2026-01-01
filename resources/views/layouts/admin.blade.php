<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Puskesmas Gadang Hanyar</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Puskesmas Gadang</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Laporan Kesehatan</div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('ibu-hamil.index') }}">
                    <i class="fas fa-fw fa-female"></i>
                    <span>Ibu Hamil</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('ibu-bersalin.index') }}">
                    <i class="fas fa-fw fa-baby-carriage"></i>
                    <span>Ibu Bersalin</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('bayi-baru-lahir.index') }}">
                    <i class="fas fa-fw fa-baby"></i>
                    <span>Bayi Baru Lahir</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pasien-hiv.index') }}">
                    <i class="fas fa-fw fa-virus"></i>
                    <span>Layanan HIV</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('terduga-tbc.index') }}">
                    <i class="fas fa-fw fa-lungs"></i>
                    <span>Register TBC</span></a>
            </li>

        </ul>
        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pegawai Puskesmas</span>
                                <i class="fas fa-user-circle fa-2x"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
                </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Puskesmas Gadang Hanyar 2025</span>
                    </div>
                </div>
            </footer>
            </div>
        </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>
</html>