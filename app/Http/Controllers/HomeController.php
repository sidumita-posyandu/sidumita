<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'balita/')->json();
        $balita = count($response['data']);

        $response2 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'ibu-hamil/')->json();
        $ibu_hamil = count($response2['data']);
        
        $response3 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'keluarga/')->json();
        $keluarga = count($response3['data']);

        $response4 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'detail-keluarga/')->json();
        $anggota_keluarga = count($response4['data']);
        

        if($request->session()->get('userAuth')['role_id'] == 4)
        {
            return view('peserta.home');
        }
        else{
            return view('home', compact('balita','ibu_hamil','keluarga','anggota_keluarga'));
        }
    }

    public function peserta(){
        return view('peserta.home');
    }
}