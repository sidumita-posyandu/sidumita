<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class PemeriksaanBalitaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/pemeriksaan-balita')->json();
        $pemeriksaanbalita = $response['data'];
        
        return view('pemeriksaanbalita.index',compact('pemeriksaanbalita'));

        
    }

    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/balita')->json();
        $balita = $response['data'];

        $response2 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/vaksin')->json();
        $vaksin = $response2['data'];

        return view('pemeriksaanbalita.create', compact('balita','vaksin'));
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
        
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post('http://127.0.0.1:8080/api/pemeriksaan-balita', [
            'balita_id' => $request->balita_id,
            'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'lingkar_kepala' => $request->lingkar_kepala,
            'lingkar_lengan' => $request->lingkar_lengan,
            'keluhan' => $request->keluhan,
            'penanganan' => $request->penanganan,
            'catatan' => $request->catatan,
            'petugas_kesehatan_id' => 1,
            'dokter_id' => 1,
            'vitamin_id' => 3, 
        ]);

        if ($request->vaksin_id != 0) {
            $getId = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/pemeriksaan-balita')->json();
            $maxId = max($getId['data'])['id'];
            
            foreach ($data['vaksin_id'] as $item => $value) {          
                $response2 = Http::accept('application/json')
                ->withToken($request->session()->get('token'))
                ->post('http://127.0.0.1:8080/api/detailpemeriksaan-balita', [
                    'pemeriksaan_balita_id' => $maxId,
                    'balita_id' => $request->balita_id,
                    'vaksin_id' => $data['vaksin_id'][$item],
                ]);
            }
        }
        
        return redirect()->route('pemeriksaan-balita.index')
        ->with('success','Pemeriksaan Balita berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/pemeriksaan-balita/'.' '.$id)->json();
        $pemeriksaanbalita = $response['data'];

        return view('pemeriksaanbalita.show',compact('pemeriksaanbalita'));
    }
}