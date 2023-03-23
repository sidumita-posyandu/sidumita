@extends('layouts.app')

@section('content')
<!-- Content Row -->
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Keluarga</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$keluarga}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Anggota Keluarga</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$anggota_keluarga}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Balita</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$balita}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Ibu Hamil</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ibu_hamil}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-xl-5" style="margin-top: 70px; margin-left:50px">
                <div class="text-justify">
                    <strong class="text-success mt-xl-5">Selamat Datang di Dashboard
                        SIDUMITA</strong>
                    <p>SIDUMITA merupakan Sistem Informasi Posyandu Ibu Hamil dan Balita yang dapat membantu kegiatan
                        posyandu
                        dalam
                        melakukan pencatatan pemeriksaan Balita & Ibu Hamil</p>
                    <div class="pull-right">
                        <a class="btn btn-success btn-sm mb-2" href="{{ route('pemeriksaan-balita.index') }}">
                            Lakukan Pemeriksaan</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 text-center">
                <img src="{{asset('img/dashboard.png')}}" alt="" width="300px">
            </div>
        </div>
    </div>
</div>
@endsection