@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Show vitamin</h2>
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
                <strong>vitamin:</strong>
                <input type="text" name="nama_vitamin" class="form-control" value="{{ $vitamin->nama_vitamin }}"
                    disabled>
            </div>
        </div>
    </div>
</div>

@endsection