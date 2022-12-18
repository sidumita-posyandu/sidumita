@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Pemeriksaan Balita</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('pemeriksaanbalita.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header font-weight-bold">
        Data Balita
    </div>
    <div class="row m-2">
        @foreach($pemeriksaanbalita as $pemeriksaanbalita)
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Nama balita:</strong>
                <input type="text" name="tanggal_pemeriksaan" class="form-control"
                    value="{{ $pemeriksaanbalita->balita->nama_balita }}" disabled>
            </div>
            <div class="form-group">
                <strong>Tanggal Pemeriksaan:</strong>
                <input type="text" name="tanggal_pemeriksaan" class="form-control"
                    value="{{ $pemeriksaanbalita->tanggal_pemeriksaan }}" disabled>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="card mt-3">
    <div class="card-header font-weight-bold">
        Data Pemeriksaan
    </div>
    <div class="card-body">
        @foreach($detailpemeriksaanbalita as $detailbalita)
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Berat Badan:</strong>
                <input type="text" name="berat_badan" class="form-control" value="{{ $detailbalita->berat_badan }}"
                    disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Tinggi Badan:</strong>
                <input type="text" name="tinggi_badan" class="form-control" value="{{ $detailbalita->tinggi_badan }}"
                    disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Lingkar Kepala:</strong>
                <input type="text" name="lingkar_kepala" class="form-control"
                    value="{{ $detailbalita->lingkar_kepala }}" disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Lingkar Lengan:</strong>
                <input type="text" name="lingkar_lengan" class="form-control"
                    value="{{ $detailbalita->lingkar_lengan }}" disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Jenis Imunisasi:</strong>
                <input type="text" name="keluhan" class="form-control" value="{{ $detailbalita->bulan_imunisasi_id }}"
                    disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Keluhan:</strong>
                <input type="text" name="keluhan" class="form-control" value="{{ $detailbalita->keluhan }}" disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Penanganan:</strong>
                <input type="text" name="penanganan" class="form-control" value="{{ $detailbalita->penanganan }}"
                    disabled>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Catatan Khusus:</strong>
                <input type="text" name="catatan" class="form-control" value="{{ $detailbalita->catatan }}" disabled>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection