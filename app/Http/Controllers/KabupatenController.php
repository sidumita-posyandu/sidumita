<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class KabupatenController extends Controller
{   
    public function index(Request $request)
    {
        // $response = Http::get(env('BASE_API_URL').'kabupaten')->json();

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'kabupaten')
            ->json();

        $kabupaten = $response['data'];

        return view('kabupaten.index', compact('kabupaten'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create(Request $request)
    {
        // $response = Http::get(env('BASE_API_URL').'provinsi')->json();
        
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'provinsi')
            ->json();

        $provinsi = $response['data'];
        
        return view('kabupaten.create', compact('provinsi'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_kabupaten' => 'required',
            'provinsi_id' => 'required'
        ]);

        // $response = Http::post(env('BASE_API_URL').'kabupaten', [
        //     'nama_kabupaten' => $request->nama_kabupaten,
        //     'provinsi_id' => $request->provinsi_id,
        // ]);

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->post(env('BASE_API_URL').'kabupaten', [
                'nama_kabupaten' => $request->nama_kabupaten,
                'provinsi_id' => $request->provinsi_id,
            ]);
    
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        // $response = Http::get(env('BASE_API_URL').'kabupaten/'.' '.$id)->json();

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'kabupaten/'.' '.$id)
            ->json();
            
        $kabupaten = $response['data'];
        return view('kabupaten.show',compact('kabupaten'));
    }
    
    public function edit(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'provinsi/')->json();
        $provinsi = $response['data'];

        $response2 = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'kabupaten/'.' '.$id)->json();
        $kabupaten = $response2['data'];
        
        return view('kabupaten.edit',compact('provinsi','kabupaten'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_kabupaten' => 'required',
            'provinsi_id' => 'required',
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch(env('BASE_API_URL').'kabupaten/'.' '.$id, [
            'nama_kabupaten' => $request->nama_kabupaten,
            'provinsi_id' => $request->provinsi_id,
        ]);
        
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten Berhasil Diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete(env('BASE_API_URL').'kabupaten/'.$id);
    
        return redirect()->route('kabupaten.index')
                        ->with('success','Data kabupaten berhasil dihapus');
    }
}