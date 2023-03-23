<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PemeriksaanIbuHamilController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/pemeriksaan-ibuhamil')->json();
        $pemeriksaanibuhamil = $response['data'];
        
        return view('pemeriksaanibuhamil.index',compact('pemeriksaanibuhamil'));

        
    }

    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/ibu-hamil')->json();
        $ibuhamil = $response['data'];

        return view('pemeriksaanibuhamil.create', compact('ibuhamil'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post('http://127.0.0.1:8080/api/pemeriksaan-ibuhamil', [
            'ibu_hamil_id' => $request->ibu_hamil_id,
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'lingkar_perut' => $request->lingkar_perut,
            'denyut_nadi' => $request->denyut_nadi,
            'keluhan' => $request->keluhan,
            'penanganan' => $request->penanganan,
            'catatan' => $request->catatan,
            'petugas_kesehatan_id' => 1,
        ]);
        
        return redirect()->route('pemeriksaan-ibuhamil.index')
        ->with('success','Pemeriksaan ibu hamil berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/pemeriksaan-ibuhamil/'.' '.$id)->json();
        $pemeriksaanibuhamil = $response['data'];
        
        return view('pemeriksaanibuhamil.show',compact('pemeriksaanibuhamil'));
    }
}