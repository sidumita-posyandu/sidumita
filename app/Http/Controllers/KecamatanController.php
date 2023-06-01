<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KecamatanController extends Controller
{

    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'kecamatan')->json();
        $kecamatan = $response['data'];
        
        return view('kecamatan.index',compact('kecamatan'))
            ->with('i', ($request->input('kecamatan', 1) - 1) * 5);   
    }
    
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'kabupaten')->json();
        $kabupaten = $response['data'];
        
        return view('kecamatan.create', compact('kabupaten'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_kecamatan' => 'required',
            'kabupaten_id' => 'required'
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'kecamatan', [
            'nama_kecamatan' => $request->nama_kecamatan,
            'kabupaten_id' => $request->kabupaten_id,
        ]);
    
        // Kecamatan::create($request->all());
    
        return redirect()->route('kecamatan.index')
                        ->with('success','Data kecamatan berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'kecamatan/'.' '.$id)->json();
        $kecamatan = $response['data'];
        
        return view('kecamatan.show',compact('kecamatan'));
    }
    
    public function edit(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'kecamatan/'.' '.$id)->json();
        $kecamatan = $response['data'];

        $response2 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'kabupaten/')->json();
        $kabupaten = $response2['data'];        
        
        return view('kecamatan.edit',compact('kecamatan','kabupaten'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_kecamatan' => 'required',
            'kabupaten_id' => 'required',
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch(env('BASE_API_URL').'kecamatan/'.' '.$id, [
            'nama_kecamatan' => $request->nama_kecamatan,
            'kabupaten_id' => $request->kabupaten_id,
        ]);
        
        return redirect()->route('kecamatan.index')
                        ->with('success','Data kecamatan Berhasil Diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete(env('BASE_API_URL').'kecamatan/'.' '.$id);
    
        return redirect()->route('kecamatan.index')
                        ->with('success','Data kecamatan berhasil dihapus');
    }
}