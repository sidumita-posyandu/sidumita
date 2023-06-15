@extends('peserta.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
            <h3>Histori Pemeriksaan Ibu Hamil</h3>
            <table class="table table-bordered mt-3">
            <tr>
                <th width="50px">No</th>
                <th>Tanggal Pemeriksaan</th>
                <th>Umur Kandungan</th>
                <th>Tinggi Badan</th>
                <th>Berat Badan</th>
                <th>Lingkar Perut</th>
                <th>Denyut Nadi</th>
            </tr>
            @php $no = 1; @endphp
            @if(is_array($rekap) || is_object($rekap))
            @foreach ($rekap as $k => $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['tanggal_pemeriksaan'] }}</td>
                <td>{{ $item['umur_kandungan'] }} Minggu</td>
                <td>{{ $item['tinggi_badan'] }}</td>
                <td>{{ $item['berat_badan'] }}</td>
                <td>{{ $item['lingkar_perut'] }}</td>
                <td>{{ $item['denyut_nadi'] }}</td>
            </tr>
            @endforeach
            @endif
        </table>
        </div>
    </div>
</div>
@endsection