@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen Kabupaten</h2>
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
            <a class="btn btn-success btn-sm mb-2" href="{{ route('kabupaten.create') }}"><i
                    class="fas fa-plus mr-1"></i> Tambah Kabupaten</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Kabupaten</th>
                <th>Kabupaten</th>
                <th width="280px">Action</th>
            </tr>
            @if(is_array($kabupaten) || is_object($kabupaten))
            @foreach ($kabupaten as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['nama_kabupaten'] }}</td>
                <td>{{ $item['provinsi']['nama_provinsi'] }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('kabupaten.edit', $item['id']) }}">Edit</a>
                    <a class="btn btn-danger" href="#">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@endsection