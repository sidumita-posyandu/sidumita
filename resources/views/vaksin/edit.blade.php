@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Vaksin</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('vaksin.index') }}"><i
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


<form action="{{ route('vaksin.update',$vaksin['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card shadow">
        <div class="card-header font-weight-bold">
            Edit Vaksin
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama Vaksin:</strong>
                    <input type="text" name="nama_vaksin" value="{{ $vaksin['nama_vaksin'] }}" class="form-control">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Dosis:</strong>
                    <input type="text" name="dosis" class="form-control" value="{{ $vaksin['dosis'] }}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Catatan:</strong>
                    <input type="text" name="catatan" class="form-control" value="{{ $vaksin['catatan'] }}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control" id="status" name="status">
                        <option value="Wajib">Wajib</option>
                        <option value="Tambahan">Tambahan</option>
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