<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Puskesmas Gadang Hanyar</title>

    {{-- Asset CSS --}}
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        /* =========================
   TEMA PINK SB ADMIN 2
   ========================= */

        /* Sidebar */
        .sidebar {
            background: linear-gradient(180deg, #ec4899, #f472b6) !important;
        }

        /* Brand */
        .sidebar .sidebar-brand {
            background: rgba(255, 255, 255, 0.15);
            font-weight: bold;
        }

        /* Menu */
        .sidebar .nav-item .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            transition: 0.3s;
        }

        .sidebar .nav-item .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
        }

        /* Active Menu */
        .sidebar .nav-item.active .nav-link {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 8px;
            font-weight: bold;
        }

        /* Sidebar Divider */
        .sidebar hr.sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Topbar */
        .topbar {
            background: linear-gradient(90deg, #ffe4ec, #fff) !important;
        }

        /* Username */
        .topbar .text-gray-600 {
            color: #ec4899 !important;
            font-weight: 600;
        }

        /* Button Primary */
        .btn-primary {
            background: linear-gradient(to right, #ec4899, #f472b6) !important;
            border: none !important;
        }

        .btn-primary:hover {
            opacity: 0.9;
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.4);
        }

        /* Card */
        .card {
            border-radius: 15px !important;
            box-shadow: 0 8px 25px rgba(236, 72, 153, 0.15) !important;
        }

        /* Card Header */
        .card-header {
            background: #ffe4ec !important;
            color: #b4235a !important;
            font-weight: bold;
        }

        /* Table Hover */
        .table tbody tr:hover {
            background: #fff0f5 !important;
        }

        /* Footer */
        .sticky-footer {
            background: #fff0f5 !important;
        }

        /* Scroll Top */
        .scroll-to-top {
            background: #ec4899 !important;
        }

        .scroll-to-top:hover {
            background: #db2777 !important;
        }

        /* Modal Header */
        .modal-header {
            background: #ffe4ec;
            color: #b4235a;
        }

        /* Dropdown */
        .dropdown-menu {
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(236, 72, 153, 0.2);
        }

        /* Form Focus */
        .form-control:focus {
            border-color: #ec4899 !important;
            box-shadow: 0 0 0 0.2rem rgba(236, 72, 153, 0.25) !important;
        }

        /* Badge */
        .badge-primary {
            background: #ec4899 !important;
        }
    </style>

</head>

<body id="page-top">

    <div id="wrapper">

        {{-- SIDEBAR --}}
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-hospital"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Puskesmas Gadang</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">

            {{-- MENU ADMIN (Hanya Tampil Jika Login sebagai Admin) --}}
            @if(auth()->user()->level == 'admin')
            <div class="sidebar-heading">Admin Area</div>
            <li class="nav-item {{ request()->is('pegawai*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pegawai.index') }}">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Kelola Pegawai</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            @endif

            {{-- MENU KHUSUS KEPALA (Laporan Keseluruhan) --}}
            @if(auth()->user()->level == 'kepala' || auth()->user()->level == 'admin')
            <div class="sidebar-heading">Laporan Eksekutif</div>
            <li class="nav-item {{ request()->routeIs('laporan.keseluruhan') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('laporan.keseluruhan') }}">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Rekapitulasi Data</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            @endif

            <div class="sidebar-heading">Laporan Kesehatan</div>


            <li class="nav-item {{ request()->is('ibu-hamil*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ibu-hamil.index') }}">
                    <i class="fas fa-fw fa-female"></i>
                    <span>Ibu Hamil</span></a>
            </li>

            <li class="nav-item {{ request()->is('ibu-bersalin*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('ibu-bersalin.index') }}">
                    <i class="fas fa-fw fa-baby-carriage"></i>
                    <span>Ibu Bersalin</span></a>
            </li>

            <li class="nav-item {{ request()->is('bayi-baru-lahir*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('bayi-baru-lahir.index') }}">
                    <i class="fas fa-fw fa-baby"></i>
                    <span>Bayi Baru Lahir</span></a>
            </li>

            <li class="nav-item {{ request()->is('pasien-hiv*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pasien-hiv.index') }}">
                    <i class="fas fa-fw fa-virus"></i>
                    <span>Layanan HIV</span></a>
            </li>

            <li class="nav-item {{ request()->is('terduga-tbc*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('terduga-tbc.index') }}">
                    <i class="fas fa-fw fa-lungs"></i>
                    <span>Register TBC</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            {{-- Tombol Perkecil Sidebar --}}
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        {{-- END SIDEBAR --}}

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                {{-- TOPBAR --}}
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        {{-- USER INFORMATION & LOGOUT --}}
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->name ?? 'User' }}
                                    <small class="text-muted">({{ ucfirst(Auth::user()->level ?? '') }})</small>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ Auth::user()->foto ? asset('storage/profile/' . Auth::user()->foto) : asset('img/user.jpeg') }}">


                            </a>

                            {{-- Dropdown Menu --}}
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                {{-- END TOPBAR --}}

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

    {{-- SCROLL TO TOP --}}
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- LOGOUT MODAL --}}
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" di bawah jika Anda ingin mengakhiri sesi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>

                    {{-- Form Logout --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    @stack('scripts')

</body>

</html>