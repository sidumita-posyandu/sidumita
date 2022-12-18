@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pemeriksaan Balita</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('pemeriksaanbalita.index') }}"><i
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

<form action="{{ route('pemeriksaanbalita.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header font-weight-bold">
            Data balita
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama balita:</strong>
                    <select name="balita_id" id="balita_id" class="form-control">
                        <option value="" selected disabled>-- Pilih Balita --</option>
                        @foreach($balita as $listbalita)
                        <option value="{{ $listbalita->id }}">{{ $listbalita->nama_balita }} -
                            {{ $listbalita->jenis_kelamin }} -
                            {{ $listbalita->tanggal_lahir }} - {{ $listbalita->nama_ibu }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Tanggal Pemeriksaan:</strong>
                    <input type="text" name="tanggal_pemeriksaan" class="form-control"
                        placeholder="Tanggal Pemeriksaan">
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header font-weight-bold">
            Data Pemeriksaan
        </div>
        <div class="card-body">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Berat Badan:</strong>
                    <input type="text" name="berat_badan" class="form-control" placeholder="Berat Badan">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Tinggi Badan:</strong>
                    <input type="text" name="tinggi_badan" class="form-control" placeholder="Tinggi Badan">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Lingkar Kepala:</strong>
                    <input type="text" name="lingkar_kepala" class="form-control" placeholder="Lingkar Kepala">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Lingkar Lengan:</strong>
                    <input type="text" name="lingkar_lengan" class="form-control" placeholder="Lingkar Lengan">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Jenis Imunisasi:</strong>
                    <select name="bulan_imunisasi_id" id="bulan_imunisasi_id" class="form-control">
                        <option value="" selected disabled>-- Pilih Jenis Imunisasi --</option>
                        @foreach($bulanimunisasi as $listbulanimunisasi)
                        <option value="{{ $listbulanimunisasi->id }}">{{ $listbulanimunisasi->nama_bulan_imunisasi}}
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Keluhan:</strong>
                    <input type="text" name="keluhan" class="form-control" placeholder="Keluhan">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Penanganan:</strong>
                    <input type="text" name="penanganan" class="form-control" placeholder="Penanganan">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Catatan Khusus:</strong>
                    <input type="text" name="catatan" class="form-control" placeholder="Catatan Khusus">
                </div>
            </div>
        </div>

    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
</form>
@endsection