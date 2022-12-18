<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DesaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('http://127.0.0.1:8080/api/desa')->json();
        $desa = $response['data'];
        
        return view('desa.index',compact('desa'))
            ->with('i', ($request->input('desa', 1) - 1) * 5);   
    }
    
    public function create()
    {
        $response = Http::get('http://127.0.0.1:8080/api/kecamatan')->json();
        $kecamatan = $response['data'];
        return view('desa.create', compact('kecamatan'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_desa' => 'required',
            'kecamatan_id' => 'required'
        ]);

        $response = Http::post('http://127.0.0.1:8080/api/desa', [
            'nama_desa' => $request->nama_desa,
            'kecamatan_id' => $request->kecamatan_id,
        ]);
    
        // Desa::create($request->all());
    
        return redirect()->route('desa.index')
                        ->with('success','Data desa berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/desa/'.' '.$id)->json();
        $desa = $response['data'];

        return view('desa.show',compact('desa'));
    }
    
    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/desa/'.' '.$id)->json();
        $desa = $response['data'];
        
        return view('desa.edit',compact('desa'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_desa' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $response = Http::patch('http://127.0.0.1:8080/api/desa/'.' '.$id, [
            'nama_desa' => $request->nama_desa,
            'kecamatan_id' => $request->kecamatan_id,
        ]);
        
        return redirect()->route('desa.index')
                        ->with('success','Data desa Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('http://127.0.0.1:8080/api/desa'.' '.$id)->json();
    
        return redirect()->route('desa.index')
                        ->with('success','Data desa berhasil dihapus');
    }
}