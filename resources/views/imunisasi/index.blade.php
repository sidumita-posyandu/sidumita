@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Manajemen Imunisasi Wajib</h2>
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
            @can('role-create')
            <a class="btn btn-success btn-sm mb-2" href="{{ route('imunisasiwajib.create') }}"><i
                    class="fas fa-plus mr-1"></i>
                Tambah Imunisasi Wajib</a>
            @endcan
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Imunisasi Wajib</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($imunisasiwajib as $p)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $p->nama_imunisasi_wajib }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('imunisasiwajib.show',$p->id) }}">Show</a>
                    @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('imunisasiwajib.edit',$p->id) }}">Edit</a>
                    @endcan
                    @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['imunisasiwajib.destroy',
                    $p->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
        </table>
    </div>


    {!! $imunisasiwajib->render() !!}
</div>

@endsection