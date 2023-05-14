<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class VaksinController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/vaksin')->json();
        $vaksin = $response['data'];

        return view('vaksin.index', compact('vaksin'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('vaksin.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'nama_vaksin' => 'required',
            'dosis' => 'required',
            'catatan' => 'required',
            'status' => 'required',
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post('http://127.0.0.1:8080/api/vaksin', [
            'nama_vaksin' => $request->nama_vaksin,
            'dosis' => $request->dosis,
            'catatan' => $request->catatan,
            'status' => $request->status,
        ]);
    
        return redirect()->route('vaksin.index')
                        ->with('success','Data vaksin berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/vaksin/'.' '.$id)->json();
        $vaksin = $response['data'];

        return view('vaksin.show',compact('vaksin'));
    }
    
    public function edit($id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/vaksin/'.' '.$id)->json();
        $vaksin = $response['data'];
        
        return view('vaksin.edit',compact('vaksin'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_vaksin' => 'required',
            'dosis' => 'required',
            'catatan' => 'required',
            'status' => 'required',
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch('http://127.0.0.1:8080/api/vaksin/'.' '.$id, [
            'nama_vaksin' => $request->nama_vaksin,
            'dosis' => $request->dosis,
            'catatan' => $request->catatan,
            'status' => $request->status,
        ]);
    
        return redirect()->route('vaksin.index')
                        ->with('success','Data vaksin Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete('http://127.0.0.1:8080/api/vaksin/'.' '.$id)->json();
    
        return redirect()->route('vaksin.index')
                        ->with('success','Data vaksin berhasil dihapus');
    }
}