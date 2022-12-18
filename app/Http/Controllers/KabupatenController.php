<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KabupatenController extends Controller
{   
    public function index(Request $request)
    {
        $response = Http::get('http://127.0.0.1:8080/api/kabupaten')->json();
        $kabupaten = $response['data'];

        return view('kabupaten.index', compact('kabupaten'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        $response = Http::get('http://127.0.0.1:8080/api/provinsi')->json();
        $provinsi = $response['data'];
        
        return view('kabupaten.create', compact('provinsi'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_kabupaten' => 'required',
            'provinsi_id' => 'required'
        ]);

        $response = Http::post('http://127.0.0.1:8080/api/kabupaten', [
            'nama_kabupaten' => $request->nama_kabupaten,
            'provinsi_id' => $request->provinsi_id,
        ]);
    
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/kabupaten/'.' '.$id)->json();
        $kabupaten = $response['data'];
        
        return view('kabupaten.show',compact('kabupaten'));
    }
    
    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/kabupaten/'.' '.$id)->json();
        $kabupaten = $response['data'];
        
        return view('kabupaten.edit',compact('kabupaten'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_kabupaten' => 'required',
            'provinsi_id' => 'required',
        ]);

        $response = Http::patch('http://127.0.0.1:8080/api/kabupaten/'.' '.$id, [
            'nama_kabupaten' => $request->nama_kabupaten,
            'provinsi_id' => $request->provinsi_id,
        ]);
        
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('http://127.0.0.1:8080/api/kabupaten'.' '.$id)->json();
    
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten berhasil dihapus');
    }
}