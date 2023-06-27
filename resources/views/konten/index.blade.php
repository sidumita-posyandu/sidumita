@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Konten</h2>
        </div>
    </div>
</div>

<div class="card shadow mt-2">
    <div class="card-header">
        <strong class="text-success">Konten</strong>
    </div>
    <div class="card-body">
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('konten.create') }}"><i
                    class="fas fa-plus mr-1"></i> Tambah Konten</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Konten</th>
                <th>Gambar
                <th width="170px">Action</th>
            </tr>
            @if(is_array($konten) || is_object($konten))
            @foreach ($konten as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['judul'] }}</td>
                <td>{{ $item['konten'] }}</td>
                <td><img src="{{ $item['image'] }}" alt="konten" style="width: 100px;"></td>
                <td>
                    <div class="row m-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('konten.edit', $item['id']) }}"><i
                                class='fas fa-edit mr-1'></i>Edit</a>
                        <form method="POST" action="{{ route('konten.destroy', $item['id']) }}">
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
            @endif
        </table>
    </div>
</div>

@endsection