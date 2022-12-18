@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Dusun</h2>
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


<form action="{{ route('dusun.update',$dusun->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-header font-weight-bold">
            Edit dusun
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama dusun:</strong>
                    <input type="text" name="nama_dusun" value="{{ $dusun->nama_dusun }}" class="form-control"
                        placeholder="Nama dusun">
                </div>
                <div class="form-group">
                    <strong>Desa:</strong>
                    <select class="form-control" id="desa" name="desa_id">
                        @foreach ($desa as $p)
                        <option @if ($dusun->desa_id == $p->id)
                            selected="true"
                            @endif
                            value="{{ $p->id }}">{{ $p->nama_desa }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>

</form>


@endsection