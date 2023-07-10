@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-secondary btn-sm mb-3" href="{{ route('users.index') }}"><i
                    class="fas fa-arrow-left mr-1"></i> Kembali</a>
        </div>
    </div>
</div>


@if ($errors->any())
<div class="alert alert-danger">
    Terjadi kesalahan dengan input yang dimasukan.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="card shadow">
        <div class="card-header font-weight-bold text-success">
            Data User
        </div>
        <div class="row m-2">
            <div class="col-sm-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="name" class="form-control" value="{{ $user['name'] }}">
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" value="{{ $user['email'] }}">
                </div>
                <div class="form-group">
                    <strong>Role:</strong>
                    <select class="form-control role_id" id="role_id" name="role_id">
                        <option value="" selected disabled>-- Pilih Role --</option>
                        @foreach ($role as $p)
                        <option @if ($p['id']==$user['role_id']) selected="true" @endif value="{{ $p['id'] }}">{{ $p['role'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success btn-block">Submit</button>
    </div>
</form>
@endsection

@section('script')
<script>
$(document).ready(function() {
    $('#daerah-form').hide();
    $('#role_id').on('change', function() {
        var role = $("#role_id").val();
        if (role == 2) {
            $('#daerah-form').show();
            $('#desa-form').hide();
            $('#dusun-form').hide();
        } else if (role == 3) {
            $('#daerah-form').show();
            $('#desa-form').show();
            $('#dusun-form').show();
        }
    });
});
</script>
<script>
$(document).ready(function() {
    var token = @json($token);
    $('#provinsi').on('change', function() {
        var idProvinsi = this.value;
        $("#kabupaten").html('');
        $.ajax({
            url: "{{ env('BASE_API_URL') }}fetch-provinsi",
            type: "POST",
            headers: {
                "Authorization": "Bearer " + token
            },
            data: {
                provinsi_id: idProvinsi,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#kabupaten').html('<option value="">-- Pilih Kabupaten --</option>');
                $.each(result.data, function(key, value) {
                    $("#kabupaten").append('<option value="' + value.id + '">' +
                        value.nama_kabupaten + '</option>');
                });
            }
        });
    });

    $('#kabupaten').on('change', function() {
        var idKabupaten = this.value;
        $("#kecamatan").html('');
        $.ajax({
            url: "{{ env('BASE_API_URL') }}fetch-kabupaten",
            type: "POST",
            headers: {
                "Authorization": "Bearer " + token
            },
            data: {
                kabupaten_id: idKabupaten,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
                $.each(result.data, function(key, value) {
                    $("#kecamatan").append('<option value="' + value.id + '">' +
                        value.nama_kecamatan + '</option>');
                });
            }
        });
    });

    $('#kecamatan').on('change', function() {
        var idKecamatan = this.value;
        $("#desa").html('');
        $.ajax({
            url: "{{ env('BASE_API_URL') }}fetch-kecamatan",
            type: "POST",
            headers: {
                "Authorization": "Bearer " + token
            },
            data: {
                kecamatan_id: idKecamatan,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#desa').html('<option value="">-- Pilih Desa --</option>');
                $.each(result.data, function(key, value) {
                    $("#desa").append('<option value="' + value.id + '">' + value
                        .nama_desa + '</option>');
                });
            }
        });
    });

    $('#desa').on('change', function() {
        var idDesa = this.value;
        $("#dusun").html('');
        $.ajax({
            url: "{{ env('BASE_API_URL') }}fetch-desa",
            type: "POST",
            headers: {
                "Authorization": "Bearer " + token
            },
            data: {
                desa_id: idDesa,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success: function(result) {
                $('#dusun').html('<option value="">-- Pilih Dusun --</option>');
                $.each(result.data, function(key, value) {
                    $("#dusun").append('<option value="' + value.id + '">' + value
                        .nama_dusun + '</option>');
                });
            }
        });
    });
});
</script>
@endsection
