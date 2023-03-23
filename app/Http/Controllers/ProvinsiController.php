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
        // if($request->session()->has('token')){
		// 	dd( $request->session()->get('token'));
		// }
        
        // $response = Http::get('http://127.0.0.1:8080/api/provinsi', [
        //     'headers' => [
        //         'Accept' => 'application/json',
        //         'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY3OTM4NTMyMCwiZXhwIjoxNjc5Mzg4OTIwLCJuYmYiOjE2NzkzODUzMjAsImp0aSI6IjRmOERmS1VTZm80YVVEbVAiLCJzdWIiOjcsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.iOkwAEwM6ZD-wx4w44jpllRc3fASnOc1YHC9XhwIh1M',
        //     ],
        // ])->json();

        // $response = Http::get('http://127.0.0.1:8080/api/user');
        // $response->headers->set('Accept', 'application/json');
        // $response->headers->set('Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTY3OTM4NTMyMCwiZXhwIjoxNjc5Mzg4OTIwLCJuYmYiOjE2NzkzODUzMjAsImp0aSI6IjRmOERmS1VTZm80YVVEbVAiLCJzdWIiOjcsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.iOkwAEwM6ZD-wx4w44jpllRc3fASnOc1YHC9XhwIh1M');
        // $provinsi = json_decode($response->getContent());
        // dd(json_decode($response, true));

        // $response = Request::create('http://127.0.0.1:8080/api/provinsi', 'GET');
        // $response->headers->set('Accept', 'application/json');
        // $response->headers->set('Authorization', 'Bearer '.$token);
        // $res = app()->handle($response);
        // $provinsi = json_decode($res->getContent());

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/provinsi')
            ->json();
        
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

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->post('http://127.0.0.1:8080/api/provinsi', [
                'nama_provinsi' => $request->nama_provinsi,
            ]);

        // $response = Http::post('http://127.0.0.1:8080/api/provinsi', [
        //     'nama_provinsi' => $request->nama_provinsi,

        // ]);
    
        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/provinsi/'.' '.$id)
            ->json();
            
        // $response = Http::get('http://127.0.0.1:8080/api/provinsi/'.' '.$id)->json();
        $provinsi = $response['data'];

        return view('provinsi.show',compact('provinsi'));
    }
    
    public function edit(Request $request, $id)
    {
        // $response = Http::get('http://127.0.0.1:8080/api/provinsi/'.' '.$id)->json();

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/provinsi/'.' '.$id)
            ->json();

        $provinsi = $response['data'];
        
        return view('provinsi.edit',compact('provinsi'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_provinsi' => 'required',
        ]);

        // $response = Http::patch('http://127.0.0.1:8080/api/provinsi/'.' '.$id, [
        //     'nama_provinsi' => $request->nama_provinsi,
        // ]);

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->patch('http://127.0.0.1:8080/api/provinsi/'.' '.$id, [
                'nama_provinsi' => $request->nama_provinsi,
            ]);
        
    
        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi Berhasil Diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        // $response = Http::delete('http://127.0.0.1:8080/api/provinsi/'.$id);

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->delete('http://127.0.0.1:8080/api/provinsi/'.$id)
            ->json();

        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi berhasil dihapus');
    }
}