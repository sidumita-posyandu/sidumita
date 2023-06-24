<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DetailKeluargaController extends Controller
{
    public function create(Request $request, $id)
    {
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL') . 'keluarga/' . ' ' . $id)->json();
        $keluarga = $response['data'];

        return view('detail-keluarga.create', compact('keluarga'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();

        foreach ($data['nik'] as $item => $value) {
            $response = Http::accept('application/json')
                ->withToken($request->session()->get('token'))
                ->post(env('BASE_API_URL') . 'detail-keluarga', [
                    'keluarga_id' => $id,
                    'nik' => $data['nik'][$item],
                    'nama_lengkap' => $data['nama_lengkap'][$item],
                    'jenis_kelamin' => $data['jenis_kelamin'][$item],
                    'tempat_lahir' => $data['tempat_lahir'][$item],
                    'tanggal_lahir' => $data['tanggal_lahir'][$item],
                    'agama' => $data['agama'][$item],
                    'pendidikan' => $data['pendidikan'][$item],
                    'no_telp' => $data['no_telp'][$item],
                    'golongan_darah' => $data['golongan_darah'][$item],
                    'jenis_pekerjaan' => $data['jenis_pekerjaan'][$item],
                    'status_perkawinan' => $data['status_perkawinan'][$item],
                    'status_dalam_keluarga' => $data['status_dalam_keluarga'][$item],
                    'kewarganegaraan' => $data['kewarganegaraan'][$item],
                ]);
        }
        return redirect()->route('keluarga.show', $id);
    }

    public function edit(Request $request, $id)
    {
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL') . 'detail-keluarga/' . ' ' . $id)->json();
        $det_keluarga = $response['data'][0];

        return view('detail-keluarga.edit', compact('det_keluarga'));
    }

    public function update(Request $request, $id)
    {
        // $response = Http::accept('application/json')
        //     ->withToken($request->session()->get('token'))
        //     ->patch(env('BASE_API_URL') . 'detail-keluarga/' . ' ' . $id, [
        //         'keluarga_id' => $id,
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

        return redirect()->route('dusun.index')
            ->with('success', 'Data dusun Berhasil Diperbarui');
    }
}
