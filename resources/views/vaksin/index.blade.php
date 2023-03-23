@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Manajemen Vaksin</h2>
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
        Master Data Vaksin
    </div>
    <div class="card-body">
        @if(Session::get('userAuth')['role_id'] == 1)
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('vaksin.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah vaksin</a>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Vaksin</th>
                <th>Dosis</th>
                <th>Catatan</th>
                <th>Status</th>
                @if(Session::get('userAuth')['role_id'] == 1)
                <th width="170px">Action</th>
                @endif
            </tr>
            @if(is_array($vaksin) || is_object($vaksin))
            @foreach($vaksin as $vaksin)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $vaksin['nama_vaksin'] }}</td>
                <td>{{ $vaksin['dosis'] }}</td>
                <td>{{ $vaksin['catatan'] }}</td>
                <td>{{ $vaksin['status'] }}</td>
                @if(Session::get('userAuth')['role_id'] == 1)
                <td>
                    <div class="row m-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('vaksin.edit', $vaksin['id']) }}"><i
                                class='fas fa-edit mr-1'></i>Edit</a>
                        <form method="POST" action="{{ route('vaksin.destroy', [$vaksin['id']]) }}">
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