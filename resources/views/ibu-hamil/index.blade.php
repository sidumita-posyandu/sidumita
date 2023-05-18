@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen Ibu Hamil</h2>
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
        Data Ibu Hamil
    </div>
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('ibu-hamil.create') }}"><i
                    class="fas fa-plus mr-1"></i>
                Tambah Ibu Hamil</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th width="50px">No</th>
                <th width="500px">Nama Ibu Hamil</th>
                <th>Tanggal Lahir</th>
                <th width="190px">Action</th>
            </tr>
            @if(is_array($ibu_hamil) || is_object($ibu_hamil))
            @foreach ($ibu_hamil as $k => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['detail_keluarga']['nama_lengkap'] }}</td>
                <td>{{ $item['detail_keluarga']['tanggal_lahir'] }}</td>
                <td>
                    <div class="row m-auto">
                        <form method="POST" action="{{ route('ibu-hamil.destroy', [$item['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm ml-1"
                                onclick="return confirm('Yakin Menghapus Data?')"><i
                                    class='fas fa-trash mr-1'></i>Delete</button>
                        </form>
                        <a class="btn btn-info btn-sm ml-1" href="{{ route('rekap-ibu-hamil', [$item['id']]) }}"><i
                                class="fas fa-edit mr-1"></i>
                            Rekap</a>
                    </div>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
        <div class="d-flex justify-content-center">
            {{ $ibu_hamil->links() }}
        </div>
    </div>
</div>
@endsection