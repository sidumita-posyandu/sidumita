@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Kabupaten</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('kabupaten.index') }}"> Kembali</a>
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


<form action="{{ route('kabupaten.update',$kabupaten->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama kabupaten:</strong>
                <input type="text" name="nama_kabupaten" value="{{ $kabupaten->nama_kabupaten }}" class="form-control"
                    placeholder="Nama kabupaten">
            </div>
            <div class="form-group">
                <strong>Provinsi:</strong>
                <select class="form-control" id="provinsi" name="provinsi_id">
                    @foreach ($provinsi as $p)
                    <option @if ($kabupaten->provinsi_id == $p->id)
                        selected="true"
                        @endif
                        value="{{ $p->id }}">{{ $p->nama_provinsi }}</option>
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