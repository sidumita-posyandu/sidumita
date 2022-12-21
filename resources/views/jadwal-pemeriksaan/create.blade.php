@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Jadwal Pemeriksaan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('jadwal-pemeriksaan.index') }}"><i
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


<form action="{{ route('jadwal-pemeriksaan.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header font-weight-bold">
            Data Jadwal Pemeriksaan
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Jenis Pemeriksaan:</strong>
                    <input type="text" name="jenis_pemeriksaan" class="form-control" placeholder="Jenis Pemeriksaan">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Waktu Mulai:</strong>
                    <input type="text" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Waktu Berakhir:</strong>
                    <input type="text" name="waktu_berakhir" class="form-control" placeholder="Waktu Berakhir">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Dusun:</strong>
                    <select class="form-control" id="dusun" name="dusun_id">
                        <option value="" selected disabled>-- Pilih Dusun --</option>
                        @foreach ($dusun as $dusun)
                        <option value="{{ $dusun['id'] }}">{{ $dusun['nama_dusun'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Keluarga Peserta:</strong>
                    <select class="form-control" id="keluarga_id" name="keluarga_id">
                        <option value="" selected disabled>-- Pilih Keluarga Peserta --</option>
                        @foreach ($keluarga as $keluarga)
                        <option value="{{ $keluarga['id'] }}">
                            {{ $keluarga['kepala_keluarga'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="operator_posyandu_id" class="form-control" value="1">
        </div>
        <div class="text-center col-sm-12">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</form>
@endsection