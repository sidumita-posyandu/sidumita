@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Detail Dusun</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm" href="{{ route('dusun.index') }}"><i class="fas fa-arrow-left mr-1"></i>
                Kembali</a>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header font-weight-bold">
        Nama Dusun
    </div>
    <div class="row m-2">
        <div class="col">
            <div class="form-group">
                <strong>Dusun:</strong>
                <input type="text" name="nama_dusun" class="form-control" value="{{ $dusun->nama_dusun }}" disabled>
            </div>
            <div class="form-group">
                <strong>Desa:</strong>
                <input type="text" name="nama_dusun" class="form-control" value="{{ $dusun->desa->nama_desa }}"
                    disabled>
            </div>
        </div>
    </div>
</div>

@endsection