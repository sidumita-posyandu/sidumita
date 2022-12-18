@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Keluarga</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('keluarga.index') }}"><i
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


<form action="{{ route('keluarga.update',$keluarga->id) }}" method="POST">
    @csrf
    @method('PUT')


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Kartu Keluarga:</strong>
                <input type="text" name="no_kartu_keluarga" value="{{ $keluarga->no_kartu_keluarga }}"
                    class="form-control" placeholder="No Kartu Keluarga">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kepala Keluarga:</strong>
                <input type="text" name="kepala_keluarga" value="{{ $keluarga->kepala_keluarga }}" class="form-control"
                    placeholder="Kepala Keluarga">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" value="{{ $keluarga->alamat }}" class="form-control"
                    placeholder="Alamat">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah:</strong>
                <input type="text" name="jumlah" value="{{ $keluarga->jumlah }}" class="form-control"
                    placeholder="Jumlah">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


</form>
@endsection