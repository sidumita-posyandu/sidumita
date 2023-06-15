<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('/forget-password', [App\Http\Controllers\Auth\ForgetPasswordController::class, 'index'])->name('forget-password');
Route::post('/forget-password/store', [App\Http\Controllers\Auth\ForgetPasswordController::class, 'store'])->name('forget-password.store');
Route::get('/resetPassword', [App\Http\Controllers\Auth\ForgetPasswordController::class, 'getResetRequest'])->name('getResetRequest');
Route::post('/resetPassword/store', [App\Http\Controllers\Auth\ForgetPasswordController::class, 'setResetRequest'])->name('getResetRequest.store');
Route::post('/login/authenticate', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login.store');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/', [App\Http\Controllers\HomeController::class, 'peserta'])->name('peserta');

Route::get('/konten/{id}', [App\Http\Controllers\Peserta\KontenController::class, 'show'])->name('peserta.konten.show');

Route::group([
    'middleware' => ['ceklogin', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::group(['middleware' => ['superadmin']], function () {
        Route::resource('provinsi', ProvinsiController::class);
        Route::resource('kabupaten', KabupatenController::class);
        Route::resource('kecamatan', KecamatanController::class);
        Route::resource('desa', DesaController::class);
        Route::resource('dusun', DusunController::class);
        
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
    });

    Route::resource('vitamin', VitaminController::class);
    Route::resource('vaksin', VaksinController::class);
    
    Route::resource('keluarga', KeluargaController::class);
    Route::get('detail-keluarga/create/{id}',[App\Http\Controllers\DetailKeluargaController::class, 'create'])->name('detail-keluarga.create');
    Route::post('detail-keluarga/store/{id}',[App\Http\Controllers\DetailKeluargaController::class, 'store'])->name('detail-keluarga.store');
    Route::get('detail-keluarga/edit/{id}',[App\Http\Controllers\DetailKeluargaController::class, 'edit'])->name('detail-keluarga.edit');
    Route::patch('detail-keluarga/update/{id}',[App\Http\Controllers\DetailKeluargaController::class, 'update'])->name('detail-keluarga.update');
    Route::resource('balita', BalitaController::class);
    Route::resource('ibu-hamil', IbuHamilController::class);
    
    Route::resource('jadwal-pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('pemeriksaan-balita', PemeriksaanBalitaController::class);
    Route::get('/pemeriksaan-balita/create/{id}', [App\Http\Controllers\PemeriksaanBalitaController::class, 'createWithId'])->name('create-balita-id');
    Route::get('/pemeriksaan-ibu-hamil/create/{id}', [App\Http\Controllers\PemeriksaanIbuHamilController::class, 'createWithId'])->name('create-ibu-hamil-id');
    Route::resource('pemeriksaan-ibuhamil', PemeriksaanIbuHamilController::class);

    Route::get('/rekap-pemeriksaan-balita/{id}', [App\Http\Controllers\PemeriksaanBalitaController::class, 'rekap_balita'])->name('rekap-balita');
    Route::get('/rekap-pemeriksaan-ibu-hamil/{id}', [App\Http\Controllers\PemeriksaanIbuHamilController::class, 'rekap_ibu_hamil'])->name('rekap-ibu-hamil');

    Route::get('/petugas-kesehatan/profile', [App\Http\Controllers\PetugasKesehatanController::class, 'profile'])->name('petugas.profile');
    Route::post('/petugas-kesehatan/profile/{id}', [App\Http\Controllers\PetugasKesehatanController::class, 'update'])->name('petugas.update');

    Route::resource('dokter', DokterController::class);

    Route::resource('konten', KontenController::class);
});

Route::group(['middleware' => ['ceklogin']], function () {
    Route::get('/keluarga', [App\Http\Controllers\Peserta\KeluargaController::class, 'index'])->name('peserta.keluarga.index');
    Route::get('/pemeriksaan-balita', [App\Http\Controllers\Peserta\PemeriksaanBalitaController::class, 'index'])->name('peserta.periksa.index');
    Route::get('/pemeriksaan-balita/{id}', [App\Http\Controllers\Peserta\PemeriksaanBalitaController::class, 'detBalita'])->name('peserta.periksa.detail');
    Route::get('/grafik-pertumbuhan-balita/{id}', [App\Http\Controllers\Peserta\PemeriksaanBalitaController::class, 'rekap_balita'])->name('peserta.periksa.grafik');
    Route::get('/history-pertumbuhan-balita/{id}', [App\Http\Controllers\Peserta\HistoryPemeriksaanController::class, 'balita'])->name('peserta.periksa.history');

    Route::get('/pemeriksaan-ibu-hamil', [App\Http\Controllers\Peserta\PemeriksaanIbuHamilController::class, 'index'])->name('peserta.periksa-ibuhamil.index');
    Route::get('/pemeriksaan-ibu-hamil/{id}', [App\Http\Controllers\Peserta\PemeriksaanIbuHamilController::class, 'detIbuHamil'])->name('peserta.periksa-ibuhamil.detail');
    Route::get('/grafik-pertumbuhan-ibu-hamil/{id}', [App\Http\Controllers\Peserta\PemeriksaanIbuHamilController::class, 'rekap_ibu_hamil'])->name('peserta.periksa-ibuhamil.grafik');
    Route::get('/history-pertumbuhan-ibu-hamil/{id}', [App\Http\Controllers\Peserta\HistoryPemeriksaanController::class, 'ibuHamil'])->name('peserta.periksa-ibuhamil.history');    
    });