@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pemeriksaan Ibu Hamil</h2>
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
        Data Pemeriksaan Ibu Hamil
    </div>
    <div class="card-body">
        <a class="btn btn-success btn-sm mb-2" href="{{ route('ibu-hamil.index') }}"><i
                class="fas fa-plus mr-1"></i>
            Tambah Pemeriksaan Ibu Hamil</a>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Nama Ibu Hamil</th>
                <th width="170px">Aksi</th>
            </tr>
            @if(is_array($pemeriksaanibuhamil) || is_object($pemeriksaanibuhamil))
            <?php $i= 1; ?>
            @foreach ($pemeriksaanibuhamil as $k => $item)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item['tanggal_pemeriksaan'] }}</td>
                <td>{{ $item['nama_lengkap'] }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('pemeriksaan-ibuhamil.show', $item['id']) }}">Detail
                        Pemeriksaan</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
        <div class="d-flex justify-content-center">
            {{ $pemeriksaanibuhamil->links() }}
        </div>
    </div>
</div>

@endsection