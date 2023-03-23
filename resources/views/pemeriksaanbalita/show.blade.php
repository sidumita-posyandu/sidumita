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
    Terjadi kusunlahan dengan input yang dimasukan.<br><br>
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
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama balita:</strong>
                    <input type="text" name="tanggal_pemeriksaan" class="form-control"
                        value="{{ $pemeriksaanbalita['nama_lengkap'] }}" disabled>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Tanggal Pemeriksaan:</strong>
                    <input type="text" name="tanggal_pemeriksaan" class="form-control"
                        value="{{ $pemeriksaanbalita['tanggal_pemeriksaan'] }}" disabled>
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
                                <input type="number" name="berat_badan" class="form-control"
                                    value="{{ $pemeriksaanbalita['berat_badan'] }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Tinggi Badan (Cm):</strong>
                                <input type="number" name="tinggi_badan" class="form-control"
                                    value="{{ $pemeriksaanbalita['tinggi_badan'] }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Lingkar Kepala (Cm):</strong>
                                <input type="number" name="lingkar_kepala" class="form-control"
                                    value="{{ $pemeriksaanbalita['lingkar_kepala'] }}" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <strong>Lingkar Lengan (Cm):</strong>
                                <input type="number" name="lingkar_lengan" class="form-control"
                                    value="{{ $pemeriksaanbalita['lingkar_lengan'] }}" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <strong>Keluhan:</strong>
                        <input type="text" name="keluhan" class="form-control"
                            value="{{ $pemeriksaanbalita['keluhan'] }}" disabled></input>
                    </div>
                    <div class="form-group">
                        <strong>Penanganan:</strong>
                        <input type="text" name="penanganan" class="form-control"
                            value="{{ $pemeriksaanbalita['penanganan'] }}" disabled></input>
                    </div>
                    <div class="form-group">
                        <strong>Catatan Khusus:</strong>
                        <input type="text" name="catatan" class="form-control"
                            value="{{ $pemeriksaanbalita['catatan'] }}" disabled></input>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card shadow mt-3">
                <div class="card-header font-weight-bold">
                    Data Imunisasi
                </div>
                <div class="card-body">
                    <div class="form-group">
                        @if(isset($pemeriksaanbalita['vaksin']))
                        @foreach($pemeriksaanbalita['vaksin'] as $item)
                        <div class="col ml-2">
                            <input class="form-check-input" type="checkbox" name="vaksin_id[]" checked disabled>
                            <label class="form-check-label">{{ $item['nama_vaksin'] }}</label>
                        </div>
                        @endforeach
                        @endif
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