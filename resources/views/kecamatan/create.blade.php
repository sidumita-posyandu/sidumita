@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Kecamatan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('kecamatan.index') }}"><i class="fas fa-arrow-left mr-1"></i>
                Kembali</a>
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


<form action="{{ route('kecamatan.store') }}" method="POST">
    @csrf


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama kecamatan:</strong>
                <input type="text" name="nama_kecamatan" class="form-control" placeholder="Nama kecamatan">
            </div>
            <div class="form-group">
                <strong>Kabupaten:</strong>
                <select class="form-control" id="kabupaten" name="kabupaten_id">
                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                    @foreach ($kabupaten as $p)
                    <option value="{{ $p['id'] }}">{{ $p['nama_kabupaten'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


</form>
@endsection