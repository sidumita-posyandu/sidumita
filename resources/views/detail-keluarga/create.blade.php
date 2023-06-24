@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Tambah Anggota Keluarga</h2>
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

<form action="{{ route('detail-keluarga.store', $keluarga['id']) }}" method="POST">
    @csrf
    <div class="card shadow mt-2">
        <div class="card-header font-weight-bold">
            Anggota Keluarga
        </div>
        <div class="row m-2">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>NIK:</strong>
                    <input type="number" name="nik[]" class="form-control" placeholder="NIK" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Nama Lengkap:</strong>
                    <input type="text" name="nama_lengkap[]" class="form-control" placeholder="Nama Lengkap" required>
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
                    <input type="text" name="tempat_lahir[]" class="form-control" placeholder="Tempat Lahir" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group ">
                    <strong>Tanggal Lahir:</strong>
                    <div class="input-group-prepend">
                        <input type="date" name="tanggal_lahir[]" class="date form-control" placeholder="Tanggal Lahir" required>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Agama:</strong>
                    <select class="form-control" id="agama" name="agama[]">
                        <option value="" selected disabled>-- Pilih Agama--</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Budha">Budha</option>
                        <option value="Konguchu">Konguchu</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Pendidikan:</strong>
                    <select class="form-control" id="pendidikan" name="pendidikan[]">
                        <option value="" selected disabled>-- Pilih Pendidikan Terakhir --</option>
                        <option value="Belum">Belum</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
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
                    <input type="text" name="jenis_pekerjaan[]" class="form-control" value="-">
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
                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                        <option value="Istri">Istri</option>
                        <option value="Anak">Anak</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Kewarganegaraan:</strong>
                    <input type="text" name="kewarganegaraan[]" class="form-control" placeholder="Kewarganegaraan" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>No Telepon:</strong>
                    <input type="text" name="no_telp[]" class="form-control" placeholder="No Telepon" required>
                </div>
            </div>
            <!-- <div class="col-sm-6">
                <div class="form-group">
                    <strong>Tandai sebagai peserta posyandu?:</strong>
                    <select class="form-control" id="peserta_posyandu" name="peserta_posyandu[]">
                        <option value="0">Tidak</option>
                        <option value="1">Bayi / Balita</option>
                        <option value="2">Ibu Hamil</option>
                    </select>
                </div>
            </div> -->
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

@section('script')
<script>
$(document).ready(function() {
    $(this).on('click', '.remove', function() {
        $(this).parent().parent().parent().remove();
    });
    $(".add-keluarga").click(function() {
        $(".keluarga").append(
            '<div class="card shadow mt-2"><div class="card-header font-weight-bold">Anggota Keluarga</div><div class="row m-2"><div class="col-sm-6"><div class="form-group"><strong>NIK:</strong><input type="number" name="nik[]" class="form-control" placeholder="NIK" required></div></div><div class="col-sm-6"><div class="form-group"><strong>Nama Lengkap:</strong><input type="text" name="nama_lengkap[]" class="form-control" placeholder="Nama Lengkap" required></div></div><div class="col-sm-6"><div class="form-group"><strong>Jenis Kelamin:</strong><select class="form-control" id="jenis_kelamin" name="jenis_kelamin[]"><option value="" selected disabled>-- Pilih Jenis Kelamin --</option><option value="Laki-Laki">Laki-Laki</option><option value="Perempuan">Perempuan</option></select></div></div><div class="col-sm-6"><div class="form-group"><strong>Tempat Lahir:</strong><input type="text" name="tempat_lahir[]" class="form-control" placeholder="Tempat Lahir" required></div></div><div class="col-sm-6"><div class="form-group"><strong>Tanggal Lahir:</strong><input type="date" name="tanggal_lahir[]" class="form-control" placeholder="Tanggal Lahir" required></div></div><div class="col-sm-6"><div class="form-group"><strong>Agama:</strong><input type="text" name="agama[]" class="form-control" placeholder="Agama" required></div></div><div class="col-sm-6"><div class="form-group"><strong>Pendidikan:</strong><input type="text" name="pendidikan[]" class="form-control" value="-"></div></div><div class="col-sm-6"><div class="form-group"><strong>Golongan Darah:</strong><select class="form-control" id="golongan_darah" name="golongan_darah[]"><option value="" selected disabled>-- Pilih Golongan Darah --</option><option value="A">A</option><option value="B">B</option><option value="AB">AB</option><option value="O">O</option></select></div></div><div class="col-sm-6"><div class="form-group"><strong>Jenis Pekerjaan:</strong><input type="text" name="jenis_pekerjaan[]" class="form-control" value="-"></div></div><div class="col-sm-6"><div class="form-group"><strong>Status Perkawinan:</strong><select class="form-control" id="status_perkawinan" name="status_perkawinan[]"><option value="" selected disabled>-- Pilih Status Perkawinan --</option><option value="Belum Kawin">Belum Kawin</option><option value="Kawin">Kawin</option><option value="Janda">Janda</option><option value="Duda">Duda</option></select></div></div><div class="col-sm-6"><div class="form-group"><strong>Status dalam Keluarga:</strong><select class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga[]"><option value="" selected disabled>-- Pilih Status Perkawinan --</option><option value="Anak">Anak</option><option value="Ayah">Ayah</option><option value="Ibu">Ibu</option></select></div></div><div class="col-sm-6"><div class="form-group"><strong>Kewarganegaraan:</strong><input type="text" name="kewarganegaraan[]" class="form-control" placeholder="Kewarganegaraan" required></div></div><div class="col-sm-6"><div class="form-group"><strong>No Telepon:</strong><input type="text" name="no_telp[]" class="form-control" placeholder="No Telepon" required></div></div></div><div class="card-footer"><div class="form-group"><button type="button" class="btn btn-danger remove" style="float: right;"><i class="fas fa-trash mr-1"></i>Hapus Data Keluarga</button></div></div></div>'
        );
    });
});
</script>
@endsection