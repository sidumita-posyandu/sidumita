@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show kabupaten</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kabupaten.index') }}"> Kembali</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kabupaten:</strong>
                {{ $kabupaten->nama_kabupaten }}
            </div>
            <div class="form-group">
                <strong>Provinsi:</strong>
                {{ $kabupaten->provinsi->nama_provinsi }}
            </div>
        </div>
    </div>
@endsection
