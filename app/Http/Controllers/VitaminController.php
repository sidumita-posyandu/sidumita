<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VitaminController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'vitamin')->json();
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

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'vitamin', [
            'nama_vitamin' => $request->nama_vitamin,
            'dosis' => $request->dosis,
            'catatan' => $request->catatan
        ]);
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin berhasil dibuat.');
    }

    public function show($id, Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'vitamin/'.' '.$id)->json();
        $vitamin = $response['data'];

        return view('vitamin.show',compact('vitamin'));
    }
    
    public function edit($id, Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'vitamin/'.' '.$id)->json();
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

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch(env('BASE_API_URL').'vitamin/'.' '.$id, [
            'nama_vitamin' => $request->nama_vitamin,
            'dosis' => $request->dosis,
            'catatan' => $request->catatan,
        ]);
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin Berhasil Diperbarui');
    }

    public function destroy($id, Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete(env('BASE_API_URL').'vitamin/'.' '.$id)->json();
    
        return redirect()->route('vitamin.index')
                        ->with('success','Data vitamin berhasil dihapus');
    }
}