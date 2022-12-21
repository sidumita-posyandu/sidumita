<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KabupatenController extends Controller
{   
    public function index(Request $request)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/kabupaten')->json();
        $kabupaten = $response['data'];

        return view('kabupaten.index', compact('kabupaten'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/provinsi')->json();
        $provinsi = $response['data'];
        
        return view('kabupaten.create', compact('provinsi'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_kabupaten' => 'required',
            'provinsi_id' => 'required'
        ]);

        $response = Http::post('https://api-sidumita.ftudayana.com/api/kabupaten', [
            'nama_kabupaten' => $request->nama_kabupaten,
            'provinsi_id' => $request->provinsi_id,
        ]);
    
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/kabupaten/'.' '.$id)->json();
        $kabupaten = $response['data'];
        
        return view('kabupaten.show',compact('kabupaten'));
    }
    
    public function edit($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/kabupaten/'.' '.$id)->json();
        $kabupaten = $response['data'];
        
        return view('kabupaten.edit',compact('kabupaten'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_kabupaten' => 'required',
            'provinsi_id' => 'required',
        ]);

        $response = Http::patch('https://api-sidumita.ftudayana.com/api/kabupaten/'.' '.$id, [
            'nama_kabupaten' => $request->nama_kabupaten,
            'provinsi_id' => $request->provinsi_id,
        ]);
        
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('https://api-sidumita.ftudayana.com/api/kabupaten/'.$id);
    
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten berhasil dihapus');
    }
}