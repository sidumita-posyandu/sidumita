@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Desa</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('desa.index') }}"><i
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


<form action="{{ route('desa.update',$desa['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-header font-weight-bold">
            Edit desa
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama desa:</strong>
                    <input type="text" name="nama_desa" value="{{ $desa['nama_desa'] }}" class="form-control"
                        placeholder="Nama desa">
                </div>
                <div class="form-group">
                    <strong>Kecamatan:</strong>
                    <select class="form-control" id="kecamatan" name="kecamatan_id">
                        @foreach ($kecamatan as $p)
                        <option @if ($desa['kecamatan_id']==$p['id']) selected="true" @endif value="{{ $p['id'] }}">
                            {{ $p['nama_kecamatan'] }}</option>
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