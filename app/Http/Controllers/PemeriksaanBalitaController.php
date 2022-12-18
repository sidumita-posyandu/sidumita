<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class PemeriksaanBalitaController extends Controller
{
    public function index()
    {
        $response = Http::get('http://127.0.0.1:8080/api/pemeriksaan-balita')->json();
        $pemeriksaanbalita = $response['data'];

        $response2 = Http::get('http://127.0.0.1:8080/api/balita')->json();
        $balita = $response2['data'];
        
        return view('pemeriksaanbalita.index',compact('pemeriksaanbalita', 'balita'));

        
    }

    public function create()
    {
        $balita = Balita::all();
        $bulanimunisasi = BulanImunisasi::all();
        return view('pemeriksaanbalita.create', compact('balita','bulanimunisasi'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $pemeriksaan = new PemeriksaanBalita;
        $pemeriksaan->balita_id = $data['balita_id'];
        $pemeriksaan->tanggal_pemeriksaan = $data['tanggal_pemeriksaan'];
        $pemeriksaan->save();

        $detailpemeriksaan = new DetailPemeriksaanBalita;
        $detailpemeriksaan->pemeriksaan_balita_id = $pemeriksaan->id;
        $detailpemeriksaan->berat_badan = $data['berat_badan'];
        $detailpemeriksaan->tinggi_badan = $data['tinggi_badan'];
        $detailpemeriksaan->lingkar_kepala = $data['lingkar_kepala'];
        $detailpemeriksaan->lingkar_lengan = $data['lingkar_lengan'];
        $detailpemeriksaan->bulan_imunisasi_id = $data['bulan_imunisasi_id'];
        $detailpemeriksaan->keluhan = $data['keluhan'];
        $detailpemeriksaan->penanganan = $data['penanganan'];
        $detailpemeriksaan->catatan = $data['catatan'];
        $detailpemeriksaan->save();
        
        return redirect()->route('pemeriksaanbalita.index')
        ->with('success','Pemeriksaan Balita berhasil dibuat.');
    }

    public function show($id)
    {
        $pemeriksaanbalita = PemeriksaanBalita::where('id', $id)->get();
        $detailpemeriksaanbalita = DetailPemeriksaanBalita::with('pemeriksaan_balita')->where('pemeriksaan_balita_id', $id)->get();
        return view('pemeriksaanbalita.show',compact('pemeriksaanbalita','detailpemeriksaanbalita'));
    }
}