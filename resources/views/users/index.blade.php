@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen User</h2>
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
        Data User
    </div>
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('users.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah User</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th width="170px">Action</th>
            </tr>
            @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>
                    <label class="badge bg-success text-light">{{ $user['role']['role'] }}</label>
                </td>
                <td>
                    <div class="row m-auto">
                        <a class="btn btn-primary btn-sm" href="#"><i class='fas fa-edit mr-1'></i>Edit</a>
                        <form method="POST" action="#">
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
        </table>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection