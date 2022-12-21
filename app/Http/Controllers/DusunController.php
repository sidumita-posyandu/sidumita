<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DusunController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/dusun')->json();
        $dusun = $response['data'];
        
        return view('dusun.index',compact('dusun'))
            ->with('i', ($request->input('dusun', 1) - 1) * 5);   
    }
    
    public function create()
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/desa')->json();
        $desa = $response['data'];
        return view('dusun.create', compact('desa'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_dusun' => 'required',
            'desa_id' => 'required'
        ]);
        
        $response = Http::post('https://api-sidumita.ftudayana.com/api/dusun', [
            'nama_dusun' => $request->nama_dusun,
            'desa_id' => $request->desa_id,
        ]);
        
        // dusun::create($request->all());
    
        return redirect()->route('dusun.index')
                        ->with('success','Data dusun berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/dusun/'.' '.$id)->json();
        $dusun = $response['data'];
        
        return view('dusun.show',compact('dusun'));
    }
    
    public function edit($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/dusun/'.' '.$id)->json();
        $dusun = $response['data'];
        
        return view('dusun.edit',compact('dusun'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_dusun' => 'required',
            'desa_id' => 'required',
        ]);

        $response = Http::patch('https://api-sidumita.ftudayana.com/api/dusun/'.' '.$id, [
            'nama_dusun' => $request->nama_dusun,
            'desa_id' => $request->desa_id,
        ]);
        
        return redirect()->route('dusun.index')
                        ->with('success','Data dusun Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('https://api-sidumita.ftudayana.com/api/dusun/'.' '.$id);
    
        return redirect()->route('dusun.index')
                        ->with('success','Data dusun berhasil dihapus');
    }
}