<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('http://127.0.0.1:8080/api/balita/')->json();
        $balita = count($response['data']);

        $response2 = Http::get('http://127.0.0.1:8080/api/ibu-hamil/')->json();
        $ibu_hamil = count($response2['data']);
        
        $response3 = Http::get('http://127.0.0.1:8080/api/ibu-hamil/')->json();
        $keluarga = count($response3['data']);

        $response2 = Http::get('http://127.0.0.1:8080/api/ibu-hamil/')->json();
        $anggota_keluarga = count($response2['data']);
        

        if($request->session()->get('userAuth')['role_id'] == 4)
        {
            return view('user-peserta.home', compact('balita','ibu_hamil','keluarga','anggota_keluarga'));
        }
        else{
            return view('home', compact('balita','ibu_hamil','keluarga','anggota_keluarga'));
        }
    }

    public function peserta(){
        return view('peserta.index');
    }
}