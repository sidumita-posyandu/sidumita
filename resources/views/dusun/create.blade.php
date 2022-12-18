@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Dusun</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('dusun.index') }}"><i
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


<form action="{{ route('dusun.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header font-weight-bold">
            Data dusun
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama Dusun:</strong>
                    <input type="text" name="nama_dusun" class="form-control" placeholder="Nama dusun">
                </div>
                <div class="form-group">
                    <strong>Desa:</strong>
                    <select class="form-control" id="desa" name="desa_id">
                        <option value="" selected disabled>-- Pilih desa --</option>
                        @foreach ($desa as $p)
                        <option value="{{ $p['id'] }}">{{ $p['nama_desa'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center col-sm-12">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </div>


</form>
@endsection