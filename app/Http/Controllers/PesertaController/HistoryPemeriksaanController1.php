<?php

namespace App\Http\Controllers\PesertaController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoryPemeriksaanController extends Controller
{
    public function balita(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'pemeriksaan-balita/balita/'.' '.$id)->json();

        $rekap = $response['data'];

        return view('peserta.pemeriksaan-balita.history-pemeriksaan', compact('rekap'));
    }

    public function ibuHamil(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'pemeriksaan-ibuhamil/ibuhamil/'.' '.$id)->json();

        $rekap = $response['data'];

        return view('peserta.pemeriksaan-ibu-hamil.history-pemeriksaan', compact('rekap'));
    }
}