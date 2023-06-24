@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pemeriksaan Ibu Hamil</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('pemeriksaan-ibuhamil.index') }}"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
        </div>
    </div>
</div>


@if ($errors->any())
<div class="alert alert-danger">
    Terjadi kesalahan dengan input yang dimasukan.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('pemeriksaan-ibuhamil.store') }}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header font-weight-bold">
            Data Ibu Hamil
        </div>
        <div class="row m-2">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Nama Ibu Hamil:</strong>
                    <input type="text" name="ibu_hamil_id" class="form-control" value="{{ $ibuhamil['id'] }}" hidden>
                    <input type="text" name="nama_ibu_hamil" class="form-control-plaintext" value="{{ $ibuhamil['detail_keluarga']['nama_lengkap'] }}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Tanggal Pemeriksaan:</strong>
                    <input type="text" name="tanggal_pemeriksaan" class="form-control-plaintext" value="{{ $tanggal_pemeriksaan }}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Umur Kandungan (dalam Minggu):</strong>
                    <input type="number" name="umur_kandungan" class="form-control" placeholder="Umur Kandungan" required>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mt-3">
        <div class="card-header font-weight-bold">
            Data Pemeriksaan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Berat Badan (Kg):</strong>
                        <input type="text" name="berat_badan" class="form-control" placeholder="Berat Badan" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Tinggi Badan (Cm):</strong>
                        <input type="text" name="tinggi_badan" class="form-control" placeholder="Tinggi Badan" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Lingkar Perut (Cm):</strong>
                        <input type="text" name="lingkar_perut" class="form-control" placeholder="Lingkar Perut" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Denyut Nadi (Bpm):</strong>
                        <input type="text" name="denyut_nadi" class="form-control" placeholder="Denyut Nadi" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Denyut Jantung Bayi (Bpm):</strong>
                        <input type="text" name="denyut_jantung_bayi" class="form-control" placeholder="Denyut Jantung Bayi" required>
                    </div>
                </div>
            </div>
            <p class="text-danger" style="font-size: 12px;">Gunakan "." untuk angka desimal (contoh 2.25)</p>
            <div class="form-group">
                <strong>Keluhan:</strong>
                <input type="text" name="keluhan" class="form-control" placeholder="Keluhan"></input>
            </div>
            <div class="form-group">
                <strong>Penanganan:</strong>
                <input type="text" name="penanganan" class="form-control" placeholder="Penanganan"></input>
            </div>
            <div class="form-group">
                <strong>Catatan Khusus:</strong>
                <input type="text" name="catatan" class="form-control" placeholder="Catatan Khusus"></input>
            </div>
            @if(Session::get('userAuth')['role_id'] != 3)
            <input type="hidden" name="petugas_kesehatan_id" class="form-control" value="1">
            @elseif(Session::get('userAuth')['role_id'] == 3)
            <input type="hidden" name="petugas_kesehatan_id" class="form-control" value="{{Session::get('userAuth')['id']}}">
            @endif
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
</form>
@endsection