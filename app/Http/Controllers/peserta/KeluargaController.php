<?php

namespace App\Http\Controllers\peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KeluargaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'me/keluarga')->json();
        $keluarga = $response['data'];

        dd($keluarga);
        
        return view('peserta.keluarga.index', compact('keluarga'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}