<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DesaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/desa')->json();
        $desa = $response['data'];
        
        return view('desa.index',compact('desa'))
            ->with('i', ($request->input('desa', 1) - 1) * 5);   
    }
    
    public function create()
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/kecamatan')->json();
        $kecamatan = $response['data'];
        return view('desa.create', compact('kecamatan'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_desa' => 'required',
            'kecamatan_id' => 'required'
        ]);

        $response = Http::post('https://api-sidumita.ftudayana.com/api/desa', [
            'nama_desa' => $request->nama_desa,
            'kecamatan_id' => $request->kecamatan_id,
        ]);
    
        // Desa::create($request->all());
    
        return redirect()->route('desa.index')
                        ->with('success','Data desa berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/desa/'.' '.$id)->json();
        $desa = $response['data'];

        return view('desa.show',compact('desa'));
    }
    
    public function edit($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/desa/'.' '.$id)->json();
        $desa = $response['data'];
        
        return view('desa.edit',compact('desa'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_desa' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $response = Http::patch('https://api-sidumita.ftudayana.com/api/desa/'.' '.$id, [
            'nama_desa' => $request->nama_desa,
            'kecamatan_id' => $request->kecamatan_id,
        ]);
        
        return redirect()->route('desa.index')
                        ->with('success','Data desa Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('https://api-sidumita.ftudayana.com/api/desa/'.' '.$id)->json();
    
        return redirect()->route('desa.index')
                        ->with('success','Data desa berhasil dihapus');
    }
}