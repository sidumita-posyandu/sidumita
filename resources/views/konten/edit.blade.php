@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Konten</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('konten.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
        </div>
    </div>
</div>

<form action="{{ route('konten.updateKonten',$konten['id'])  }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card shadow">
        <div class="card-header font-weight-bold">
            Data Konten
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Judul:</strong>
                    <input type="text" name="judul" class="form-control" value="{{$konten['judul']}}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Isi Konten:</strong>
                    <input type="text" name="konten" class="form-control" value="{{$konten['konten']}}">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Gambar</strong><br>
                    <input type="file" id="gambar" class="form-control-plaintext" name="gambar" accept="image/*">
                </div>
            </div>
            <div class="text-center col-sm-12">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </div>


</form>
@endsection