<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BalitaController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('userAuth')['role_id'] == 3){
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/petugas/with-balita')->json();
            $balita = $this->paginate($response['data'])->withPath('/admin/balita');
            
            return view('balita.index-petugas',compact('balita'))
            ->with('i', ($request->input('balita', 1) - 1) * 5); 
        }else{
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/balita')->json();
            $balita = $this->paginate($response['data'])->withPath('/admin/balita');
            
            return view('balita.index',compact('balita'))
            ->with('i', ($request->input('balita', 1) - 1) * 5); 
        }
    }
    
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/keluarga')->json();
        $keluarga = $response['data'];

        return view('balita.create', compact('keluarga'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'detail_keluarga_id' => 'required',
        ]);
        
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post('http://127.0.0.1:8080/api/balita', [
            'detail_keluarga_id' => $request->detail_keluarga_id,
        ]);
        
        // balita::create($request->all());
    
        return redirect()->route('balita.index')
                        ->with('success','Data balita berhasil dibuat.');
    }

    public function show($id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/balita/'.' '.$id)->json();
        $balita = $response['data'];
        
        return view('balita.show',compact('balita'));
    }
    
    public function edit($id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get('http://127.0.0.1:8080/api/balita/'.' '.$id)->json();
        $balita = $response['data'];
        
        return view('balita.edit',compact('balita'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_balita' => 'required',
            'keluarga_id' => 'required',
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch('http://127.0.0.1:8080/api/balita/'.' '.$id, [
            'nama_balita' => $request->nama_balita,
            'keluarga_id' => $request->keluarga_id,
        ]);
        
        return redirect()->route('balita.index')
                        ->with('success','Data balita Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete('http://127.0.0.1:8080/api/balita/'.' '.$id)->json();
    
        return redirect()->route('balita.index')
                        ->with('success','Data balita berhasil dihapus');
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}