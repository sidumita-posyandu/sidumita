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

@if(session()->has('success'))
<div class="alert alert-success text-center">
    {{ session()->get('success') }}
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
        <div class="pull-right">
            <a class="btn btn-success btn-sm mb-2" href="{{ route('jadwal-pemeriksaan.create') }}"><i
                    class="fas fa-plus mr-1"></i>
                Tambah Jadwal Pemeriksaan</a>
        </div>
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Jenis Pemeriksaan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Berakhir</th>
                <th>Dusun</th>
                <th width="170px">Action</th>
            </tr>

            @foreach ($jadwal_pemeriksaan as $k => $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item['jenis_pemeriksaan'] }}</td>
                <td>{{ $item['waktu_mulai'] }}</td>
                <td>{{ $item['waktu_berakhir'] }}</td>
                <td>{{ $item['nama_dusun'] }}</td>
                <td>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
    integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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