@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Manajemen Role</h2>
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
        <strong class="text-success">Master Data Role</strong>
    </div>
    <div class="card-body">
        <!-- <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('roles.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah Role</a>
        </div> -->
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Role</th>
                <!-- <th width="170px">Action</th> -->
            </tr>
            @if(is_array($roles) || is_object($roles))
            @foreach ($roles as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['role'] }}</td>
                <!-- <td>
                </td> -->
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>

@endsection