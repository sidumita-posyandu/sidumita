@extends('peserta.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h3>List Ibu Hamil</h3>
            <p>Silahkan pilih ibu hamil yang terdaftar untuk melihat pertumbuhan balita dibawah ini</p>
            <div class="form">
                <div class="form-group">
                    <label for="pilih_balita"><strong>Pilih Balita</strong></label>
                    @foreach($ibu_hamil as $b)
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row" style="padding-left: 20px;">
                                <div class="col-sm-2"><i class="fa-solid fa-person" style="font-size: 30px;"></i>
                                </div>
                                <div class="col-8 mt-1">
                                    <h6 class="mb-1">{{$b['detail_keluarga']['nama_lengkap']}}</h6>
                                </div>
                                <div class="col-sm-2 mt-1">
                                    <a href="{{ route('peserta.periksa-ibuhamil.detail', [$b['id']]) }}"
                                        style="text-decoration: none;"><i
                                            class="fa-solid fa-arrow-up-right-from-square"></i> Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <h3 class="text-center">Artikel</h3>
        </div>
    </div>
</div>
@endsection