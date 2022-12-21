<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KecamatanController extends Controller
{

    public function index(Request $request)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/kecamatan')->json();
        $kecamatan = $response['data'];
        
        return view('kecamatan.index',compact('kecamatan'))
            ->with('i', ($request->input('kecamatan', 1) - 1) * 5);   
    }
    
    public function create()
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/kabupaten')->json();
        $kabupaten = $response['data'];
        
        return view('kecamatan.create', compact('kabupaten'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_kecamatan' => 'required',
            'kabupaten_id' => 'required'
        ]);

        $response = Http::post('https://api-sidumita.ftudayana.com/api/kecamatan', [
            'nama_kecamatan' => $request->nama_kecamatan,
            'kabupaten_id' => $request->kabupaten_id,
        ]);
    
        // Kecamatan::create($request->all());
    
        return redirect()->route('kecamatan.index')
                        ->with('success','Data kecamatan berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/kecamatan/'.' '.$id)->json();
        $kecamatan = $response['data'];
        
        return view('kecamatan.show',compact('kecamatan'));
    }
    
    public function edit($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/kecamatan/'.' '.$id)->json();
        $kecamatan = $response['data'];

        
        
        return view('kecamatan.edit',compact('kecamatan'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_kecamatan' => 'required',
            'kabupaten_id' => 'required',
        ]);

        $response = Http::patch('https://api-sidumita.ftudayana.com/api/kecamatan/'.' '.$id, [
            'nama_kecamatan' => $request->nama_kecamatan,
            'kabupaten_id' => $request->kabupaten_id,
        ]);
        
        return redirect()->route('kecamatan.index')
                        ->with('success','Data kecamatan Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('https://api-sidumita.ftudayana.com/api/kecamatan/'.' '.$id);
    
        return redirect()->route('kecamatan.index')
                        ->with('success','Data kecamatan berhasil dihapus');
    }
}