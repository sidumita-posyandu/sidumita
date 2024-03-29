@extends('layouts.app')

@section('link')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Jadwal Pemeriksaan</h2>
        </div>
    </div>
</div>

@if(session()->has('suksesInputJadwal'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{@Session::get('suksesInputJadwal')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        {{@Session::forget('suksesInputJadwal')}}
    </button>
</div>
@endif

<div class="card shadow">
    <div class="card-body">
        <div id="calendar"></div>
    </div>
</div>

<div class="card shadow mt-2">
    <div class="card-header font-weight-bold text-success">
        Jadwal Pemeriksaan
    </div>
    <div class="card-body">
        @if(Session::get('userAuth')['role_id'] < 3)
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('jadwal-pemeriksaan.create') }}"><i class="fas fa-plus mr-1"></i>
                Tambah Jadwal Pemeriksaan</a>
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Jenis Pemeriksaan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Berakhir</th>
                <th>Dusun</th>
                @if(Session::get('userAuth')['role_id'] < 3)
                <th>Action</th>
                @endif
            </tr>

            @foreach ($jadwal_pemeriksaan as $k => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['jenis_pemeriksaan'] }}</td>
                <td>{{ $item['waktu_mulai'] }}</td>
                <td>{{ $item['waktu_berakhir'] }}</td>
                <td>{{ $item['nama_dusun'] }}</td>
                @if(Session::get('userAuth')['role_id'] < 3)
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('jadwal-pemeriksaan.edit', $item['id']) }}"></i>Edit</a>
                            <form method="POST" action="{{ route('jadwal-pemeriksaan.destroy', [$item['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="dropdown-item" type="submit" onclick="return confirm('Yakin Menghapus Data?')">Delete</button>
                        </form>
                        </div>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                <?php
                //melakukan looping
                foreach ($jadwal_pemeriksaan as $key => $value) {
                ?> {
                        title: '<?php echo $value['jenis_pemeriksaan']; ?>',
                        start: '<?php echo $value['waktu_mulai']; ?>',
                        end: '<?php echo $value['waktu_berakhir']; ?>',
                    },
                <?php } ?>
            ],
            eventColor: '#18a874',
            selectOverlap: function(event) {
                return event.rendering === 'background';
            }
        });

        calendar.render();
    });
</script>
@endsection