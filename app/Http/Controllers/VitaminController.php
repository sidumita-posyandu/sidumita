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
        $response = Http::get('http://127.0.0.1:8080/api/vitamin')->json();
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

        $response = Http::post('http://127.0.0.1:8080/api/vitamin', [
            'nama_vitamin' => $request->nama_vitamin,
            'dosis' => $request->dosis,
            'catatan' => $request->catatan
        ]);
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/vitamin/'.' '.$id)->json();
        $vitamin = $response['data'];

        return view('vitamin.show',compact('vitamin'));
    }
    
    public function edit($id)
    {
        $response = Http::get('http://127.0.0.1:8080/api/vitamin/'.' '.$id)->json();
        $vitamin = $response['data'];
        
        return view('vitamin.edit',compact('vitamin'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_vitamin' => 'required',
        ]);

        $response = Http::patch('http://127.0.0.1:8080/api/vitamin/'.' '.$id, [
            'nama_vitamin' => $request->nama_vitamin,
        ]);
    
        // $vitamin->update($request->all());
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin Berhasil Diperbarui');
    }

    public function destroy(vitamin $vitamin)
    {
        $response = Http::delete('http://127.0.0.1:8080/api/vitamin'.' '.$id)->json();
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin berhasil dihapus');
    }
}