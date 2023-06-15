<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KontenController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::withHeaders(["Content-type", "multipart/form-data"])
            ->get(env('BASE_API_URL').'konten');
        $data = $response['data'];

        
        if(isset($data)){
            foreach($data as $listkonten){
                $konten[] = [
                    'judul' => $listkonten['judul'],
                    'konten' => $listkonten['konten'],
                    'image' => env('BASE_IMAGE_URL').$listkonten['gambar'],
                ];
            }
        }else{
            $konten = 404;
        }

        return view('konten.index', compact('konten'))
        ->with('i', ($request->input('page', 1) - 1) * 5);    
    }
    
    public function create()
    {
        return view('konten.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // $file               = request('gambar');
        // $file_path          = $file->getPathname();
        // $file_mime          = $file->getMimeType('image');
        // $file_uploaded_name = $file->getClientOriginalName();

        // $uploadFileUrl = env('BASE_API_URL').'konten';

        // $client = new \GuzzleHttp\Client();

        // $response = $client->request("POST", $uploadFileUrl, [
        //     'multipart' => [
        //         [
        //             'name'      => 'gambar',
        //             'filename' => $file_uploaded_name,
        //             'Mime-Type'=> $file_mime,
        //             'contents' => fopen($file_path, 'r'),
        //         ],
        //         [
        //             'name' => 'form-data',
        //             'contents' => json_encode(
        //                 [
        //                     'judul' => 'Channaveer',
        //                     'konten' => 'Hakari'
        //                 ]
        //             )
        //         ]
        //     ]
        // ]);

        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            // get Illuminate\Http\UploadedFile instance
            $image = $request->file('gambar');
    
            // post request with attachment
            $response = Http::withHeaders(["Content-type", "multipart/form-data"])
                ->attach('gambar', file_get_contents($image), 'image.jpeg')
                ->post(env('BASE_API_URL').'konten', $request->all());
        } else {
            $response = Http::post(env('BASE_API_URL').'konten', $request->all());
        }
                
        // $file = request('gambar');
        // $file_path = $file->getPathname();
        // $file_mine = $file->getMimeType('gambar');
        // $file_upload_name = $file->getClientOriginalName();

        // $apiUrl = env('BASE_API_URL').'konten';

        // $client new \GuzzleHttp\Client();

        // $request = $client->request("POST", $apiUrl), [
        //     'multipart' => [
        //         'name' =>'file',
        //         'filename' => 
        //     ]
        // ]
            
        return redirect()->route('konten.index')
                        ->with('success','Data konten berhasil dibuat.');
    }

    public function show(Request $request, $id)
    {
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'provinsi/'.' '.$id)
            ->json();
            
        // $response = Http::get(env('BASE_API_URL').'provinsi/'.' '.$id)->json();
        $provinsi = $response['data'];

        return view('provinsi.show',compact('provinsi'));
    }
    
    public function edit(Request $request, $id)
    {
        // $response = Http::get(env('BASE_API_URL').'provinsi/'.' '.$id)->json();

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'provinsi/'.' '.$id)
            ->json();

        $provinsi = $response['data'];
        
        return view('provinsi.edit',compact('provinsi'));
    }
    
    public function update(Request $request, $id)
    {
        request()->validate([
            'nama_provinsi' => 'required',
        ]);

        // $response = Http::patch(env('BASE_API_URL').'provinsi/'.' '.$id, [
        //     'nama_provinsi' => $request->nama_provinsi,
        // ]);

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->patch(env('BASE_API_URL').'provinsi/'.' '.$id, [
                'nama_provinsi' => $request->nama_provinsi,
            ]);
        
    
        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi Berhasil Diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        // $response = Http::delete(env('BASE_API_URL').'provinsi/'.$id);

        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->delete(env('BASE_API_URL').'provinsi/'.$id)
            ->json();

        return redirect()->route('provinsi.index')
                        ->with('success','Data provinsi berhasil dihapus');
    }
}
