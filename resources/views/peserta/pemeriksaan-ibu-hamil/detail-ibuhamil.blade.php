@extends('peserta.layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" value="{{ $ibu_hamil['nama_lengkap'] }}"
                    readonly>
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin"
                            value="{{ $ibu_hamil['jenis_kelamin'] }}" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="umur_kandungan">Umur Kandungan</label>
                        <input type="text" class="form-control" id="umur"
                            value="{{ $det_ibu_hamil['umur_kandungan'] }} Minggu" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir"
                            value="{{ $ibu_hamil['tanggal_lahir'] }}" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                        <input type="date" class="form-control" id="tanggal_pemeriksaan"
                            value="{{ $det_ibu_hamil['tanggal_pemeriksaan'] }}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-sm-6"><label for="tinggi_badan">Tinggi Badan (cm)</label>
                        <input type="text" class="form-control" id="tinggi_badan"
                            value="{{ $det_ibu_hamil['tinggi_badan'] }}" readonly>
                    </div>
                    <div class="col-sm-6"><label for="tempat_lahir">Berat Badan (kg)</label>
                        <input type="text" class="form-control" id="tempat_lahir"
                            value="{{ $det_ibu_hamil['berat_badan'] }}" readonly></input>
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <div class="row">
                    <div class="col-sm-6"><label for="lingkar_perut">Lingkar Perut (cm)</label>
                        <input type="text" class="form-control" id="lingkar_perut"
                            value="{{ $det_ibu_hamil['lingkar_perut'] }}" readonly>
                    </div>
                    <div class="col-sm-6"><label for="denyut_nadi">Denyut Nadi</label>
                        <input type="text" class="form-control" id="denyut_nadi"
                            value="{{ $det_ibu_hamil['denyut_nadi'] }}" readonly></input>
                    </div>
                </div>
            </div>
            <figcaption class="figure-caption">*Data diatas diambil dari pemeriksaan terbaru. Silahkan pilih menu
                "History Pemeriksaan" untuk melihat pemeriksaan sebelumnya</figcaption>
            <div class="form-group mb-3 mt-2">
                <a href="{{ route('peserta.periksa-ibuhamil.grafik', [$det_ibu_hamil['ibu_hamil_id']]) }}" type="button"
                    class="btn btn-success w-100">Lihat Grafik Pertumbuhan</a>
                <hr class="hr" />
                <a href="" type="button" class="btn btn-secondary w-100">History Pemeriksaan</a>
            </div>
        </div>
        <div class="col-sm-6">
            <h6>Informasi</h6>
            <p>
                <a style="text-decoration: none;" class="text-dark" data-bs-toggle="collapse" href="#grafikinfo"
                    role="button" aria-expanded="false" aria-controls="grafikinfo">
                    <div class="float-left">Apa itu grafik pertumbuhan anak?</div>
                </a>
            </p>
            <div class="collapse" id="grafikinfo">
                <div class="card card-body">
                    Grafik pertumbuhan ini dapat membantu Anda dan dokter spesialis anak untuk melacak pertumbuhan anak
                    dari waktu ke waktu. Pertumbuhan panjang badan, berat badan, dan lingkar kepala anak dapat
                    dibandingkan dengan parameter sesuai dengan usia dan jenis kelamin yang sama guna mengetahui apakah
                    pertumbuhan anak sudah sesuai.
                </div>
            </div>
            <hr>
            <p>
                <a style="text-decoration: none;" class="text-dark" data-bs-toggle="collapse" href="#carabacagrafik"
                    role="button" aria-expanded="false" aria-controls="carabacagrafik">
                    <div class="float-left">Bagaimana cara membaca grafik pertumbuhan anak? (Z-score)</div>
                </a>
            </p>
            <div class="collapse" id="carabacagrafik">
                <div class="card card-body">
                    Z-score, atau dikenal juga sebagai Standar Deviasi (SD), digunakan untuk menggambarkan seberapa jauh
                    suatu pengukuran dari nilai rata-ratanya. Rata-rata yang dimaksud di sini adalah ukuran jarak antara
                    nilai (panjang badan, berat badan, lingkar kepala) anak dan nilai populasi di usia dan jenis kelamin
                    yang sama.

                    Jika anak memiliki Z-score 0, artinya, nilai anak sama dengan nilai rata-rata. Nilai tersebut bisa
                    positif atau negatif yang menunjukkan apakah nilai tertentu lebih besar (dalam kasus +) atau kurang
                    (dalam kasus -) dari skor median pada populasi yang sama.

                    Berat badan anak sesuai usia (berdasarkan Z-score)
                    < -3 SD Berat badan sangat kurang -3 hingga -2 SD Berat badan kurang – 2.00 hingga +2 Berat badan
                        normal> +2 Berat badan lebih

                        Panjang badan anak sesuai usia (berdasarkan Z-score)
                        < -3 SD Sangat pendek (severely stunting) -3 hingga < -2 Pendek (stunted) -2.00 hingga +3
                            Normal> +3 Tinggi
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection