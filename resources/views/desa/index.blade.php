@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Manajemen Desa</h2>
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
            <a class="btn btn-success btn-sm mb-2" href="{{ route('desa.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah Desa</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th wiDth="280px">Action</th>
            </tr>
            @if(is_array($desa) || is_object($desa))
            @foreach ($desa as $p)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $p['nama_desa'] }}</td>
                <td>{{ $p['kecamatan']['nama_kecamatan'] }}</td>
                <td>
                    <a class="btn btn-info" href="#">Show</a>
                    <a class="btn btn-primary" href="#">Edit</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

@endsection