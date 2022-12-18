@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Manajemen Provinsi</h2>
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
            <a class="btn btn-success btn-sm mb-2" href="{{ route('provinsi.create') }}"><i
                    class="fas fa-plus mr-1"></i> Tambah Provinsi</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Provinsi</th>
                <th width="280px">Action</th>
            </tr>
            @if(is_array($provinsi) || is_object($provinsi))
            @foreach ($provinsi as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['nama_provinsi'] }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('provinsi.edit', $item['id']) }}">Edit</a>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

@endsection