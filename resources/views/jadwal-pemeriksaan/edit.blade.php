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
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{ route('jadwal-pemeriksaan.update', $jadwal_pemeriksaan['id']) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card shadow">
        <div class="card-header font-weight-bold text-success">
            Data Jadwal Pemeriksaan
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Jenis Pemeriksaan:</strong>
                    <input type="text" name="jenis_pemeriksaan" class="form-control" value="{{$jadwal_pemeriksaan['jenis_pemeriksaan']}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Waktu Mulai:</strong>
                    <input type="datetime-local" name="waktu_mulai" class="form-control" value="{{$jadwal_pemeriksaan['waktu_mulai']}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Waktu Berakhir:</strong>
                    <input type="datetime-local" name="waktu_berakhir" class="form-control"
                        value="{{$jadwal_pemeriksaan['waktu_berakhir']}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Provinsi:</strong>
                    <input type="text" name="nama_provinsi" class="form-control" value="{{$jadwal_pemeriksaan['dusun']['desa']['kecamatan']['kabupaten']['provinsi']['nama_provinsi']}}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Kabupaten:</strong>
                    <input type="text" name="nama_kabupaten" class="form-control" value="{{$jadwal_pemeriksaan['dusun']['desa']['kecamatan']['kabupaten']['nama_kabupaten']}}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Kecamatan:</strong>
                    <input type="text" name="nama_kecamatan" class="form-control" value="{{$jadwal_pemeriksaan['dusun']['desa']['kecamatan']['nama_kecamatan']}}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Desa:</strong>
                    <input type="text" name="nama_desa" class="form-control" value="{{$jadwal_pemeriksaan['dusun']['desa']['nama_desa']}}" readonly>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Dusun:</strong>
                    <input type="hidden" name="dusun_id" class="form-control" value="{{$jadwal_pemeriksaan['dusun']['id']}}" readonly>
                    <input type="text" name="nama_dusun" class="form-control" value="{{$jadwal_pemeriksaan['dusun']['nama_dusun']}}" readonly>
                </div>
            </div>
            <input type="hidden" name="operator_posyandu_id" class="form-control" value="1">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</form>
@endsection