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

<div class="card shadow mt-2">
    <div class="card-header">
        <strong class="text-success">Master Data Provinsi</strong>
    </div>
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('provinsi.create') }}"><i
                    class="fas fa-plus mr-1"></i> Tambah Provinsi</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Provinsi</th>
                <th width="170px">Action</th>
            </tr>
            @if(is_array($provinsi) || is_object($provinsi))
            @foreach ($provinsi as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['nama_provinsi'] }}</td>
                <td>
                    <div class="row m-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('provinsi.edit', $item['id']) }}"><i
                                class='fas fa-edit mr-1'></i>Edit</a>
                        <form method="POST" action="{{ route('provinsi.destroy', [$item['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm ml-1"
                                onclick="return confirm('Yakin Menghapus Data?')"><i
                                    class='fas fa-trash mr-1'></i>Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

@endsection