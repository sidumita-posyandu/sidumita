@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen Keluarga</h2>
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
        Data Keluarga
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>No Kartu Keluarga</th>
                <th>Kepala Keluarga</th>
                <th>Email</th>
                <th>Dusun</th>
                <th width="190px">Action</th>
            </tr>
            @if(is_array($keluarga) || is_object($keluarga))
            @foreach ($keluarga as $k)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $k['no_kartu_keluarga'] }}</td>
                <td>{{ $k['kepala_keluarga'] }}</td>
                <td>{{ $k['email'] }}</td>
                <td>{{ $k['nama_dusun'] }}</td>
                @if($k['isValid'] == 0)
                <td>
                <form method="POST" action="{{ route('akun-keluarga.validasi', [$k['user_id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <button type="submit" class="btn btn-success btn-sm ml-1"
                                onclick="return confirm('Validasi User?')"><i
                                    class='fas fa-edit mr-1'></i>Validasi</button>
                        </form>
                </td>
                @else
                <td>User tervalidasi</td>
                @endif
            </tr>
            @endforeach
            @endif
        </table>
        <div class="d-flex justify-content-center">
            {{ $keluarga->links() }}
        </div>
    </div>
</div>
@endsection