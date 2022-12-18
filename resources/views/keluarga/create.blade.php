@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Keluarga</h2>
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

<form action="{{ route('keluarga.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header font-weight-bold">
            Data Keluarga
        </div>
        <div class="row m-2">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>No Kartu Keluarga:</strong>
                    <input type="text" name="no_kartu_keluarga" class="form-control" placeholder="No Kartu Keluarga">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Kepala Keluarga:</strong>
                    <input type="text" name="kepala_keluarga" class="form-control" placeholder="Nama Kepala Keluarga">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Jumlah:</strong>
                    <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Keluarga">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Dusun:</strong>
                    <select class="form-control" id="dusun" name="dusun_id">
                        <option value="" selected disabled>-- Pilih Dusun --</option>
                        @foreach ($dusun as $p)
                        <option value="{{ $p['id'] }}">{{ $p['nama_dusun'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header font-weight-bold">
            Anggota Keluarga
        </div>
        <div class="row m-2">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>NIK:</strong>
                    <input type="text" name="nik[]" class="form-control" placeholder="NIK">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Nama Lengkap:</strong>
                    <input type="text" name="nama_lengkap[]" class="form-control" placeholder="Nama Lengkap">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Jenis Kelamin:</strong>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin[]">
                        <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Tempat Lahir:</strong>
                    <input type="text" name="tempat_lahir[]" class="form-control" placeholder="Tempat Lahir">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Tanggal Lahir:</strong>
                    <input type="text" name="tanggal_lahir[]" class="form-control" placeholder="Tanggal Lahir">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Agama:</strong>
                    <input type="text" name="agama[]" class="form-control" placeholder="Agama">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Pendidikan:</strong>
                    <input type="text" name="pendidikan[]" class="form-control" placeholder="Pendidikan Terakhir">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Golongan Darah:</strong>
                    <select class="form-control" id="golongan_darah" name="golongan_darah[]">
                        <option value="" selected disabled>-- Pilih Golongan Darah --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Jenis Pekerjaan:</strong>
                    <input type="text" name="jenis_pekerjaan[]" class="form-control" placeholder="Jenis Pekerjaan">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Status Perkawinan:</strong>
                    <select class="form-control" id="status_perkawinan" name="status_perkawinan[]">
                        <option value="" selected disabled>-- Pilih Status Perkawinan --</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Janda">Janda</option>
                        <option value="Duda">Duda</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Status dalam Keluarga:</strong>
                    <select class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga[]">
                        <option value="" selected disabled>-- Pilih Status Perkawinan --</option>
                        <option value="Anak">Anak</option>
                        <option value="Ayah">Ayah</option>
                        <option value="Ibu">Ibu</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>kewarganegaraan:</strong>
                    <input type="text" name="kewarganegaraan[]" class="form-control" placeholder="kewarganegaraan">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>No Telepon:</strong>
                    <input type="text" name="no_telp[]" class="form-control" placeholder="No Telepon">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button type="button" class="btn btn-primary add-keluarga" style="float: right;"><i
                        class="fas fa-plus mr-1"></i>Tambah Data
                    Keluarga
                </button>
            </div>
        </div>
    </div>

    <div class="keluarga" id="keluarga"></div>

    <div class="text-center">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>

</form>
@endsection