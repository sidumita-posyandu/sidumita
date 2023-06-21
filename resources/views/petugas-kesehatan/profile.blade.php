@extends('layouts.app')

@section('content')
<style>
input[type=text] {
    width: 100%;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 1px solid #d1d3e2;
    outline: 0;
}
</style>
<form action="{{ route('petugas.update',$petugas['id']) }}" method="POST">
    {{ csrf_field() }}

    <div class="card shadow mt-2">
        <div class="card-header font-weight-bold text-success">
            Data Diri
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nik" name="nik" value="{{$petugas['nik']}}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{$petugas['nama']}}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_telp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{$petugas['no_telp']}}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                        value="{{$petugas['tempat_lahir']}}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                        value="{{$petugas['tanggal_lahir']}}" required>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="" selected disabled>-- Pilih Jenis Kelamin --</option>
                        <option @if ($petugas['jenis_kelamin']=="Laki-Laki" ) selected="true" @endif value="Laki-Laki">
                            Laki-Laki</option>
                        <option @if ($petugas['jenis_kelamin']=="Perempuan" ) selected="true" @endif value="Perempuan">
                            Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{$petugas['alamat']}}" required>
                </div>
            </div>
            <input type="hidden" name="dusun_id" value="{{$petugas['dusun_id']}}">
            <div class="text-center col-sm-12">
                <button type="submit" class="btn btn-success float-right">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</form>
@endsection