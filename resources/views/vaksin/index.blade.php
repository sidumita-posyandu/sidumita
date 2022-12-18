@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Manajemen vaksin</h2>
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
            <a class="btn btn-success btn-sm mb-2" href="{{ route('vaksin.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah vaksin</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>vaksin</th>
                <th width="280px">Action</th>
            </tr>
            @foreach($vaksin as $vaksin)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $vaksin['nama_vaksin'] }}</td>
                <td>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection