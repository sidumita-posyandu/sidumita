@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen Keluarga</h2>
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
        Data Keluarga
    </div>
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('keluarga.create') }}"><i
                    class="fas fa-plus mr-1"></i>
                Tambah Keluarga</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>No Kartu Keluarga</th>
                <th>Kepala Keluarga</th>
                <th>Alamat</th>
                <th>Jumlah</th>
                <th>Dusun</th>
                <th width="190px">Action</th>
            </tr>
            @if(is_array($keluarga) || is_object($keluarga))
            @foreach ($keluarga as $k)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $k['no_kartu_keluarga'] }}</td>
                <td>{{ $k['kepala_keluarga'] }}</td>
                <td>{{ $k['alamat'] }}</td>
                <td>{{ $k['jumlah'] }}</td>
                <td>{{ $k['dusun']['nama_dusun'] }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('keluarga.show', $k['id']) }}">List Anggota
                        Keluarga</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
        <div class="d-flex justify-content-center">
            {{ $keluarga->links() }}
        </div>
    </div>
</div>
@endsection