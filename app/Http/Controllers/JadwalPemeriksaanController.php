<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class JadwalPemeriksaanController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('http://127.0.0.1:8080/api/jadwal-pemeriksaan')->json();
        $jadwal_pemeriksaan = $response['data'];
        
        return view('jadwal-pemeriksaan.index',compact('jadwal_pemeriksaan'))
            ->with('i', ($request->input('jadwal-pemeriksaan', 1) - 1) * 5);   
    }
    
    public function create()
    {
        $response = Http::get('http://127.0.0.1:8080/api/dusun')->json();
        $dusun = $response['data'];

        $response2 = Http::get('http://127.0.0.1:8080/api/keluarga')->json();
        $keluarga = $response2['data'];
        
        return view('jadwal-pemeriksaan.create', compact('dusun', 'keluarga'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'jenis_pemeriksaan' => 'required',
            'waktu_mulai' => 'required',
            'waktu_berakhir' => 'required',
            'dusun_id' => 'required',
            'keluarga_id' => 'required',
            'operator_posyandu_id' => 'required',
        ]);
        
        $response = Http::post('http://127.0.0.1:8080/api/jadwal-pemeriksaan', [
            'jenis_pemeriksaan' => $request->jenis_pemeriksaan,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_berakhir' => $request->waktu_berakhir,
            'dusun_id' => $request->dusun_id,
            'keluarga_id' => $request->keluarga_id,
            'operator_posyandu_id' => $request->operator_posyandu_id,
        ]);
            
        return redirect()->route('jadwal-pemeriksaan.index')
                        ->with('success','Data jadwal-pemeriksaan berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/jadwal-pemeriksaan/'.' '.$id)->json();
        $jadwal_pemeriksaan = $response['data'];
        
        return view('jadwal-pemeriksaan.show',compact('jadwal-pemeriksaan'));
    }
    
    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/jadwal-pemeriksaan/'.' '.$id)->json();
        $jadwal_pemeriksaan = $response['data'];
        
        return view('jadwal-pemeriksaan.edit',compact('jadwal-pemeriksaan'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_jadwal-pemeriksaan' => 'required',
            'desa_id' => 'required',
        ]);

        $response = Http::patch('http://127.0.0.1:8080/api/jadwal-pemeriksaan/'.' '.$id, [
            'nama_jadwal-pemeriksaan' => $request->nama_jadwal-pemeriksaan,
            'desa_id' => $request->desa_id,
        ]);
        
        return redirect()->route('jadwal-pemeriksaan.index')
                        ->with('success','Data jadwal-pemeriksaan Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('http://127.0.0.1:8080/apijadwal-pemeriksaann'.' '.$id)->json();
    
        return redirect()->route('jadwal-pemeriksaan.index')
                        ->with('success','Data jadwal-pemeriksaan berhasil dihapus');
    }
}