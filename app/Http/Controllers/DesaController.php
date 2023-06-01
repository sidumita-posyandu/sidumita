<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DesaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'desa')->json();
        $desa = $response['data'];
        
        return view('desa.index',compact('desa'))
            ->with('i', ($request->input('desa', 1) - 1) * 5);   
    }
    
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'kecamatan')->json();
        $kecamatan = $response['data'];
        return view('desa.create', compact('kecamatan'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_desa' => 'required',
            'kecamatan_id' => 'required'
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'desa', [
            'nama_desa' => $request->nama_desa,
            'kecamatan_id' => $request->kecamatan_id,
        ]);
    
        // Desa::create($request->all());
    
        return redirect()->route('desa.index')
                        ->with('success','Data desa berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'desa/'.' '.$id)->json();
        $desa = $response['data'];

        return view('desa.show',compact('desa'));
    }
    
    public function edit(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'desa/'.' '.$id)->json();
        $desa = $response['data'];

        $response2 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'kecamatan/')->json();
        $kecamatan = $response2['data'];        
        
        return view('desa.edit',compact('kecamatan','desa'));
        }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_desa' => 'required',
            'kecamatan_id' => 'required',
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch(env('BASE_API_URL').'desa/'.' '.$id, [
            'nama_desa' => $request->nama_desa,
            'kecamatan_id' => $request->kecamatan_id,
        ]);
        
        return redirect()->route('desa.index')
                        ->with('success','Data desa Berhasil Diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete(env('BASE_API_URL').'desa/'.' '.$id)->json();
    
        return redirect()->route('desa.index')
                        ->with('success','Data desa berhasil dihapus');
    }
}