<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetugasKesehatanController extends Controller
{
    public function profile(Request $request){
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'me/petugas')->json();
        $petugas = $response['data'];

        return view('petugas-kesehatan.profile', compact('petugas'));
    }

    public function update(Request $request, $id){
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'me/update-petugas', [
            'nama' => request('nama'), 
            'jenis_kelamin' => request('jenis_kelamin'), 
            'tempat_lahir' => request('tempat_lahir'), 
            'tanggal_lahir' => request('tanggal_lahir'), 
            'no_telp' => request('no_telp'), 
            'nik' => request('nik'),
            'alamat' => request('alamat'),
            'dusun_id' => request('dusun_id'),
        ]);

        return redirect()->route('petugas.profile');
    }
}