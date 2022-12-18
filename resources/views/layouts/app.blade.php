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
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-3">SIDUMITA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
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
                        <a class="collapse-item" href="#">Ibu Hamil</a>
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
                <a class="nav-link" href="#">
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
                        <h6 class="collapse-header">Balita</h6>
                        <a class="collapse-item" href="{{ route('pemeriksaan-balita.index') }}">Pemeriksaan Balita</a>
                        <a class="collapse-item" href="#">Imunisasi Balita</a>
                        <h6 class="collapse-header">Ibu Hamil</h6>
                        <a class="collapse-item" href="#">Pemeriksaan Ibu Hamil</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manajemen Akun
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAccount"
                    aria-expanded="true" aria-controls="collapseAccount">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Akun</span>
                </a>
                <div id="collapseAccount" class="collapse" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Users</a>
                        <a class="collapse-item" href="#">Roles</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
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


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
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

    <!-- Page level custom scripts -->
    <script src="{{ asset('admin2/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin2/js/demo/chart-pie-demo.js') }}"></script>

    <script src="{{ asset('admin2/jquery-2.1.4.js') }}"></script>
    <script>
    $(document).ready(function() {
        $(this).on('click', '.remove', function() {
            $(this).parent().parent().parent().remove();
        });
        $(".add-keluarga").click(function() {
            $(".keluarga").append(
                '<div><div class="card"><div class="card-header font-weight-bold">Detail Keluarga</div><div class="row m-2"><div class="col-sm-6"><div class="form-group"><strong>NIK:</strong><input type="text" name="nik[]" class="form-control" placeholder="NIK"></div></div><div class="col-sm-6"><div class="form-group"><strong>Nama Lengkap:</strong><input type="text" name="nama_lengkap[]" class="form-control" placeholder="Nama Lengkap"></div></div><div class="col-sm-6"><div class="form-group"><strong>Jenis Kelamin:</strong><input type="text" name="jenis_kelamin[]" class="form-control" placeholder="Jenis Kelamin"></div></div><div class="col-sm-6"><div class="form-group"><strong>Tempat Lahir:</strong><input type="text" name="tempat_lahir[]" class="form-control" placeholder="Tempat Lahir"></div></div><div class="col-sm-6"><div class="form-group"><strong>Tanggal Lahir:</strong><input type="text" name="tanggal_lahir[]" class="form-control" placeholder="Tanggal Lahir"></div></div><div class="col-sm-6"><div class="form-group"><strong>Agama:</strong><input type="text" name="agama[]" class="form-control" placeholder="Agama"></div></div><div class="col-sm-6"><div class="form-group"><strong>Pendidikan:</strong><input type="text" name="pendidikan[]" class="form-control" placeholder="Pendidikan Terakhir"></div></div><div class="col-sm-6"><div class="form-group"><strong>Golongan Darah:</strong><input type="text" name="golongan_darah[]" class="form-control" placeholder="Golongan Darah"></div></div><div class="col-sm-6"><div class="form-group"><strong>Jenis Pekerjaan:</strong><input type="text" name="jenis_pekerjaan[]" class="form-control" placeholder="Jenis Pekerjaan"></div></div><div class="col-sm-6"><div class="form-group"><strong>Status Perkawinan:</strong><input type="text" name="status_perkawinan[]" class="form-control" placeholder="Status Perkawinan"></div></div><div class="col-sm-6"><div class="form-group"><strong>Status dalam Keluarga:</strong><input type="text" name="status_dalam_keluarga[]" class="form-control" placeholder="Status dalam Keluarga"></div></div><div class="col-sm-6"><div class="form-group"><strong>kewarganegaraan:</strong><input type="text" name="kewarganegaraan[]" class="form-control" placeholder="kewarganegaraan"></div></div><div class="col-sm-6"><div class="form-group"><strong>No Telepon:</strong><input type="text" name="no_telp[]" class="form-control" placeholder="No Telepon"></div></div></div><div class="card-footer"><div class="form-group"><button type="button" class="btn btn-danger remove" style="float: right;"><i class="fas fa-trash mr-1"></i>Hapus Data Keluarga</button></div></div></div></div>'
            );
        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#nama_balita').on('change', function() {
            var nama_balita = $("#nama_balita").val();

            $.ajax
        });
    });
    </script>

</body>

</html>