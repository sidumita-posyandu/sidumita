<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BalitaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/balita')->json();
        $balita = $response['data'];
        
        return view('balita.index',compact('balita'))
            ->with('i', ($request->input('balita', 1) - 1) * 5);   
    }
    
    public function create()
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/keluarga')->json();
        $keluarga = $response['data'];

        return view('balita.create', compact('keluarga'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'detail_keluarga_id' => 'required',
        ]);
        
        $response = Http::post('https://api-sidumita.ftudayana.com/api/balita', [
            'detail_keluarga_id' => $request->detail_keluarga_id,
        ]);
        
        // balita::create($request->all());
    
        return redirect()->route('balita.index')
                        ->with('success','Data balita berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/balita/'.' '.$id)->json();
        $balita = $response['data'];
        
        return view('balita.show',compact('balita'));
    }
    
    public function edit($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/balita/'.' '.$id)->json();
        $balita = $response['data'];
        
        return view('balita.edit',compact('balita'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_balita' => 'required',
            'keluarga_id' => 'required',
        ]);

        $response = Http::patch('https://api-sidumita.ftudayana.com/api/balita/'.' '.$id, [
            'nama_balita' => $request->nama_balita,
            'keluarga_id' => $request->keluarga_id,
        ]);
        
        return redirect()->route('balita.index')
                        ->with('success','Data balita Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('https://api-sidumita.ftudayana.com/apibalita'.' '.$id)->json();
    
        return redirect()->route('balita.index')
                        ->with('success','Data balita berhasil dihapus');
    }
}