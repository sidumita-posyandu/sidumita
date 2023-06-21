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
        <div class="col-xl-4 col-md-6 mb-4">
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
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2"><i class="fa-solid fa-stethoscope" style="font-size: 30px;"></i></div>
                        <div class="col-10 mt-1">
                            <h6 class="mb-1">Pemeriksaan Ibu Hamil</h6>
                            <a href="{{ route('peserta.periksa-ibuhamil.index') }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
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
    </div>
</div>

<div class="container">
    <h2>Berita</h2>
    <div id="berita">
        <div class="row">
            @if($datakonten == 404)
            <p>Berita belum tersedia</p>
            @else
            @foreach($datakonten as $konten)
            <div class="col-sm-4">
                <div class="card mt-2 border-0">
                    <div class="card-body">
                    <img src="{{$konten['image']}}" class="card-img-top mb-2">
                        <a href="{{ route('peserta.konten.show', $konten['id']) }}" style="text-decoration:none; color:black;"><h4 class="card-title">{{$konten['judul']}}</h4></a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection