@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Manajemen Vitamin</h2>
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
        Master Data Vitamin
    </div>
    <div class="card-body">
        @if(Session::get('userAuth')['role_id'] == 1)
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('vitamin.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah Vitamin</a>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Vitamin</th>
                <th>Dosis</th>
                <th>Catatan</th>
                @if(Session::get('userAuth')['role_id'] == 1)
                <th width="170px">Action</th>
                @endif
            </tr>
            @if(is_array($vitamin) || is_object($vitamin))
            @foreach($vitamin as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['nama_vitamin'] }}</td>
                <td>{{ $item['dosis'] }}</td>
                <td>{{ $item['catatan'] }}</td>
                @if(Session::get('userAuth')['role_id'] == 1)
                <td>
                    <div class="row m-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('vitamin.edit', $item['id']) }}"><i
                                class='fas fa-edit mr-1'></i>Edit</a>
                        <form method="POST" action="{{ route('vitamin.destroy', [$item['id']]) }}">
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