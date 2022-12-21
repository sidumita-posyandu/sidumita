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
        $response = Http::get('https://api-sidumita.ftudayana.com/api/provinsi')->json();
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

        $response = Http::post('https://api-sidumita.ftudayana.com/api/provinsi', [
            'nama_provinsi' => $request->nama_provinsi,
        ]);
    
        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/provinsi/'.' '.$id)->json();
        $provinsi = $response['data'];

        return view('provinsi.show',compact('provinsi'));
    }
    
    public function edit($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/provinsi/'.' '.$id)->json();
        $provinsi = $response['data'];
        
        return view('provinsi.edit',compact('provinsi'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_provinsi' => 'required',
        ]);

        $response = Http::patch('https://api-sidumita.ftudayana.com/api/provinsi/'.' '.$id, [
            'nama_provinsi' => $request->nama_provinsi,
        ]);
    
        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('https://api-sidumita.ftudayana.com/api/provinsi/'.$id);

        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi berhasil dihapus');
    }
}