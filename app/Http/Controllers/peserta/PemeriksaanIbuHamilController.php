<?php

namespace App\Http\Controllers\peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PemeriksaanIbuHamilController extends Controller
{
    public function index(Request $request){
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'me/ibu-hamil')->json();

        if($response == 'ErrorException' || $response['data'] == []){
            $ibu_hamil = "Data belum terdaftar";
        }else{
            $ibu_hamil = $response['data'];
        }

        $token = $request->session()->get('token');

        return view('peserta.pemeriksaan-ibu-hamil.index', compact('ibu_hamil', 'token'));
    }

    public function detIbuHamil(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'pemeriksaan-ibuhamil/ibuhamil/'.' '.$id)->json();
        $det_ibu_hamil = $response['data'][0];

        $response2 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'detail-keluarga/'.' '.$det_ibu_hamil['ibu_hamil']['detail_keluarga_id'])->json();
        $ibu_hamil = $response2['data'][0];

        $response4 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'dusun/'.' '.$ibu_hamil['keluarga']['dusun_id'])->json();
        $dusun = $response4['data'];

        return view('peserta.pemeriksaan-ibu-hamil.detail-ibuhamil', compact('ibu_hamil', 'det_ibu_hamil', 'dusun'));
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
        
        for ($i=0; $i < count($data_grafik); $i++) { 
            // ($i == (int)$rekap[$i]['umur_balita']) ? ($tinggi_badan[(int)$rekap[$i]['umur_balita']] = (int)$rekap[$i]['tinggi_badan']) : $tinggi_badan[$i] = NULL && $tinggi_badan[];           
            // $tinggi_badan[(int)$rekap[$i]['umur_balita']] = (int)$rekap[$i]['tinggi_badan'];
            $berat_badan[(int)$data_grafik[$i]['umur_kandungan']] = (int)$data_grafik[$i]['berat_badan'];
        }

        return view('peserta.pemeriksaan-ibu-hamil.grafik', compact('rekap', 'ibuhamil', 'dusun', 'hasil_pengukuran', 'data_grafik', 'berat_badan', 'tick_position', 'data_terbaru'));
    }
}