@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manajemen ibu-hamil</h2>
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
            <a class="btn btn-success btn-sm mb-2" href="{{ route('ibu-hamil.create') }}"><i
                    class="fas fa-plus mr-1"></i>
                Tambah Ibu Hamil</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th width="50px">No</th>
                <th width="500px">Nama Ibu Hamil</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th width="100px">Action</th>
            </tr>
            @if(is_array($ibu_hamil) || is_object($ibu-hamil))
            @foreach ($ibu_hamil as $k => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['detail_keluarga']['nama_lengkap'] }}</td>
                <td>{{ $item['detail_keluarga']['tanggal_lahir'] }}</td>
                <td>{{ $item['detail_keluarga']['jenis_kelamin'] }}</td>
                <td>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@endsection