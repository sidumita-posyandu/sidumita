@extends('peserta.layouts.app')

@section('content')
<div class="container mb-5">
    <div class="row">
        <div class="col-md-8">
            <h1>{{$konten['judul']}}</h1>
            <img src="{{$konten['image']}}" class="card-img-top">
            <p class="mt-3">{{$konten['konten']}}</p>
        </div>
        <div class="col-md-4">
            <h2 class="text-center">Artikel Lainnya</h2>
            <?php $count = 0; ?>
            @foreach($datakonten as $key => $listkonten)
            <?php if ($count == 2) break; ?>
            <div class="mb-2">
                <div class="card mt-2 border-0">
                    <div class="card-body">
                        <img src="{{$listkonten['image']}}" class="card-img-top">
                        <a href="{{ route('peserta.konten.show', $listkonten['id']) }}" style="text-decoration:none; color:black;">
                            <h4>{{$listkonten['judul']}}</h4>
                        </a>
                    </div>
                </div>
            </div>
            <?php $count++; ?>
            @endforeach
        </div>
    </div>
</div>
@endsection