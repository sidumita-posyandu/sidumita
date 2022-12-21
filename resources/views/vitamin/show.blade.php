@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show Vitamin</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm" href="{{ route('vitamin.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header font-weight-bold">
        Nama vitamin
    </div>
    <div class="row m-2">
        <div class="col">
            <div class="form-group">
                <strong>Vitamin:</strong>
                <input type="text" name="nama_vitamin" class="form-control" value="{{ $vitamin['nama_vitamin'] }}"
                    disabled>
            </div>
            <div class="form-group">
                <strong>Dosis:</strong>
                <input type="text" name="dosis" class="form-control" placeholder="Dosis" value="{{ $vitamin['dosis'] }}"
                    disabled>
            </div>
            <div class="form-group">
                <strong>Catatan:</strong>
                <input type="text" name="catatan" class="form-control" placeholder="Catatan"
                    value="{{ $vitamin['catatan'] }}" disabled>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection