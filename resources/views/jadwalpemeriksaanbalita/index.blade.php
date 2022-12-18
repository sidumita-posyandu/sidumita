@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Jadwal Pemeriksaan Balita</h2>
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
            <a class="btn btn-success btn-sm mb-2" href="{{ route('jadwalpemeriksaanbalita.create') }}"><i
                    class="fas fa-plus mr-1"></i>
                Tambah Jadwal Pemeriksaan Balita</a>
            @endcan
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Jenis Pemeriksaan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Dusun</th>
                <th>Status</th>
                <th width="230px">Action</th>
            </tr>

            @foreach ($jadwalpemeriksaanbalita as $k => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->jenis_pemeriksaan }}</td>
                <td>{{ $item->waktu_mulai }}</td>
                <td>{{ $item->waktu_berakhir }}</td>
                <td>{{ $item->dusun->nama_dusun }}</td>
                @if($item->isApprove == 1)
                <td><label class="badge bg-success text-light">Approve</label></td>
                @elseif($item->isApprove == 2)
                <td><label class="badge bg-warning text-light">Revision</label></td>
                @elseif($item->isApprove == 3)
                <td><label class="badge bg-danger text-light">Decline</label></td>
                @else
                <td><label class="badge bg-danger text-light">Pending</label></td>
                @endif
                <td>
                    <a class="btn btn-info" href="{{ route('jadwalpemeriksaanbalita.show',$item->id) }}">Show</a>
                    @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('jadwalpemeriksaanbalita.edit',$item->id) }}">Edit</a>
                    @endcan
                    {!! Form::open(['method' => 'DELETE','route' => ['jadwalpemeriksaanbalita.destroy',
                    $item->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>


{!! $jadwalpemeriksaanbalita->render() !!}
@endsection