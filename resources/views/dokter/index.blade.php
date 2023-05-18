@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Manajemen Dokter / Bidan</h2>
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
        Data Dokter / Bidan
    </div>
    <div class="card-body">
        @if(Session::get('userAuth')['role_id'] == 1 || Session::get('userAuth')['role_id'] == 2)
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('dokter.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah Dokter / Bidan</a>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama Dokter / Bidan</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Dusun</th>
                @if(Session::get('userAuth')['role_id'] == 1)
                <th width="170px">Action</th>
                @endif
            </tr>
            @if(is_array($dokter) || is_object($dokter))
            @foreach($dokter as $dokter)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dokter['nama_dokter'] }}</td>
                <td>{{ $dokter['no_telp'] }}</td>
                <td>{{ $dokter['alamat'] }}</td>
                <td>{{ $dokter['dusun']['nama_dusun'] }}</td>
                @if(Session::get('userAuth')['role_id'] == 1)
                <td>
                    <div class="row m-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('dokter.edit', $dokter['id']) }}"><i
                                class='fas fa-edit mr-1'></i>Edit</a>
                        <form method="POST" action="{{ route('dokter.destroy', [$dokter['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm ml-1"
                                onclick="return confirm('Yakin Menghapus Data?')"><i
                                    class='fas fa-trash mr-1'></i>Delete</button>
                        </form>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

@endsection