<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Provinsi;


class ProvinsiController extends Controller
{
    
    public function index(Request $request)
    {
        $response = Http::get('http://127.0.0.1:8080/api/provinsi')->json();
        $provinsi = $response['data'];

        return view('provinsi.index', compact('provinsi'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('provinsi.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_provinsi' => 'required',
        ]);

        $response = Http::post('http://127.0.0.1:8080/api/provinsi', [
            'nama_provinsi' => $request->nama_provinsi,
        ]);
    
        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/provinsi/'.' '.$id)->json();
        $provinsi = $response['data'];

        return view('provinsi.show',compact('provinsi'));
    }
    
    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/provinsi/'.' '.$id)->json();
        $provinsi = $response['data'];
        
        return view('provinsi.edit',compact('provinsi'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_provinsi' => 'required',
        ]);

        $response = Http::patch('http://127.0.0.1:8080/api/provinsi/'.' '.$id, [
            'nama_provinsi' => $request->nama_provinsi,
        ]);
    
        // $provinsi->update($request->all());
    
        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi Berhasil Diperbarui');
    }

    public function destroy(Provinsi $provinsi)
    {
        $response = Http::delete('http://127.0.0.1:8080/api/provinsi'.' '.$id)->json();
    
        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi berhasil dihapus');
    }
}