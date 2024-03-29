<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image as Image;

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

        if($request->session()->get('userAuth')['role_id'] == 2)
        {
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'operator/balita')->json();
            $balita = count($response['data']);
    
            $response2 = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'operator/ibu-hamil')->json();
            $ibu_hamil = count($response2['data']);
            
            $response3 = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'operator/keluarga')->json();
            $keluarga = count($response3['data']);
    
            $response4 = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'operator/detail-keluarga')->json();
            $anggota_keluarga = count($response4['data']);

            return view('home', compact('balita','ibu_hamil','keluarga','anggota_keluarga'));
        }
        elseif($request->session()->get('userAuth')['role_id'] == 3)
        {
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'petugas/with-balita')->json();
            $balita = count($response['data']);
    
            $response2 = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'petugas/with-ibu-hamil')->json();
            $ibu_hamil = count($response2['data']);
            
            $response3 = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'petugas/with-keluarga')->json();
            $keluarga = count($response3['data']);
    
            $response4 = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'petugas/with-detail-keluarga')->json();
            $anggota_keluarga = count($response4['data']);

            return view('home', compact('balita','ibu_hamil','keluarga','anggota_keluarga'));
        }
        elseif($request->session()->get('userAuth')['role_id'] == 4)
        {
            return view('peserta.home');
        }
        else{
            return view('home', compact('balita','ibu_hamil','keluarga','anggota_keluarga'));
        }
    }

    public function peserta(){
        $response5 = Http::withHeaders(["Content-type", "multipart/form-data"])
            ->get(env('BASE_API_URL').'konten');
        $konten = $response5['data'];

        if(isset($konten)){
            foreach($konten as $listkonten){
                $datakonten[] = [
                    'id' => $listkonten['id'],
                    'judul' => $listkonten['judul'],
                    'konten' => $listkonten['konten'],
                    'image' => env('BASE_IMAGE_URL').$listkonten['gambar'],
                ];
            }
        }else{
            $datakonten = 404;
        }

        return view('peserta.home', compact('datakonten'));
    }
}