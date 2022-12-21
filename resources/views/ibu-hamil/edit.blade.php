@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Pemeriksaan Balita</h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>

<div class="card">
    <div class="card-body">
        <table>
            <tr>
                <th>Nama Balita</th>
                <td>{{ $balita->nama_balita }}</td>
            </tr>
        </table>
    </div>
</div>
@endif
@endsection