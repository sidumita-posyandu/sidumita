@extends('peserta.layouts.app')

@section('content')

<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">

        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Selamat datang di SIDUMITA</h1>
                <hr class="divider devider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">SIDUMITA merupakan Sistem Informasi Posyandu Ibu Hamil dan Balita yang
                    dapat membantu kegiatan posyandu dalam melakukan pencatatan pemeriksaan Balita & Ibu Hamil</p>
                <a class="btn btn-success btn-xl" href="#about">Find Out More</a>
            </div>
            <h6 class="text-center ml-3 text-white">Website masih dalam pengerjaan. Silahkan untuk ke <a
                    href="/admin">Menu
                    Admin</a> untuk
                masuk ke
                bagian Admin</h6>
        </div>
    </div>
</header>
<!-- About-->
<section class="page-section bg-primary" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="text-white mt-0">We've got what you need!</h2>
                <hr class="divider divider-light" />
                <p class="text-white-75 mb-4">Start Bootstrap has everything you need to get your new website up and
                    running in no time! Choose one of our open source, free to download, and easy to use themes! No
                    strings attached!</p>
                <a class="btn btn-light btn-xl" href="#services">Get Started!</a>
            </div>
        </div>
    </div>
</section>

@endsection