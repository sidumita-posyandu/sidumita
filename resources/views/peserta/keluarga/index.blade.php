@extends('peserta.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-4 col-lg-3" style="padding-right: 50px;">
            <div class="card shadow">
                <div class="card-body">
                    <div class="container">
                        <li class="nav-item active my-3" style="list-style-type: none;">
                            <a class="nav-link row" href="#">
                                <i class="fa-solid col-2 fa-user text-success"></i>
                                <span class="col-10">Profil</span></a>
                        </li>
                        <li class="nav-item active my-3" style="list-style-type: none;">
                            <a class="nav-link row" href="#">
                                <i class="fa-solid col-2 fa-bars-progress text-success"></i>
                                <span>Data Keluarga</span></a>
                        </li>
                        <li class="nav-item active my-3" style="list-style-type: none;">
                            <a class="nav-link row" href="#">
                                <i class="fa-solid col-2 fa-gears text-success"></i>
                                <span>Atur Akun</span></a>
                        </li>
                        <li class="nav-item active my-3" style="list-style-type: none;">
                            <a class="nav-link row" href="#">
                                <i class="fa-solid col-2 fa-right-from-bracket text-success"></i>
                                <span>Log Out</span></a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8 col-lg-9">
            <h3 class="mb-3">Data Keluarga</h3>
            @if(is_array($keluarga) || is_object($keluarga))
            <div class="form-group row">
                <label for="no_kartu_keluarga" class="col-sm-3 col-form-label">Nomor Kartu Keluarga</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="no_kartu_keluarga"
                        name="no_kartu_keluarga" value=": {{$keluarga['no_kartu_keluarga']}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="kepala_keluarga" class="col-sm-3 col-form-label">Kepala Keluarga</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="kepala_keluarga"
                        name="kepala_keluarga" value=": {{$keluarga['kepala_keluarga']}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="alamat" name="alamat"
                        value=": {{$keluarga['alamat']}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" id="jumlah" name="jumlah"
                        value=": {{$keluarga['jumlah_keluarga']}}">
                </div>
            </div>
            @else
            <div>Data belum terdaftar</div>
            @endif
            <div class="table-responsive mt-5">
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
                    <td colspan="14" class="text-center">Data belum terisi</td>
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
            <figcaption class="figure-caption">* Silahkan geser kekanan untuk melihat data secara
                keseluruhan
            </figcaption>
        </div>
    </div>
</div>

@endsection