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
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/keluarga')->json();
        $keluarga = $response['data'];

        return view('keluarga.index', compact('keluarga'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/dusun')->json();
        $dusun = $response['data'];

        return view('keluarga.create', compact('dusun'));
    }
    
    public function store(Request $request)
    {
        $data = $request->all();

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post('http://127.0.0.1:8080/api/keluarga', [
            'no_kartu_keluarga' => $request->no_kartu_keluarga,
            'kepala_keluarga' => $request->kepala_keluarga,
            'alamat' => $request->alamat,
            'jumlah' => $request->jumlah,
            'user_id' => 1,
            'dusun_id' => $request->dusun_id,
        ]);

        $getId = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/keluarga')->json();
        $maxId = max($getId['data'])['id'];

        // dd($data);
        
        foreach ($data['nik'] as $item => $value) {          
            $response2 = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->post('http://127.0.0.1:8080/api/detail-keluarga', [
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
    
    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/keluarga/'.' '.$id)->json();
        $keluarga = $response['data'];
        
        return view('keluarga.show',compact('keluarga'));
    }

    
    public function edit($id)
    {
        // return view('keluarga.edit',compact('keluarga'));
    }
    
    public function update(Request $request, $id)
    {
        // $keluarga->update($request->all());
    
        // return redirect()->route('keluarga.index')
        //                 ->with('success','Data Keluarga Berhasil Diperbarui');
    }
    
    public function destroy($id)
    {
        // $keluarga->delete();
    
        // return redirect()->route('keluarga.index')
        //                 ->with('success','Data keluarga berhasil dihapus');
    }
}