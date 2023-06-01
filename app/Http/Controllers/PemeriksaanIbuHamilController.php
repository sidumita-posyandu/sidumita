<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PemeriksaanIbuHamilController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('userAuth')['role_id'] == 3){
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'petugas/with-pemeriksaan-ibu-hamil')->json();
            $pemeriksaanibuhamil = $this->paginate($response['data'])->withPath('/admin/pemeriksaan-ibuhamil');
        }else{
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'pemeriksaan-ibuhamil')->json();
            $pemeriksaanibuhamil = $this->paginate($response['data'])->withPath('/admin/pemeriksaan-ibuhamil');
        }
        
        return view('pemeriksaanibuhamil.index',compact('pemeriksaanibuhamil'));
    }

    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'ibu-hamil')->json();
        $ibuhamil = $response['data'];

        $tanggal_pemeriksaan = Carbon::now()->format('Y-m-d');

        return view('pemeriksaanibuhamil.create', compact('ibuhamil', 'tanggal_pemeriksaan'));
    }

    public function createWithId(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'ibu-hamil/'.' '.$id)->json();
        $ibuhamil = $response['data'];

        $tanggal_pemeriksaan = Carbon::now()->format('Y-m-d');

        return view('pemeriksaanibuhamil.create-by-id', compact('ibuhamil', 'tanggal_pemeriksaan'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
                
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'pemeriksaan-ibuhamil', [
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
        ->get(env('BASE_API_URL').'pemeriksaan-ibuhamil/'.' '.$id)->json();
        $pemeriksaanibuhamil = $response['data'];
        
        return view('pemeriksaanibuhamil.show',compact('pemeriksaanibuhamil'));
    }

    public function rekap_ibu_hamil(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'pemeriksaan-ibuhamil/kandungan/'.' '.$id)->json();
        $rekap = $response['data'];

        $response2 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'detail-keluarga/'.' '.$rekap[0]['ibu_hamil']['detail_keluarga_id'])->json();
        $ibuhamil = $response2['data'][0];

        $response3 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'dusun/'.' '.$ibuhamil['keluarga']['dusun_id'])->json();
        $dusun = $response3['data'];

        $data_terbaru = max($rekap);

        dd($rekap);

        $response4 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'cek-berat-ibu-hamil', [
            'ibu_hamil_id' => $data_terbaru['ibu_hamil']['id'],
            'umur_kandungan' => $data_terbaru['umur_kandungan'],
            'berat_badan' => $data_terbaru['berat_badan'],
        ])->json();
        $hasil_pengukuran = $response4['data'];

        $response5 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'data-grafik-ibu-hamil/'.' '.$data_terbaru['ibu_hamil']['id'])->json();
        $data_grafik = $response5['data'];
        

        $berat_badan = array();
        $tick_position = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24,
        25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40];

        for ($i=0; $i < 24; $i++) { 
            $berat_badan[$i] = NULL;
        }
        
        for ($i=0; $i < count($data_grafik['umur_kandungan']); $i++) { 
            // ($i == (int)$rekap[$i]['umur_balita']) ? ($tinggi_badan[(int)$rekap[$i]['umur_balita']] = (int)$rekap[$i]['tinggi_badan']) : $tinggi_badan[$i] = NULL && $tinggi_badan[];           
            // $tinggi_badan[(int)$rekap[$i]['umur_balita']] = (int)$rekap[$i]['tinggi_badan'];
            $berat_badan[(int)$data_grafik['umur_kandungan'][$i]] = (int)$data_grafik['berat_badan'][$i];
        }

        return view('pemeriksaanibuhamil.rekap-ibuhamil', compact('rekap', 'ibuhamil', 'dusun', 'hasil_pengukuran', 'data_grafik', 'berat_badan', 'tick_position'));
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}