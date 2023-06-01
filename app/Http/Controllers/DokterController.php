<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'dokter')->json();
        $dokter = $response['data'];
        
        return view('dokter.index',compact('dokter'))
            ->with('i', ($request->input('dokter', 1) - 1) * 5);   
    }
    
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'provinsi')->json();
        $provinsi = $response['data'];

        $token = $request->session()->get('token');

        return view('dokter.create', compact('provinsi', 'token'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nip' => 'required',
            'nama_dokter' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'dusun_id' => 'required',
        ]);

        
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'dokter', [
            'nip' => $request->nip,
            'nama_dokter' => $request->nama_dokter,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'dusun_id' => $request->dusun_id,
        ]);
            
        return redirect()->route('dokter.index')
                        ->with('success','Data dokter berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'dokter/'.' '.$id)->json();
        $dokter = $response['data'];
        
        return view('dokter.show',compact('dokter'));
    }
    
    public function edit(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'dokter/'.' '.$id)->json();
        $dokter = $response['data']; 

        $response2 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'provinsi')->json();
        $provinsi = $response2['data'];
        
        return view('dokter.edit',compact('dokter','provinsi'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nip' => 'required',
            'nama_dokter' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'dusun_id' => 'required',
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch(env('BASE_API_URL').'dokter/'.' '.$id, [
            'nip' => $request->nip,
            'nama_dokter' => $request->nama_dokter,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'dusun_id' => $request->dusun_id,
        ]);
        
        return redirect()->route('dokter.index')
                        ->with('success','Data dokter Berhasil Diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete(env('BASE_API_URL').'dokter/'.' '.$id);
    
        return redirect()->route('dokter.index')
                        ->with('success','Data dokter berhasil dihapus');
    }
}