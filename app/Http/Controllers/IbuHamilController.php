<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class IbuHamilController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->get('userAuth')['role_id'] == 3){
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'petugas/with-ibu-hamil')->json();
            $ibu_hamil = $this->paginate($response['data'])->withPath('/admin/ibu-hamil');
            
            return view('ibu-hamil.index-petugas',compact('ibu_hamil'))
            ->with('i', ($request->input('ibu_hamils', 1) - 1) * 5); 
        }
        elseif($request->session()->get('userAuth')['role_id'] == 2){
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'operator/ibu-hamil')->json();
            $ibu_hamil = $this->paginate($response['data'])->withPath('/admin/ibu-hamil');
            
            return view('ibu-hamil.index-operator',compact('ibu_hamil'))
                ->with('i', ($request->input('ibu-hamil', 1) - 1) * 5);   
        }
        else{
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'ibu-hamil')->json();
            $ibu_hamil = $this->paginate($response['data'])->withPath('/admin/ibu-hamil');
            
            return view('ibu-hamil.index',compact('ibu_hamil'))
                ->with('i', ($request->input('ibu-hamil', 1) - 1) * 5);   
        }
    }
    
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'keluarga')->json();
        $keluarga = $response['data'];

        return view('ibu-hamil.create', compact('keluarga'));
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'detail_keluarga_id' => 'required',
            'berat_badan_prakehamilan' => 'required',
            'tinggi_badan_prakehamilan' => 'required'
        ]);
        
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'ibu-hamil', [
            'detail_keluarga_id' => $request->detail_keluarga_id,
            'berat_badan_prakehamilan' => $request->berat_badan_prakehamilan,
            'tinggi_badan_prakehamilan' => $request->tinggi_badan_prakehamilan,
        ]);
            
        return redirect()->route('ibu-hamil.index')
                        ->with('success','Data ibu-hamil berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'ibu-hamil/'.' '.$id)->json();
        $ibu_hamil = $response['data'];
        
        return view('ibu-hamil.show',compact('ibu_hamil'));
    }
    
    public function edit(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'ibu-hamil/'.' '.$id)->json();
        $ibu_hamil = $response['data'];
        
        return view('ibu-hamil.edit',compact('ibu_hamil'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_ibu-hamil' => 'required',
            'keluarga_id' => 'required',
        ]);

        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch(env('BASE_API_URL').'ibu-hamil/'.' '.$id, [
            'nama_ibu_hamil' => $request->nama_ibu_hamil,
            'keluarga_id' => $request->keluarga_id,
        ]);
        
        return redirect()->route('ibu-hamil.index')
                        ->with('success','Data ibu-hamil Berhasil Diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->delete(env('BASE_API_URL').'ibu-hamil/'.' '.$id)->json();
    
        return redirect()->route('ibu-hamil.index')
                        ->with('success','Data ibu-hamil berhasil dihapus');
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}