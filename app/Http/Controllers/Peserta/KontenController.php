<?php

namespace App\Http\Controllers\Peserta;

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
}
