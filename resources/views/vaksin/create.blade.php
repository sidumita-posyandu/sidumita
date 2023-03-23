@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Vaksin</h2>
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


<form action="{{ route('vaksin.store') }}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header font-weight-bold">
            Data vaksin
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama vaksin:</strong>
                    <input type="text" name="nama_vaksin" class="form-control" placeholder="Nama vaksin">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Dosis:</strong>
                    <input type="text" name="dosis" class="form-control" placeholder="Dosis">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Catatan:</strong>
                    <input type="text" name="catatan" class="form-control" placeholder="Catatan">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <div class="form-group">
                        <strong>Status:</strong>
                        <select class="form-control" id="status" name="status">
                            <option value="Wajib">Wajib</option>
                            <option value="Tambahan">Tambahan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-center col-sm-12">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </div>


</form>
@endsection