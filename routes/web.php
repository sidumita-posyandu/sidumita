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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);

Route::resource('provinsi', ProvinsiController::class);
Route::resource('kabupaten', KabupatenController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('desa', DesaController::class);
Route::resource('dusun', DusunController::class);

Route::resource('keluarga', KeluargaController::class);
Route::resource('balita', BalitaController::class);
// Route::resource('ibu-hamil', IbuHamilController::class);

Route::resource('jadwal-pemeriksaan', JadwalPemeriksaanController::class);
Route::resource('pemeriksaan-balita', PemeriksaanBalitaController::class);
Route::resource('vitamin', VitaminController::class);
Route::resource('vaksin', VaksinController::class);