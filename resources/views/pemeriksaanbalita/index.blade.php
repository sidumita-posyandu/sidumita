@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pemeriksaan Balita</h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif


<div class="card mt-2">
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-2" href="{{ route('pemeriksaan-balita.create') }}"><i
                class="fas fa-plus mr-1"></i>
            Tambah Pemeriksaan Balita</a>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Tanggal Imunisasi</th>
                <th>Nama Balita</th>
                <th>Berat Badan</th>
                <th>Tinggi Badan</th>
                <th>Lingkar Kepala</th>
                <th>Lingkar Lengan</th>
                <th width="160px">Action</th>
            </tr>

            @foreach ($pemeriksaanbalita as $k => $item)
            <tr>
                <td>1</td>
                <td>{{ $item['tanggal_pemeriksaan'] }}</td>
                <td>{{ $item['balita']['detail_keluarga_id'] }}</td>
                <td>{{ $item['berat_badan'] }}</td>
                <td>{{ $item['tinggi_badan'] }}</td>
                <td>{{ $item['lingkar_kepala'] }}</td>
                <td>{{ $item['lingkar_lengan'] }}</td>
                <td>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection