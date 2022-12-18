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

<div class="card mt-2">
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('vitamin.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah Vitamin</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Vitamin</th>
                <th width="280px">Action</th>
            </tr>
            @if(is_array($vitamin) || is_object($vitamin))
            @foreach($vitamin as $vitamin)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $vitamin['nama_vitamin'] }}</td>
                <td>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

@endsection