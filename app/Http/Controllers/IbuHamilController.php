<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class IbuHamilController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('http://127.0.0.1:8080/api/ibu-hamil')->json();
        $ibu_hamil = $response['data'];
        
        return view('ibu-hamil.index',compact('ibu_hamil'))
            ->with('i', ($request->input('ibu-hamil', 1) - 1) * 5);   
    }
    
    public function create()
    {
        $response = Http::get('http://127.0.0.1:8080/api/keluarga')->json();
        $keluarga = $response['data'];

        return view('ibu-hamil.create', compact('keluarga'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'detail_keluarga_id' => 'required',
        ]);
        
        $response = Http::post('http://127.0.0.1:8080/api/ibu-hamil', [
            'detail_keluarga_id' => $request->detail_keluarga_id,
        ]);
            
        return redirect()->route('ibu-hamil.index')
                        ->with('success','Data ibu-hamil berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/ibu-hamil/'.' '.$id)->json();
        $ibu_hamil = $response['data'];
        
        return view('ibu-hamil.show',compact('ibu_hamil'));
    }
    
    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/ibu-hamil/'.' '.$id)->json();
        $ibu_hamil = $response['data'];
        
        return view('ibu-hamil.edit',compact('ibu_hamil'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_ibu-hamil' => 'required',
            'keluarga_id' => 'required',
        ]);

        $response = Http::patch('http://127.0.0.1:8080/api/ibu-hamil/'.' '.$id, [
            'nama_ibu_hamil' => $request->nama_ibu-hamil,
            'keluarga_id' => $request->keluarga_id,
        ]);
        
        return redirect()->route('ibu-hamil.index')
                        ->with('success','Data ibu-hamil Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('http://127.0.0.1:8080/api/ibu-hamil/'.' '.$id)->json();
    
        return redirect()->route('ibu-hamil.index')
                        ->with('success','Data ibu-hamil berhasil dihapus');
    }
}