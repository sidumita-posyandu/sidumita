@extends('layouts.app')

@section('link')
<style>
.table-responsive::-webkit-scrollbar {
    -webkit-appearance: none;
}

.table-responsive::-webkit-scrollbar:vertical {
    width: 12px;
}

.table-responsive::-webkit-scrollbar:horizontal {
    height: 12px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, .5);
    border-radius: 10px;
    border: 2px solid #ffffff;
}

.table-responsive::-webkit-scrollbar-track {
    border-radius: 10px;
    background-color: #ffffff;
}
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Data Keluarga</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('keluarga.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
        </div>
    </div>
</div>

<div class="card shadow">
    <div class="card-header font-weight-bold text-success">
        Data Keluarga
    </div>
    <div class="row m-2">
        <div class="col-sm-6">
            <div class="form-group">
                <strong>No Kartu Keluarga:</strong>
                <input type="text" name="no_kartu_keluarga" class="form-control"
                    value="{{ $keluarga['no_kartu_keluarga'] }}" readonly>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Kepala Keluarga:</strong>
                <input type="text" name="kepala_keluarga" class="form-control"
                    value="{{ $keluarga['kepala_keluarga'] }}" readonly>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" value="{{ $keluarga['alamat'] }}" readonly>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Jumlah:</strong>
                <input type="text" name="jumlah" class="form-control" value="{{ $keluarga['jumlah'] }}" readonly>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mt-2">
    <div class="card-header font-weight-bold text-success">
        <div class="float-left">Data Anggota Keluarga</div>
        <div class="float-right">
            <a class="btn btn-success btn-sm" href="{{ route('detail-keluarga.create', $keluarga['id']) }}"><i
                    class="fas fa-plus mr-1"></i>
                Tambah Anggota Keluarga</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th class="w-25">NIK</th>
                    <th class="w-25">Nama Lengkap</th>
                    <th class="w-25">Jenis Kelamin</th>
                    <th class="w-25">Tempat Lahir</th>
                    <th class="w-25">Tanggal Lahir</th>
                    <th class="w-25">Agama</th>
                    <th class="w-25">Pendidikan</th>
                    <th class="w-25">Golongan Darah</th>
                    <th class="w-25">Jenis Pekerjaan</th>
                    <th class="w-25">Status Perkawinan</th>
                    <th class="w-25">Status dalam Keluarga</th>
                    <th class="w-25">Kewarganegaraan</th>
                    <th class="w-25">No Telepon</th>
                </tr>
                <?php $i = 1; ?>
                @if(empty($keluarga['detail_keluargas']))
                <td colspan="12" class="text-center">Data belum terisi</td>
                @else
                @foreach($keluarga['detail_keluargas'] as $keluarga)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $keluarga['nik'] }}</td>
                    <td>{{ $keluarga['nama_lengkap'] }}</td>
                    <td>{{ $keluarga['jenis_kelamin'] }}</td>
                    <td>{{ $keluarga['tempat_lahir'] }}</td>
                    <td>{{ $keluarga['tanggal_lahir'] }}</td>
                    <td>{{ $keluarga['agama'] }}</td>
                    <td>{{ $keluarga['pendidikan'] }}</td>
                    <td>{{ $keluarga['golongan_darah'] }}</td>
                    <td>{{ $keluarga['jenis_pekerjaan'] }}</td>
                    <td>{{ $keluarga['status_perkawinan'] }}</td>
                    <td>{{ $keluarga['status_dalam_keluarga'] }}</td>
                    <td>{{ $keluarga['kewarganegaraan'] }}</td>
                    <td>{{ $keluarga['no_telp'] }}</td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</div>

@endsection