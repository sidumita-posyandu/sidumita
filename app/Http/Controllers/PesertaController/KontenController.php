<?php

namespace App\Http\Controllers\PesertaController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class KontenController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withHeaders(["Content-type", "multipart/form-data"])
            ->get(env('BASE_API_URL').'konten');
        $data = $response['data'];

        
        if(isset($data)){
            foreach($data as $listkonten){
                $konten[] = [
                    'judul' => $listkonten['judul'],
                    'konten' => $listkonten['konten'],
                    'image' => env('BASE_IMAGE_URL').$listkonten['gambar'],
                ];
            }
        }else{
            $konten = 404;
        }

        return view('konten.index', compact('konten'))
        ->with('i', ($request->input('page', 1) - 1) * 5);    
    }

    public function show(Request $request, $id)
    {
        $response = Http::withHeaders(["Content-type", "multipart/form-data"])
            ->get(env('BASE_API_URL').'konten/'.''.$id);
        $data = $response['data'];

        if(isset($data)){
                $konten = [
                    'judul' => $data['judul'],
                    'konten' => $data['konten'],
                    'image' => env('BASE_IMAGE_URL').$data['gambar'],
                ];
        }else{
            $konten = 'Data belum terisi';
        }

        $response2 = Http::withHeaders(["Content-type", "multipart/form-data"])
            ->get(env('BASE_API_URL').'konten');
        $listkonten = $response2['data'];

        if(isset($listkonten)){
            foreach($listkonten as $kontenlist){
                $datakonten[] = [
                    'id' => $kontenlist['id'],
                    'judul' => $kontenlist['judul'],
                    'konten' => $kontenlist['konten'],
                    'image' => env('BASE_IMAGE_URL').$kontenlist['gambar'],
                ];
            }
        }else{
            $datakonten = 404;
        }

        return view('peserta.konten.show', compact('konten','datakonten'));    
    }
}
