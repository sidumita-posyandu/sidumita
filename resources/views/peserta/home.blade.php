@extends('peserta.layouts.app')

@section('content')

<div class="carousel-inner" style="background-color: #bce9ae;">
    <div class="carousel-item active">
        <div class="container">
            <div class="row">
                <div class="col-xl-5" style="margin-top: 70px;">
                    <div class="text-justify">
                        <strong class="text-success mt-xl-5" style="font-size: 40px;">Selamat Datang di
                            SIDUMITA</strong>
                        <p style="font-size: 18px; margin-top: 10px;">SIDUMITA merupakan Sistem Informasi Posyandu Ibu
                            Hamil dan Balita
                            yang dapat membantu
                            kegiatan
                            posyandu
                            dalam
                            melakukan pencatatan pemeriksaan Balita & Ibu Hamil</p>
                        <div class="pull-right">
                            <a class="btn btn-success mb-2" href="#">
                                Cek Pemeriksaan</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1" style="margin-top: 70px;"></div>
                <div class="col-xl-6 col-md-6 text-center">
                    <img src="{{asset('img/dashboard.png')}}" alt="" width="450px">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 35px;">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"><i class="fa-solid fa-stethoscope" style="font-size: 30px;"></i></div>
                        <div class="col-10 mt-1">
                            <h6 class="mb-1">Pemeriksaan Balita</h6>
                            <a href="{{ route('peserta.periksa.index') }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"><i class="fa-solid fa-stethoscope" style="font-size: 30px;"></i></div>
                        <div class="col-10 mt-1">
                            <h6 class="mb-1">Pemeriksaan Ibu Hamil</h6>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"><i class="fa-solid fa-bars-progress" style="font-size: 30px;"></i></div>
                        <div class="col-10 mt-1">
                            <h6 class="mb-1">Data Keluarga</h6>
                            <a href="{{ route('peserta.keluarga.index') }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"><i class="fa-solid fa-user" style="font-size: 30px;"></i></div>
                        <div class="col-10 mt-1">
                            <h6 class="mb-1">Profil Saya</h6>
                            <a href="#" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h2>Berita</h2>
    <div id="berita">
        <div class="row">
            <div class="col-xl-6 col-md-6 text-center">
                <img src="{{asset('img/dashboard.png')}}" alt="" width="450px">
            </div>
            <div class="col-xl-6 col-md-6">
                <h4>Contoh berita</h4>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod repudiandae, eos cum ea vitae, labore
                impedit iste vel voluptates minima tempore dolores natus deserunt facilis atque sed dolorum temporibus
                dolorem laboriosam, ducimus ratione quia unde culpa quis! Dignissimos voluptates quos consequuntur nam
                dolorem temporibus incidunt animi possimus. Explicabo iste sint ab qui! Fugit accusamus explicabo
                consequuntur quae, necessitatibus accusantium ad voluptates, veritatis similique mollitia voluptatem.
                Esse?
            </div>
        </div>
    </div>
</div>

<footer class="text-center text-lg-start text-white" style="background-color: #013220">
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
                        Useful links
                    </h6>
                    <p>
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
                    </p>
                </div>

                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                    <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                    <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                    <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
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


@endsection