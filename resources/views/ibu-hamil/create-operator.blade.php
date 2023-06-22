@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Ibu Hamil</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('ibu-hamil.index') }}"><i
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


<form action="{{ route('ibu-hamil.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header font-weight-bold">
            Data Ibu Hamil
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Pilih Ibu Hamil dari Detail Keluarga:</strong>
                    <select class="form-control" id="detail_keluarga_id" name="detail_keluarga_id">
                        <option value="" selected disabled>-- Pilih Data Ibu Hamil --</option>
                        @foreach($keluarga as $item)
                        <option value="{{ $item['id'] }}">
                            {{ $item['nama_lengkap'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Berat Badan Prakehamilan:</strong>
                    <input type="text" name="berat_badan_prakehamilan" class="form-control"
                        placeholder="Berat Badan Terakhir Sebelum Kehamilan"></input>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Tinggi Badan Prakehamilan:</strong>
                    <input type="text" name="tinggi_badan_prakehamilan" class="form-control"
                        placeholder="Tinggi Badan Terakhir Sebelum Kehamilan"></input>
                </div>
            </div>

        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </div>
    </div>
</form>
@endsection