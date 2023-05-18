@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pemeriksaan Balita</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('pemeriksaan-balita.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
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

<form action="{{ route('pemeriksaan-balita.store') }}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header font-weight-bold">
            Data balita
        </div>
        <div class="row m-2">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Nama balita:</strong>
                    <input type="text" name="balita_id" class="form-control"
                        value="{{ $balita['id'] }}" hidden>
                    <input type="text" name="nama_balita" class="form-control-plaintext"
                        value="{{ $balita['detail_keluarga']['nama_lengkap'] }}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <input type="text" name="jenis_kelamin" class="form-control-plaintext"
                        value="{{ $balita['detail_keluarga']['jenis_kelamin'] }}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Umur Balita (bulan):</strong>
                    <input type="text" name="nama_balita" class="form-control-plaintext"
                        value="{{ $umur['usia_bulan'] }} bulan" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Tanggal Pemeriksaan:</strong>
                    <input type="text" name="tanggal_pemeriksaan" class="form-control-plaintext"
                        value="{{ $tanggal_pemeriksaan }}" readonly>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="card shadow mt-3">
                <div class="card-header font-weight-bold">
                    Data Pemeriksaan
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Berat Badan (Kg):</strong>
                                <input type="text" name="berat_badan" class="form-control" placeholder="Berat Badan">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Tinggi Badan (Cm):</strong>
                                <input type="text" name="tinggi_badan" class="form-control" placeholder="Tinggi Badan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Lingkar Kepala (Cm):</strong>
                                <input type="text" name="lingkar_kepala" class="form-control"
                                    placeholder="Lingkar Kepala">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Lingkar Lengan (Cm):</strong>
                                <input type="text" name="lingkar_lengan" class="form-control"
                                    placeholder="Lingkar Lengan">
                            </div>
                        </div>
                    </div>
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
                    <div class="form-group">
                        <select class="form-control" id="vitamin" name="vitamin_id">
                            <option value="" selected disabled>-- Pilih Dokter / Bidan --</option>
                            @foreach ($dokter as $d)
                            <option value="{{ $d['id'] }}">{{ $d['nama_dokter'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="petugas_kesehatan_id" class="form-control" value="1">
                    <input type="hidden" name="dokter_id" class="form-control" value="1">
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow mt-3">
                <div class="card-header font-weight-bold">
                    Dokter / Bidan
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" id="dokter" name="dokter_id">
                            <option value="" selected disabled>-- Pilih Dokter / Bidan --</option>
                            @foreach ($dokter as $d)
                            <option value="{{ $d['id'] }}">{{ $d['nama_dokter'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="card shadow mt-3">
                <div class="card-header font-weight-bold">
                    Data Imunisasi
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="radio" name="vaksin" value="sama" class="detail" checked> Tidak Vaksin
                        <input type="radio" name="vaksin" value="berbeda" class="detail ml-5"> Lakukan Vaksin
                        <div id="form-input" class="mt-3">
                            <strong>Jenis Vaksin</strong>
                            @foreach($vaksin as $listvaksin)
                            <div class="form-check form-check-solid">
                                <input class="form-check-input" type="checkbox" name="vaksin_id[]"
                                    value="{{ $listvaksin['id'] }}">
                                <label class="form-check-label">{{ $listvaksin['nama_vaksin'] }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
</form>
@endsection