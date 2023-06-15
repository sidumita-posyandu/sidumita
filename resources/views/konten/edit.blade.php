@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Provinsi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('provinsi.index') }}"><i
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


<form action="{{ route('provinsi.update', $provinsi['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card shadow">
        <div class="card-header font-weight-bold">
            Edit Provinsi
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama Provinsi:</strong>
                    <input type="text" name="nama_provinsi" value="{{ $provinsi['nama_provinsi'] }}"
                        class="form-control" placeholder="Nama Provinsi">
                </div>
            </div>
            <div class="text-center col-sm-12">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </div>

</form>


@endsection