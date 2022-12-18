@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Detail Desa</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm" href="{{ route('desa.index') }}"><i class="fas fa-arrow-left mr-1"></i>
                Kembali</a>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header font-weight-bold">
        Nama Desa
    </div>
    <div class="row m-2">
        <div class="col">
            <div class="form-group">
                <strong>Desa:</strong>
                <input type="text" name="nama_desa" class="form-control" value="{{ $desa->nama_desa }}" disabled>
            </div>
            <div class="form-group">
                <strong>Kecamatan:</strong>
                <input type="text" name="nama_desa" class="form-control" value="{{ $desa->kecamatan->nama_kecamatan }}"
                    disabled>
            </div>
        </div>
    </div>
</div>

@endsection