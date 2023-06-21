@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Kecamatan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('kabupaten.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
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
    <div class="card shadow">
        <div class="card-header font-weight-bold">
            Data Kecamatan
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama Kecamatan:</strong>
                    <input type="text" name="nama_kecamatan" class="form-control" placeholder="Nama Kecamatan">
                </div>
                <div class="form-group">
                    <strong>Kabupaten:</strong>
                    <select class="form-control" id="kabupaten" name="kabupaten_id">
                        <option value="" selected disabled>-- Pilih Kabupaten --</option>
                        @foreach ($kabupaten as $kabupaten)
                        <option value="{{ $kabupaten['id'] }}">{{ $kabupaten['id'] }}. {{ $kabupaten['nama_kabupaten'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center col-sm-12">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>


</form>
@endsection