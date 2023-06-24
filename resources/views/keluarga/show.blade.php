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
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('keluarga.index') }}"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
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
                <input type="text" name="no_kartu_keluarga" class="form-control" value="{{ $keluarga['no_kartu_keluarga'] }}" readonly>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <strong>Kepala Keluarga:</strong>
                <input type="text" name="kepala_keluarga" class="form-control" value="{{ $keluarga['kepala_keluarga'] }}" readonly>
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
                <input type="text" name="jumlah" class="form-control" value="{{count($keluarga['detail_keluargas'])}}" readonly>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mt-2">
    <div class="card-header font-weight-bold text-success">
        <div class="float-left">Data Anggota Keluarga</div>
        <div class="float-right">
            <a class="btn btn-success btn-sm" href="{{ route('detail-keluarga.create', $keluarga['id']) }}"><i class="fas fa-plus mr-1"></i>
                Tambah Anggota Keluarga</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Golongan Darah</th>
                    <th>Jenis Pekerjaan</th>
                    <th>Status Perkawinan</th>
                    <th>Status dalam Keluarga</th>
                    <th>Kewarganegaraan</th>
                    <th>No Telepon</th>
                    <!-- <th>Action</th> -->
                </tr>
                @if(empty($keluarga['detail_keluargas']))
                <td colspan="12" class="text-center">Data belum terisi</td>
                @else
                @foreach($keluarga['detail_keluargas'] as $keluarga)
                <tr>
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
                    <!-- <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('detail-keluarga.edit', $keluarga['id']) }}"></i>Edit</a>
                                <a class="dropdown-item" href="{{ route('detail-keluarga.edit', $keluarga['id']) }}"></i>Delete</a>
                            </div>
                        </div>
                    </td> -->
                </tr>
                @endforeach
                @endif
            </table>
        </div>
    </div>
</div>

<div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@endsection