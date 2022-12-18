<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Dusun;
use App\Keluarga;
use App\DetailKeluarga;

class KeluargaController extends Controller
{

    public function index(Request $request)
    {
        $response = Http::get('http://127.0.0.1:8080/api/keluarga')->json();
        $keluarga = $response['data'];

        return view('keluarga.index', compact('keluarga'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $response = Http::get('http://127.0.0.1:8080/api/dusun')->json();
        $dusun = $response['data'];

        return view('keluarga.create', compact('dusun'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();
        
        $response = Http::post('http://127.0.0.1:8080/api/keluarga', [
            'no_kartu_keluarga' => $data['no_kartu_keluarga'],
            'kepala_keluarga' => $data['kepala_keluarga'],
            'alamat' => $data['alamat'],
            'jumlah' => $data['jumlah'],
            'user_id' => 1,
            'dusun_id' => $data['dusun_id'],
        ]);

        $getId = Http::get('http://127.0.0.1:8080/api/keluarga')->json();
            $maxId = max($getId['data'])['id'];
        
        foreach ($data['nik'] as $item => $value) {          
            $response2 = Http::post('http://127.0.0.1:8080/api/detail-keluarga', [
                'keluarga_id' => $maxId,
                'nik' => $data['nik'][$item],
                'nama_lengkap' => $data['nama_lengkap'][$item],
                'jenis_kelamin' => $data['jenis_kelamin'][$item],
                'tempat_lahir' => $data['tempat_lahir'][$item],
                'tanggal_lahir' => $data['tanggal_lahir'][$item],
                'agama' => $data['agama'][$item],
                'pendidikan' => $data['pendidikan'][$item],
                'no_telp' => $data['no_telp'][$item],
                'golongan_darah' => $data['golongan_darah'][$item],
                'jenis_pekerjaan' => $data['jenis_pekerjaan'][$item],
                'status_perkawinan' => $data['status_perkawinan'][$item],
                'status_dalam_keluarga' => $data['status_dalam_keluarga'][$item],
                'kewarganegaraan' => $data['kewarganegaraan'][$item],
            ]);
        }
        
        return redirect()->route('keluarga.index')
                        ->with('success','Data Keluarga berhasil dibuat.');
    }
    
    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/keluarga/'.' '.$id)->json();
        $keluarga = $response['data'];
        
        return view('keluarga.show',compact('keluarga'));
    }

    
    public function edit(Keluarga $keluarga)
    {
        return view('keluarga.edit',compact('keluarga'));
    }
    
    public function update(Request $request, Keluarga $keluarga)
    {
        // request()->validate([
        //     'no_kartu_keluarga' => 'required',
        //     'kepala_keluarga' => 'required',
        //     'alamat' => 'required',
        //     'jumlah' => 'required',
        //     'dusun_id' => 'required',
        // ]);
    
        $keluarga->update($request->all());
    
        return redirect()->route('keluarga.index')
                        ->with('success','Data Keluarga Berhasil Diperbarui');
    }
    
    public function destroy(Keluarga $keluarga)
    {
        $keluarga->delete();
    
        return redirect()->route('keluarga.index')
                        ->with('success','Data keluarga berhasil dihapus');
    }
}