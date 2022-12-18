@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Jadwal Pemeriksaan</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('jadwalpemeriksaanbalita.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
            {!! Form::model($jadwalpemeriksaanbalita, ['method' => 'PATCH','route' => ['jadwalpemeriksaanbalita.update',
            $jadwalpemeriksaanbalita->id]]) !!}
            @csrf
            @method('PUT')
            <input type="hidden" name="isApprove" class="form-control" value="2">
            <button type="submit" class="btn btn-warning btn-sm mb-3 ml-2 float-right">Revision</button>
            {!! Form::close() !!}

            {!! Form::model($jadwalpemeriksaanbalita, ['method' => 'PATCH','route' => ['jadwalpemeriksaanbalita.update',
            $jadwalpemeriksaanbalita->id]]) !!}
            @csrf
            @method('PUT')
            <input type="hidden" name="isApprove" class="form-control" value="3">
            <button type="submit" class="btn btn-danger btn-sm mb-3 ml-2 float-right">Decline</button>
            {!! Form::close() !!}

            {!! Form::model($jadwalpemeriksaanbalita, ['method' => 'PATCH','route' => ['jadwalpemeriksaanbalita.update',
            $jadwalpemeriksaanbalita->id]]) !!}
            @csrf
            @method('PUT')
            <input type="hidden" name="isApprove" class="form-control" value="1">
            <button type="submit" class="btn btn-primary btn-sm mb-3 ml-2 float-right">Approve</button>
            {!! Form::close() !!}
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

{!! Form::model($jadwalpemeriksaanbalita, ['method' => 'PATCH','route' => ['jadwalpemeriksaanbalita.update',
$jadwalpemeriksaanbalita->id]]) !!}

@csrf
@method('PUT')

<div class="card">
    <div class="card-header font-weight-bold">
        Edit Jadwal Pemeriksaan Balita
    </div>
    <div class="row m-2">
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Jenis Pemeriksaan:</strong>
                <input type="text" name="jenis_pemeriksaan" class="form-control" placeholder="Jenis Pemeriksaan"
                    value="{{ $jadwalpemeriksaanbalita->jenis_pemeriksaan }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Waktu Mulai:</strong>
                <input type="text" name="waktu_mulai" class="form-control" placeholder="Waktu Mulai"
                    value="{{ $jadwalpemeriksaanbalita->waktu_mulai }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Waktu Berakhir:</strong>
                <input type="text" name="waktu_berakhir" class="form-control" placeholder="Waktu Berakhir"
                    value="{{ $jadwalpemeriksaanbalita->waktu_berakhir }}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <strong>Dusun:</strong>
                <select class="form-control" id="dusun" name="dusun_id">
                    @foreach ($dusun as $p)
                    <option @if ($jadwalpemeriksaanbalita->dusun_id == $p->id)
                        selected="true"
                        @endif
                        value="{{ $p->id }}">{{ $p->nama_dusun }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}


@endsection