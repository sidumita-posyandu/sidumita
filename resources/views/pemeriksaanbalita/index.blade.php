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

<div class="card shadow mt-2">
    <div class="card-header font-weight-bold text-success">
        Data Pemeriksaan Balita
    </div>
    <div class="card-body">
        <div class="float-left"><a class="btn btn-success btn-sm mb-2"
                href="{{ route('pemeriksaan-balita.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah Pemeriksaan Balita</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Tanggal Imunisasi</th>
                <th>Nama Balita</th>
                <th width="170px">Aksi</th>
            </tr>
            @if(is_array($pemeriksaanbalita) || is_object($pemeriksaanbalita))
            <?php $i= 1; ?>
            @foreach ($pemeriksaanbalita as $k => $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item['tanggal_pemeriksaan'] }}</td>
                <td>{{ $item['nama_lengkap'] }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('pemeriksaan-balita.show', $item['id']) }}">Detail
                        Pemeriksaan</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

@endsection