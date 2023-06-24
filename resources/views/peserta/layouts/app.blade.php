<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sidumita</title>
    <script src="https://kit.fontawesome.com/99dcb148aa.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="border-bottom:1px solid #E0E0E0; background-color: #fff;">
        <div class="container">
            <a class="navbar-brand" href="/"><strong class="text-success">SIDUMITA</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/"><strong>Home</strong></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Cek Kesehatan</strong>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('peserta.periksa.index') }}">Pemeriksaan
                                        Balita</a></li>
                                <li><a class="dropdown-item" href="{{ route('peserta.periksa-ibuhamil.index') }}">Pemeriksaan Ibu Hamil</a></li>
                            </ul>
                        </li>
                        @if(Session::get('token'))
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><strong>Profil</strong>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('peserta.keluarga.index')}}">Data
                                        Keluarga</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                    <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        </li>
                        @endif
                        @if(!Session::get('token'))
                        <li class="nav-item">
                            <a href="{{route('login')}}" type="button" class="btn btn-success">Login</a>
                            <!-- <a href="#" type="button" class="btn btn-outline-secondary">Register</a> -->
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <footer class="text-center text-lg-start text-white mt-5" style="background-color: #013220">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-6 col-xl-6 mx-auto mt-3">
                        <h4 class="text-uppercase mb-4 font-weight-bold">
                            SIDUMITA
                        </h4>
                        <p>
                            SIDUMITA merupakan Sistem Informasi Posyandu Ibu Hamil dan Balita <br> yang dapat membantu
                            kegiatan
                            posyandu dalam melakukan pencatatan pemeriksaan Balita & Ibu Hamil
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            <!-- Useful links -->
                        </h6>
                        <!-- <p>
                            <a class="text-white">Your Account</a>
                        </p>
                        <p>
                            <a class="text-white">Become an Affiliate</a>
                        </p>
                        <p>
                            <a class="text-white">Shipping Rates</a>
                        </p>
                        <p>
                            <a class="text-white">Help</a>
                        </p> -->
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Kontak</h6>
                        <p><i class="fas fa-envelope mr-3"></i> sidumita.posyandu@gmail.com</p>
                        <!-- <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p> -->
                    </div>
                    <!-- Grid column -->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-3">

            <!-- Section: Copyright -->
            <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8 text-center text-md-start">
                        <!-- Copyright -->
                        <div class="p-1" style="font-size: 10px;">
                            © 2022 Copyright:
                            <a class="text-white" href="/">SIDUMITA</a>
                        </div>
                        <!-- Copyright -->
                    </div>
                    <!-- Grid column -->
                </div>
            </section>
            <!-- Section: Copyright -->
        </div>
        <!-- Grid container -->
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    @yield('script')
</body>

</html>