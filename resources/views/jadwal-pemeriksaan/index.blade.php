@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Jadwal Pemeriksaan</h2>
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
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('jadwal-pemeriksaan.create') }}"><i
                    class="fas fa-plus mr-1"></i>
                Tambah Jadwal Pemeriksaan Balita</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Jenis Pemeriksaan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Berakhir</th>
                <th>Dusun</th>
                <th>Keluarga Balita</th>
                <th width="230px">Action</th>
            </tr>

            @foreach ($jadwal_pemeriksaan as $k => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['jenis_pemeriksaan'] }}</td>
                <td>{{ $item['waktu_mulai'] }}</td>
                <td>{{ $item['waktu_berakhir'] }}</td>
                <td>{{ $item['dusun_id'] }}</td>
                <td>{{ $item['keluarga_id'] }}</td>
                <td>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection