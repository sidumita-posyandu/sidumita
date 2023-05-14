<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SIDUMITA</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('link')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @if(Session::get('userAuth')['role_id'] != 4)
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
                <div class="sidebar-brand-text mx-3">SIDUMITA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if(Session::get('userAuth')['role_id'] == 1)
            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Domisili</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('provinsi.index') }}">Provinsi</a>
                        <a class="collapse-item" href="{{ route('kabupaten.index') }}">Kabupaten</a>
                        <a class="collapse-item" href="{{ route('kecamatan.index') }}">Kecamatan</a>
                        <a class="collapse-item" href="{{ route('desa.index') }}">Desa</a>
                        <a class="collapse-item" href="{{ route('dusun.index') }}">Dusun</a>
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Ibu Hamil dan Balita</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('keluarga.index') }}">Keluarga</a>
                        <a class="collapse-item" href="{{ route('balita.index') }}">Balita</a>
                        <a class="collapse-item" href="{{ route('ibu-hamil.index') }}">Ibu Hamil</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseImunisasi"
                    aria-expanded="true" aria-controls="collapseImunisasi">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Jenis Imunisasi</span>
                </a>
                <div id="collapseImunisasi" class="collapse" aria-labelledby="headingImunisasi"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('vaksin.index') }}">Vaksin</a>
                        <a class="collapse-item" href="{{ route('vitamin.index') }}">Vitamin</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Layanan
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jadwal-pemeriksaan.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Penjadwalan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePemeriksaan"
                    aria-expanded="true" aria-controls="collapsePemeriksaan">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pemeriksaan</span>
                </a>
                <div id="collapsePemeriksaan" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('pemeriksaan-balita.index') }}">Pemeriksaan Balita</a>
                        <a class="collapse-item" href="{{ route('pemeriksaan-ibuhamil.index') }}">Pemeriksaan Ibu
                            Hamil</a>
                    </div>
                </div>
            </li>

            @if(Session::get('userAuth')['role_id'] == 1)

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Manajemen Akun
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
                    aria-expanded="true" aria-controls="collapseAccount">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Akun</span>
                </a>
                <div id="collapseAccount" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
                        <a class="collapse-item" href="#">Roles</a>
                    </div>
                </div>
            </li>

            @endif

            <hr class="sidebar-divider d-none d-md-block">

            @if(Session::get('userAuth')['role_id'] == 3)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('petugas.profile') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        @endif
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Session::get('userAuth')['name']}}
                                    @if(Session::get('userAuth')['role_id'] == 1)
                                    (Super Admin)
                                    @elseif(Session::get('userAuth')['role_id'] == 2)
                                    (Operator Posyandu)
                                    @elseif(Session::get('userAuth')['role_id'] == 3)
                                    (Petugas Kesehatan)
                                    @elseif(Session::get('userAuth')['role_id'] == 4)
                                    (Peserta)
                                    @endif
                                    </label>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid mb-4">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin2/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('admin2/vendor/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#nama_balita').on('change', function() {
            var nama_balita = $("#nama_balita").val();

            $.ajax
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#form-input").css("display", "none");
        $(".detail").click(
            function() { //Memberikan even ketika class detail di klik (class detail ialah class radio button)
                if ($("input[name='alamat']:checked").val() ==
                    "berbeda") { //Jika radio button "berbeda" dipilih maka tampilkan form-inputan
                    $("#form-input").slideDown("fast"); //Efek Slide Down (Menampilkan Form Input)
                } else {
                    $("#form-input").slideUp("fast"); //Efek Slide Up (Menghilangkan Form Input)
                }
            });
    });
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
    $(function() {
        $("#datepicker").datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
    </script>

    @yield('script')
</body>

</html>