<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class KeluargaController extends Controller
{

    public function index(Request $request)
    {
        if($request->session()->get('userAuth')['role_id'] == 3){
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'petugas/with-keluarga')->json();
            $keluarga = $this->paginate($response['data'])->withPath('/admin/keluarga');

            return view('keluarga.index-petugas', compact('keluarga'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }elseif($request->session()->get('userAuth')['role_id'] == 2){
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'operator/keluarga')->json();
            $keluarga = $this->paginate($response['data'])->withPath('/admin/keluarga');

            return view('keluarga.index-operator', compact('keluarga'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }
        else{
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'keluarga')->json();
            $keluarga = $this->paginate($response['data'])->withPath('/admin/keluarga');
            
            return view('keluarga.index', compact('keluarga'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }  
    }
    
    public function create(Request $request)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'provinsi')->json();
        $provinsi = $response['data'];

        $token = $request->session()->get('token');

        return view('keluarga.create', compact('provinsi', 'token'));
    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        $validasi = Validator::make($request->all(), [
            'no_kartu_keluarga' => 'required|max:16',
            'kepala_keluarga' => 'required',
            'alamat' => 'required',
            'dusun_id' => 'required'
        ]);

        if($validasi->fails()){
            $request->session()->put('errorInputKeluarga', $validasi->errors());
            return redirect()->back();  
        }
                
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->post(env('BASE_API_URL').'auth/register', [
            'name' => $request->kepala_keluarga,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 4,
            'no_kartu_keluarga' => $request->no_kartu_keluarga,
            'kepala_keluarga' => $request->kepala_keluarga,
            'alamat' => $request->alamat,
            'dusun_id' => $request->dusun_id,
        ]);

        if($response->getStatusCode() == 400){
            $request->session()->put('errorInputKeluarga', $response['message']);
            return redirect()->back();  
        }

        // $response = Http::accept('application/json')
        // ->withToken($request->session()->get('token'))
        // ->post(env('BASE_API_URL').'keluarga', [
        //     'no_kartu_keluarga' => $request->no_kartu_keluarga,
        //     'kepala_keluarga' => $request->kepala_keluarga,
        //     'alamat' => $request->alamat,
        //     'jumlah' => $count,
        //     'user_id' => 1,
        //     'dusun_id' => $request->dusun_id,
        // ]);

        // $getId = Http::accept('application/json')
        // ->withToken($request->session()->get('token'))
        // ->get(env('BASE_API_URL').'keluarga')->json();
        // $maxId = max($getId['data'])['id'];

        // // dd($data);
        
        // foreach ($data['nik'] as $item => $value) {          
        //     $response2 = Http::accept('application/json')
        //     ->withToken($request->session()->get('token'))
        //     ->post(env('BASE_API_URL').'detail-keluarga', [
        //         'keluarga_id' => $maxId,
        //         'nik' => $data['nik'][$item],
        //         'nama_lengkap' => $data['nama_lengkap'][$item],
        //         'jenis_kelamin' => $data['jenis_kelamin'][$item],
        //         'tempat_lahir' => $data['tempat_lahir'][$item],
        //         'tanggal_lahir' => $data['tanggal_lahir'][$item],
        //         'agama' => $data['agama'][$item],
        //         'pendidikan' => $data['pendidikan'][$item],
        //         'no_telp' => $data['no_telp'][$item],
        //         'golongan_darah' => $data['golongan_darah'][$item],
        //         'jenis_pekerjaan' => $data['jenis_pekerjaan'][$item],
        //         'status_perkawinan' => $data['status_perkawinan'][$item],
        //         'status_dalam_keluarga' => $data['status_dalam_keluarga'][$item],
        //         'kewarganegaraan' => $data['kewarganegaraan'][$item],
        //     ]);
        // }
        
        return redirect()->route('keluarga.index')
                        ->with('success','Data Keluarga berhasil dibuat.');
    }
    
    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->get(env('BASE_API_URL').'keluarga/'.' '.$id)->json();
        $keluarga = $response['data'];
        
        return view('keluarga.show',compact('keluarga'));
    }

    
    public function edit($id)
    {
        // return view('keluarga.edit',compact('keluarga'));
    }
    
    public function update(Request $request, $id)
    {
        // $keluarga->update($request->all());
    
        // return redirect()->route('keluarga.index')
        //                 ->with('success','Data Keluarga Berhasil Diperbarui');
    }
    
    public function destroy($id)
    {
        // $keluarga->delete();
    
        // return redirect()->route('keluarga.index')
        //                 ->with('success','Data keluarga berhasil dihapus');
    }

    public function indexValidasiKeluarga(Request $request){
        if($request->session()->get('userAuth')['role_id'] == 1){
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'keluarga')->json();
            $keluarga = $this->paginate($response['data'])->withPath('/admin/akun-keluarga');

            return view('keluarga.validasi', compact('keluarga'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }elseif($request->session()->get('userAuth')['role_id'] == 2){
            $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'operator/keluarga')->json();

            $keluarga = $this->paginate($response['data'])->withPath('/admin/akun-keluarga');

            return view('keluarga.validasi-operator', compact('keluarga'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
        }
    }

    public function validasiKeluarga(Request $request, $id){
        $response = Http::accept('application/json')
        ->withToken($request->session()->get('token'))
        ->patch(env('BASE_API_URL').'validasi-user/'.' '.$id);
        
        return back();
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}