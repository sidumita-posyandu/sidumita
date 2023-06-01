@extends('peserta.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h3>List Balita</h3>
            <p>Silahkan pilih balita yang terdaftar untuk melihat pertumbuhan balita dibawah ini</p>
            <div class="form">
                <div class="form-group">
                    <label for="pilih_balita"><strong>Pilih Balita</strong></label>
                    @if(is_array($balita) || is_object($balita))
                    @foreach($balita as $b)
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row" style="padding-left: 20px;">
                                <div class="col-sm-2"><i class="fa-solid fa-person" style="font-size: 30px;"></i>
                                </div>
                                <div class="col-8 mt-1">
                                    <h6 class="mb-1">{{$b['detail_keluarga']['nama_lengkap']}}</h6>
                                </div>
                                <div class="col-sm-2 mt-1">
                                    <a href="{{ route('peserta.periksa.detail', [$b['id']]) }}"
                                        style="text-decoration: none;"><i
                                            class="fa-solid fa-arrow-up-right-from-square"></i> Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="text-secondary text-center">{{$balita}}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <h3 class="text-center">Artikel</h3>
        </div>
    </div>
</div>
@endsection