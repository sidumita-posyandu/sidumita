@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pemeriksaan Ibu Hamil</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('pemeriksaan-ibuhamil.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
        </div>
    </div>
</div>


@if ($errors->any())
<div class="alert alert-danger">
    Terjadi kusunlahan dengan input yang dimasukan.<br><br>
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
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama Ibu Hamil:</strong>
                    <input type="text" name="tanggal_pemeriksaan" class="form-control"
                        value="{{ $pemeriksaanibuhamil['nama_lengkap'] }}" disabled>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Tanggal Pemeriksaan:</strong>
                    <input type="text" name="tanggal_pemeriksaan" class="form-control"
                        value="{{ $pemeriksaanibuhamil['tanggal_pemeriksaan'] }}" disabled>
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
                        <input type="number" name="berat_badan" class="form-control"
                            value="{{ $pemeriksaanibuhamil['berat_badan'] }}" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Tinggi Badan (Cm):</strong>
                        <input type="number" name="tinggi_badan" class="form-control"
                            value="{{ $pemeriksaanibuhamil['tinggi_badan'] }}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Lingkar Perut (Cm):</strong>
                        <input type="number" name="lingkar_perut" class="form-control"
                            value="{{ $pemeriksaanibuhamil['lingkar_perut'] }}" disabled>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <strong>Denyut Nadi:</strong>
                        <input type="number" name="denyut_nadi" class="form-control"
                            value="{{ $pemeriksaanibuhamil['denyut_nadi'] }}" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <strong>Keluhan:</strong>
                <input type="text" name="keluhan" class="form-control" value="{{ $pemeriksaanibuhamil['keluhan'] }}"
                    disabled></input>
            </div>
            <div class="form-group">
                <strong>Penanganan:</strong>
                <input type="text" name="penanganan" class="form-control"
                    value="{{ $pemeriksaanibuhamil['penanganan'] }}" disabled></input>
            </div>
            <div class="form-group">
                <strong>Catatan Khusus:</strong>
                <input type="text" name="catatan" class="form-control" value="{{ $pemeriksaanibuhamil['catatan'] }}"
                    disabled></input>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
</form>
@endsection