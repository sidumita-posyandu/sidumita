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
Route::post('/login/authenticate', [App\Http\Controllers\Auth\LoginController::class, 'authenticate'])->name('login.store');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');

Route::get('/', [App\Http\Controllers\HomeController::class, 'peserta'])->name('peserta');

Route::group([
    'middleware' => ['ceklogin'], 'prefix' => 'admin'], function () {
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
    Route::resource('balita', BalitaController::class);
    Route::resource('ibu-hamil', IbuHamilController::class);
    
    Route::resource('jadwal-pemeriksaan', JadwalPemeriksaanController::class);
    Route::resource('pemeriksaan-balita', PemeriksaanBalitaController::class);
    Route::resource('pemeriksaan-ibuhamil', PemeriksaanIbuHamilController::class);
});