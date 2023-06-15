@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Provinsi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm" href="{{ route('provinsi.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header font-weight-bold">
        Nama Provinsi
    </div>
    <div class="row m-2">
        <div class="col">
            <div class="form-group">
                <strong>Provinsi:</strong>
                <input type="text" name="nama_provinsi" class="form-control" value="{{ $provinsi['nama_provinsi'] }}"
                    disabled>
            </div>
        </div>
    </div>
</div>

@endsection