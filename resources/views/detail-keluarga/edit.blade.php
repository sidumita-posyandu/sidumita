@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Anggota Keluarga</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('keluarga.index') }}"><i
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


<form action="{{ route('detail-keluarga.update', $det_keluarga['id']) }}" method="POST">
    @csrf
    <div class="card shadow mt-2">
        <div class="card-header font-weight-bold">
            Anggota Keluarga
        </div>
        <div class="row m-2">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>NIK:</strong>
                    <input type="number" name="nik" class="form-control" value="{{$det_keluarga['nik']}}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Nama Lengkap:</strong>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{$det_keluarga['nama_lengkap']}}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option @if ($det_keluarga['jenis_kelamin']=="Laki-Laki") selected="true" @endif value="Laki-Laki">Laki-Laki</option>
                        <option @if ($det_keluarga['jenis_kelamin']=="Perempuan") selected="true" @endif value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Tempat Lahir:</strong>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{$det_keluarga['tempat_lahir']}}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group ">
                    <strong>Tanggal Lahir:</strong>
                    <div class="input-group-prepend">
                        <input type="date" name="tanggal_lahir" class="date form-control" value="{{$det_keluarga['tanggal_lahir']}}" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Agama:</strong>
                    <input type="text" name="agama" class="form-control" value="{{$det_keluarga['agama']}}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Pendidikan:</strong>
                    <input type="text" name="pendidikan" class="form-control" value="{{$det_keluarga['pendidikan']}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Golongan Darah:</strong>
                    <select class="form-control" id="golongan_darah" name="golongan_darah">
                        <option @if ($det_keluarga['jenis_kelamin']=="A") selected="true" @endif value="A">A</option>
                        <option @if ($det_keluarga['jenis_kelamin']=="B") selected="true" @endif value="B">B</option>
                        <option @if ($det_keluarga['jenis_kelamin']=="AB") selected="true" @endif value="AB">AB</option>
                        <option @if ($det_keluarga['jenis_kelamin']=="O") selected="true" @endif value="O">O</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Jenis Pekerjaan:</strong>
                    <input type="text" name="jenis_pekerjaan" class="form-control" value="{{$det_keluarga['jenis_pekerjaan']}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Status Perkawinan:</strong>
                    <select class="form-control" id="status_perkawinan" name="status_perkawinan">
                        <option @if ($det_keluarga['status_perkawinan']=="Belum Kawin") selected="true" @endif value="Belum Kawin">Belum Kawin</option>
                        <option @if ($det_keluarga['status_perkawinan']=="Kawin") selected="true" @endif value="Kawin">Kawin</option>
                        <option @if ($det_keluarga['status_perkawinan']=="Janda") selected="true" @endif value="Janda">Janda</option>
                        <option @if ($det_keluarga['status_perkawinan']=="Duda") selected="true" @endif value="Duda">Duda</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Status dalam Keluarga:</strong>
                    <select class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga">
                        <option @if ($det_keluarga['status_dalam_keluarga']=="Anak") selected="true" @endif value="Anak">Anak</option>
                        <option @if ($det_keluarga['status_dalam_keluarga']=="Ayah") selected="true" @endif value="Ayah">Ayah</option>
                        <option @if ($det_keluarga['status_dalam_keluarga']=="Ibu") selected="true" @endif value="Ibu">Ibu</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Kewarganegaraan:</strong>
                    <input type="text" name="kewarganegaraan" class="form-control" value="{{$det_keluarga['kewarganegaraan']}}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>No Telepon:</strong>
                    <input type="text" name="no_telp" class="form-control" value="{{$det_keluarga['no_telp']}}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
</form>
@endsection