<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Vitamin;

class VitaminController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/vitamin')->json();
        $vitamin = $response['data'];

        return view('vitamin.index', compact('vitamin'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('vitamin.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_vitamin' => 'required',
            'dosis' => 'required',
        ]);

        $response = Http::post('https://api-sidumita.ftudayana.com/api/vitamin', [
            'nama_vitamin' => $request->nama_vitamin,
            'dosis' => $request->dosis,
            'catatan' => $request->catatan
        ]);
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/vitamin/'.' '.$id)->json();
        $vitamin = $response['data'];

        return view('vitamin.show',compact('vitamin'));
    }
    
    public function edit($id)
    {
        $response = Http::get('https://api-sidumita.ftudayana.com/api/vitamin/'.' '.$id)->json();
        $vitamin = $response['data'];
        
        return view('vitamin.edit',compact('vitamin'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_vitamin' => 'required',
            'dosis' => 'required',
            'catatan' => 'required',
        ]);

        $response = Http::patch('https://api-sidumita.ftudayana.com/api/vitamin/'.' '.$id, [
            'nama_vitamin' => $request->nama_vitamin,
            'dosis' => $request->dosis,
            'catatan' => $request->catatan,
        ]);
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::delete('https://api-sidumita.ftudayana.com/api/vitamin/'.' '.$id)->json();
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin berhasil dihapus');
    }
}