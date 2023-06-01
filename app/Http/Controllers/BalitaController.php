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
            ->get(env('BASE_API_URL').'petugas/with-balita')->json();
            $balita = $this->paginate($response['data'])->withPath('/admin/balita');
            
            return view('balita.index-petugas',compact('balita'))
            ->with('i', ($request->input('balita', 1) - 1) * 5); 
        }else{
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'balita')->json();
            $balita = $this->paginate($response['data'])->withPath('/admin/balita');
            
            return view('balita.index',compact('balita'))
            ->with('i', ($request->input('balita', 1) - 1) * 5); 
        }
    }
    
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'keluarga')->json();
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
        ->post(env('BASE_API_URL').'balita', [
            'detail_keluarga_id' => $request->detail_keluarga_id,
        ]);
        
        // balita::create($request->all());
    
        return redirect()->route('balita.index')
                        ->with('success','Data balita berhasil dibuat.');
    }

    public function show($id, Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'balita/'.' '.$id)->json();
        $balita = $response['data'];
        
        return view('balita.show',compact('balita'));
    }
    
    public function edit($id, Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'balita/'.' '.$id)->json();
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
        ->patch(env('BASE_API_URL').'balita/'.' '.$id, [
            'nama_balita' => $request->nama_balita,
            'keluarga_id' => $request->keluarga_id,
        ]);
        
        return redirect()->route('balita.index')
                        ->with('success','Data balita Berhasil Diperbarui');
    }

    public function destroy($id, Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete(env('BASE_API_URL').'balita/'.' '.$id)->json();
    
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