<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class PemeriksaanBalitaController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/pemeriksaan-balita')->json();
        $pemeriksaanbalita = $response['data'];
        
        return view('pemeriksaanbalita.index',compact('pemeriksaanbalita'));

        
    }

    public function create()
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/balita')->json();
        $balita = $response['data'];

        return view('pemeriksaanbalita.create', compact('balita'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        request()->validate([
            'balita_id' => 'required',
            'tanggal_pemeriksaan' => 'required',
            'berat_badan' => 'required',
            'tinggi_badan' => 'required',
            'lingkar_kepala' => 'required',
            'lingkar_lengan' => 'required',
            'keluhan' => 'required',
            'penanganan' => 'required',
            'catatan' => 'required',
            'petugas_kesehatan_id' => 'required',
            'dokter_id' => 'required',
        ]);
        
        $response = Http::post('https://api-sidumita.ftudayana.com/api/pemeriksaan-balita', [
            'balita_id' => $request->balita_id,
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'lingkar_kepala' => $request->lingkar_kepala,
            'lingkar_lengan' => $request->lingkar_lengan,
            'keluhan' => $request->keluhan,
            'penanganan' => $request->penanganan,
            'catatan' => $request->catatan,
            'petugas_kesehatan_id' => $request->petugas_kesehatan_id,
            'dokter_id' => $request->dokter_id,
        ]);
        
        return redirect()->route('pemeriksaan-balita.index')
        ->with('success','Pemeriksaan Balita berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/pemeriksaan-balita/'.' '.$id)->json();
        $pemeriksaanbalita = $response['data'];

        dd($pemeriksaanbalita);
        
        return view('pemeriksaanbalita.show',compact('pemeriksaanbalita'));
    }
}